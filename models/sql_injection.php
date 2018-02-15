<?php
class sqlInjectionModel extends Model{

	/*
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		switch ($level) {
			case 'medium':
				if(isset($_POST['search'])):
					$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

					if ($conn->connect_error):
					    Messages::setMsg("Connection failed: " . $conn->connect_error, 'error');
						return ['level'  => (new Progress($level))->level()];
					endif;
					$output = array();
					/* trim spaces */
					$search = str_replace(' ','', $_POST['search']);
					
					$sql = mysqli_query($conn, "SELECT * FROM users WHERE first_name like '%$search%' LIMIT 10");

				    while($row = mysqli_fetch_assoc( $sql )) {
				        array_push($output, $row);
				    }

					return array(
							'output' => $output,
							'post'   => $search,
							'level'  => (new Progress($level))->level()
						);
					mysqli_close($conn);
				else:
					return array(
						'post'   => '',
						'level'  => (new Progress($level))->level()
					);
				endif;	
				break;

			case 'impossible':
				if(isset($_POST['search'])):
					try {
						$db = DB_HOST;
						$dbn = DB_NAME;
		    			$conn = new PDO("mysql:host=$db;dbname=$dbn;charset=utf8",  DB_USER, DB_PASS);
						
						$stmt = $conn->prepare("SELECT * FROM users WHERE first_name like :search LIMIT 10");
						$stmt->execute(array(':search' => "%".$_POST['search']."%"));
						
						$output = $stmt->fetchAll(PDO::FETCH_ASSOC);

						return array(
								'output' => $output,
								'post'   => $_POST['search'],
								'level'  => (new Progress($level))->level()
							);
					} catch(PDOException $ex) {
						Messages::setMsg($ex->getMessage(), 'error');
						return array(
								'post'   => '',
								'level'  => (new Progress($level))->level()
							);
					}
				else:
					return array(
						'post'   => '',
						'level'  => (new Progress($level))->level()
					);
				endif;
				break;
			default:
				if(isset($_POST['search'])):
					// Create connection
					$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

					// Check connection
					if ($conn->connect_error):
					    Messages::setMsg("Connection failed: " . $conn->connect_error, 'error');
						return ['level'  => (new Progress($level))->level()];
					endif;
					$output = array();
					$search = $_POST['search'];
					
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
				else:
					return array(
						'post'   => '',
						'level'  => (new Progress($level))->level()
					);
				endif;	
		}
	}


}


