<?php
class xssModel extends Bmodel{
	/*
		xss stored#1 easy level
		function is vulnerable
	*/
	public function stored($level = null, $post = array()){
		$level_name = 'easy';
		if( $level == 'medium'):
			$level_name = 'medium';
			/* merge lowwer and upper letters. Script,<scRIpt> or <scrscriptipt>*/
			$substitutions = array( 
			   '<script>' => '', 
			   '</script>'  => '',
			   'script'  => ''
			);
			foreach( $_POST as $key => $val):
				$post[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;
		elseif($level == 'hard'):
			$level_name = 'hard';

			/* <scrscriptipt> */
			$substitutions = array( 
			   '<script>' => '', 
			   '</script>' => '', 
			   'script'  => ''
			);
			foreach( $_POST as $key => $val):
				$post[$key] = str_replace( array_keys( $substitutions ), $substitutions, strtolower($val)); 
			endforeach;
		elseif($level == 'super-hard'):
			$level_name = 'super-hard';
			/* html inline events like <img src='x' onerror="alert()">*/
			$substitutions = array( 
			   '<script>' => '', 
			   '</script>' => '', 
			   'script'  => ''
			);
			foreach( $_POST as $key => $val):
				$val = preg_replace( '/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t>/i', ' ', $val ); 
				$post[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;
		elseif($level == 'impossible'):
			$level_name = 'impossible';
			$post = htmlspecialchars(INPUT_POST);
			$post = filter_input_array($post, FILTER_SANITIZE_STRING);
		else:
			/*easy level*/
			$post = $_POST;
		endif;

		if(isset( $post['submit']) ):
			if(
				!isset( $post['fname'] ) || empty($post['fname']) ||
				!isset( $post['lname'] ) || empty($post['lname']) ||
				!isset( $post['age'] )   || empty($post['age'])
			):
				Messages::setMsg('Empty fields detected', 'error');
			else:
				$this->query('
					INSERT INTO xss_stored 
					(fname, lname, age, level) 
					VALUES (:fname, :lname, :age, :level)
				');

				$this->bind(':fname', $post['fname'] );
				$this->bind(':lname', $post['lname'] );
				$this->bind(':age', $post['age'] );
				$this->bind(':level', $level_name );

				$this->execute();
				if( $this->lastInsertId() ):
					Messages::setMsg('New person added', '');
				else:
					Messages::setMsg('Something happend', 'error');
				endif;
	
			endif;
			
		endif;


		/*
			delete records
		*/
		if( 
			isset($post['delete']) && 
			isset($post['amount'])
		):
			$this->query('DELETE FROM xss_stored WHERE level = :level ORDER BY id DESC LIMIT :lm');
			$this->bind(':lm', (int)$post['amount']);
			$this->bind(':level', $level_name);

			$this->execute();
		
			Messages::setMsg('Yay, Deleted last '.$post['amount'].' record(s)');
		endif;

		/*
			Delete record by id
		*/
		if( 
			isset($post['delete']) && 
			isset($post['id'])
		):
			$this->query('DELETE FROM xss_stored WHERE id = :id AND level = :level');
			$this->bind(':id', (int)$post['id']);
			$this->bind(':level', $level_name);

			$this->execute();
		
			Messages::setMsg('Yay, you just deleted one record!');
		endif;

		/*  
			return data from db
		*/
		$this->query("SELECT * FROM xss_stored WHERE level = :level");
		$this->bind(':level', $level_name);
		$this->execute();
		return [
			'result' => $this->resultSet(),
			'level' => (new Progress($level))->level()];
	}


}