<?php
abstract class Model{
	protected $dbh;
	protected $stmt;

	public function __construct(){
		// thre should be 2 users: admin and basic user
		// if admin is logged in it connects to admin user
		// else basic user and if someone somehow hacks site it will not have access to drop tables or DB
		if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true){
			$this->dbh = new PDO("mysql:host=".ADMIN_DB_HOST.";dbname=".ADMIN_DB_NAME.";charset=utf8", ADMIN_DB_USER, ADMIN_DB_PASS);
		}else{
			$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
		}

	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	//Binds the prep statement
	public function bind($param, $value, $type = null){
 		if (is_null($type)) {
  			switch (true) {
    			case is_int($value):
      				$type = PDO::PARAM_INT;
      				break;
    			case is_bool($value):
      				$type = PDO::PARAM_BOOL;
      				break;
    			case is_null($value):
      				$type = PDO::PARAM_NULL;
      				break;
    				default:
      				$type = PDO::PARAM_STR;
  			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount(){
		$this->execute();
		return $this->stmt->rowCount();
	}
}



