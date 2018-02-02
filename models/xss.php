<?php
class xssModel extends Bmodel{
	/*
		xss stored#1 easy level
		function is vulnerable
	*/
	public function stored($level = null){
		$level_name = 'easy';
		if( $level == 'medium'):
			$level_name = 'medium';
			$substitutions = array( 
			   '<script>' => '', 
			   '</script>'  => '',
			   'script'  => ''
			);
			$post = array();
			foreach( $_POST as $key => $val):
				$post[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;
		elseif($level == 'hard'):
			$level_name = 'hard';
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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