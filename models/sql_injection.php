<?php
class sqlInjectionModel extends Model{

	/*
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		switch ($level) {
			case 'easy':
				if(isset($_POST['search'])):
					// Create connection
					$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

					// Check connection
					if ($conn->connect_error):
					    Messages::setMsg("Connection failed: " . $conn->connect_error, 'error');
						return ['level'  => (new Progress($level))->level()];
					endif;
					$output = array();
					$search = isset($_POST['search'])?$_POST['search']:"";
					
					$sql = mysqli_query($conn, "SELECT * FROM users WHERE first_name like '%$search%' LIMIT 10");

				    while($row = mysqli_fetch_assoc( $sql )) {
				        array_push($output, $row);
				    }

					return array(
							'output' => $output,
							'post'   => $_POST['search'],
							'level'  => (new Progress($level))->level()
						);
					mysqli_close($conn);
				endif;	
				break;
			
			default:
				# code...
				break;
		}
	}


}


