<?php
class sqlInjectionModel extends Model{

	/*
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		switch ($level) {
			case 'easy':
				$servername = "localhost";
				$username = "username";
				$password = "password";

				// Create connection
				$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

				// Check connection
				if ($conn->connect_error) {
				    Messages::setMsg("Connection failed: " . $conn->connect_error, 'error');
					return ['level'  => (new Progress($level))->level()];
				}

				if ($conn->query("CREATE DATABASE IF NOT EXISTS BLAAA") === TRUE) {
				    printf("Table myCity successfully created.\n");
				}

				echo "Connected successfully";

				return array(
					'output' => '',
					'level'  => (new Progress($level))->level()
					);
				
				break;
			
			default:
				# code...
				break;
		}
	}


}


