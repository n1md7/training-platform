<?php
class xssModel extends Bmodel{
	/*
		xss stored#1 easy level
		function is vulnerable
	*/
	public function stored($level = null){
		$headingText = '<span class="level-title level-easy">easy</span>';
		if( $level == 'medium'):
			$substitutions = array( 
			   '<script>' => '', 
			   '</script>'  => '',
			   'script'  => ''
			);
			$post = array();
			foreach( $_POST as $key => $val):
				$post[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;
			$headingText = '<span class="level-title level-medium">medium</span>';
		elseif($level == 'hard'):
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$headingText = '<span class="level-title level-hard">hard</span>';
		else:
			$post = $_POST;
		endif;

		if(isset( $post['submit']) ):
			if(
				!isset( $post['fname'] ) ||
				!isset( $post['lname'] ) ||
				!isset( $post['age'] ) 
			):
				Messages::setMsg('Empty fields detected', 'error');
			else:
				$this->query('
					INSERT INTO xss_stored 
					(fname, lname, age) 
					VALUES (:fname, :lname, :age)
				');

				$this->bind(':fname', $post['fname'] );
				$this->bind(':lname', $post['lname'] );
				$this->bind(':age', $post['age'] );

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
			$this->query('DELETE FROM xss_stored ORDER BY id DESC LIMIT :lm');
			$this->bind(':lm', (int)$post['amount']);
			$this->execute();
		
			Messages::setMsg('Yay, Deleted last '.$post['amount'].' record(s)');
		endif;

		/*  
			return data from db
		*/
		$this->query("SELECT * FROM xss_stored");
		$this->execute();
		return [$this->resultSet(),$headingText];
	}


}