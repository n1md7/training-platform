<?php
class xssModel extends Bmodel{
	/*
		xss stored#1 easy level
		function is vulnerable
	*/
	public function stored_easy_1(){

		if(isset( $_POST['submit']) ):
			if(
				!isset( $_POST['fname'] ) ||
				!isset( $_POST['lname'] ) ||
				!isset( $_POST['age'] ) 
			):
				Messages::setMsg('Empty fields detected', 'error');
			else:
				$this->query('
					INSERT INTO xss_stored 
					(fname, lname, age) 
					VALUES (:fname, :lname, :age)
				');

				$this->bind(':fname', $_POST['fname'] );
				$this->bind(':lname', $_POST['lname'] );
				$this->bind(':age', $_POST['age'] );

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
			isset($_POST['delete']) && 
			isset($_POST['amount'])
		):
			$this->query('DELETE FROM xss_stored ORDER BY id DESC LIMIT :lm');
			$this->bind(':lm', (int)$_POST['amount']);
			$this->execute();
		
			Messages::setMsg('Yay, Deleted last '.$_POST['amount'].' record(s)');
		endif;

		/*  
			return data from db
		*/
		$this->query("SELECT * FROM xss_stored");
		$this->execute();
		return $this->resultSet();
	}


}