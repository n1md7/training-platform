<?php
class UserModel extends Model{
	/*
		public method for login
	
	*/
	public function signin(){
		/* sanitization of POST input */
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		/* Checking whether parameters are passed*/
		if(isset($post['signin'])):

			if(	!isset($post['username']) || !isset($post['password']) ):
				Messages::setMsg('Please correctly submit the form', 'error');
				return;
			endif;
		
		else:
			return;
		endif;


		/* hash password */
		$password = Generate::sha1($post['password']);

		$this->query('SELECT * FROM trp_users WHERE username = :user AND password = :passwd');
		$this->bind(':user', $post['username']);
		$this->bind(':passwd', $password);

		$this->execute();
		if( $this->stmt->rowCount() > 0 ):
			/* if there is at least one row matching those password andusername*/
			/* successfull login*/
			$row = $this->stmt->fetch(PDO::FETCH_ASSOC);

			$_SESSION['logged_in'] = true;
			$_SESSION['user_data'] = array(
				"user_id"  => $row['user_id'],
				"username" => $row['username'],
				"email"	   => $row['email'],
				"avatar"   => $row['avatar']
			);

			/* redirect to main page*/
			header('Location: '.ROOT_URL);
			return;
		else:
			header('HTTP/1.1 401 Unauthorized', true, 401);
			Messages::setMsg('Incorrect credentials', 'error');
		endif;



		return;
	}


	/*
		public method for register new user
	*/
	public function signup(){
		/* sanitization of POST input */
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		/* Checking whether parameters are passed*/
		if(isset($post['signup'])):

			if(
				!isset($post['username']) || 
				!isset($post['email'])    ||
				!isset($post['passwd'])   ||
				!isset($post['repasswd'])
				):
					Messages::setMsg('Please correctly submit the form', 'error');
					return;
			endif;

		else:
			return;
		endif;

		
		/* Checking whether parameters are empty*/
		if(
			empty($post['username']) || 
			empty($post['passwd'])   ||
			empty($post['repasswd']) ||
			empty($post['signup'])
			):
				Messages::setMsg('Empty parameter detected', 'error');
				return;
		endif;

		/* Checking whether passwords match*/
		if(	$post['repasswd'] != $post['passwd'] ):
				Messages::setMsg("Passwords didn't match", 'error');
				return;
		endif;

		/* check whether already registered */
		$this->query('SELECT username FROM trp_users WHERE username = :user');
		$this->bind(':user', $post['username']);

		/* same username exists*/
		if( $this->rowCount() > 0 ):
			Messages::setMsg("Username {$post['username']} alredy registered", 'error');
			return;
		endif;


		/* hash password */
		$password = Generate::sha1($post['passwd']);

		/* save user data in DB*/
		$this->query('
				INSERT INTO trp_users 
				(username, email, password, avatar)
				VALUES (:user, :email, :passwd, :avatar)
			');

		$this->bind(':user', $post['username']);
		$this->bind(':email', $post['email']);
		$this->bind(':passwd', $password);
		$this->bind(':avatar', 'undefined');

		$this->execute();
		/* check whether record really created */
		if( $this->lastInsertId() ):
			Messages::setMsg("New record Created", '');
		else:
			Messages::setMsg("Something happend, no record created", 'error');
		endif;

		return;

	}


	/*
		public method for user settings
	*/
	public function settings(){
		return;
	}


	/*
		public method for user info
	*/
	public function userinfo(){
		return;
	}

}
