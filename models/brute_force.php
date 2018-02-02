<?php
class bruteForceModel extends Bmodel{

	/*
		Brute Force #1 easy level
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$result = array();

		if( $level == 'hard' || $level == 'super-hard'){
			/*
				added CSTF token security
			*/
			if( 
				isset($post['user']) &&
				isset($post['pass']) &&
				isset($post['csrf']) &&
				isset($post['signin'])
			):

				if(isset($_SESSION['brute']['csrf']) && $_SESSION['brute']['csrf'] == $post['csrf']){

					$pass = Generate::sha1($post['pass']);
					
					$this->query('SELECT * FROM trp_users WHERE username = :user AND password = :pass');
					$this->bind(':user', $post['user']);
					$this->bind(':pass', $pass);
					$this->execute();
					
					if( $this->stmt->rowCount() > 0 ):
						/* 
							If there is at least one row matching those password and username
							then it is a successfull login
						*/

						$result = $this->stmt->fetch(PDO::FETCH_ASSOC);
						Messages::setMsg(
							'Correct credentials for the user: '.$result['username'].
							'!<br><b>Great job man!</b>'.
							'<br>Status code: 200 ok <br>'.
							'<hr> <img style="width:100%;" class="avatar" src="'.__IMG__.$result['avatar'].'" >');
						header('HTTP/1.1 200 OK');
					else:
						Messages::setMsg('Wrong credentials!<br>Status code: 401 Unauthorized', 'error');
						header('HTTP/1.1 401 Unauthorized');
						/*
							super-hard level security
							sleep 1000 milliseconds if !correct
							usleep parameter is in microseconds
							1 000 000 is 1 second
							sleep(1) sleep 1 second
						*/
						$level == 'super-hard'? sleep(1):null;
					endif;

				}else{
					Messages::setMsg('CSRF token is wrong!', 'error');
					header('HTTP/1.1 401 Unauthorized');
					$level == 'super-hard'? usleep(300000):null;
				}
					
			endif;
			/*
				Generate session token (csrf)
			*/
			$csrf = Generate::csrf(32);
			$_SESSION['brute']['csrf'] = $csrf;

			
			return array(
					'level' => (new Progress($level))->level(),
					'csrf'  => $csrf
				);

		} else if( $level == 'extremely-hard'){
			/*
				extremely-hard level here
			*/
				Messages::setMsg('Comming soon!','info');
				return array(
					'level' => (new Progress($level))->level(),
					'csrf'  => ''
				);
		} else if( $level == 'impossible'){
			/*
				extremely-hard level here
			*/
				Messages::setMsg('Comming soon!','info');
				return array(
					'level' => (new Progress($level))->level(),
					'csrf'  => ''
				);
		} else {
			/*
				It is easy level and medium level
				Difference is that easy level isn't protected default user authentication
				and medium level has this feature.
				In order to brute-force medium level user needs to have an active session id.
			*/
			if( 
				isset($post['user']) &&
				isset($post['pass']) &&
				isset($post['signin'])
			):

				$pass = Generate::sha1($post['pass']);
				
				$this->query('SELECT * FROM trp_users WHERE username = :user AND password = :pass');
				$this->bind(':user', $post['user']);
				$this->bind(':pass', $pass);
				$this->execute();
				if( $this->stmt->rowCount() > 0 ):
					/* 
						If there is at least one row matching those password and username
						then it is a successfull login
					*/
					$result = $this->stmt->fetch(PDO::FETCH_ASSOC);
					Messages::setMsg(
						'Correct credentials for the user: '.$result['username'].
						'!<br><b>Great job man!</b>'.
						'<br>Status code: 200 ok <br>'.
						'<hr> <img style="width:100%;" class="avatar" src="'.__IMG__.$result['avatar'].'" >');
					header('HTTP/1.1 200 OK');
				else:
					Messages::setMsg('Wrong credentials!<br>Status code: 401 Unauthorized', 'error');
					header('HTTP/1.1 401 Unauthorized');
				endif;
					
			endif;

			return array('level' => (new Progress($level))->level());
		}

		return;
		
	}


}


