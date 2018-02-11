<?php
abstract class Model{
	protected $dbh;
	protected $stmt;

	public function __construct(){
		try{
			$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
		}
		catch(PDOException $e){
		    die($this->dbh."<br>".
		    	$e->getMessage()."<br><br>".
		    	"[<b style=\"color:blue;\">Info</b>] Hey dude, if it's first time you see this message please click <a href=\"".ROOT_URL.
		    	"install.php\">here</a> to install awesome application!<br>[<b style=\"color:blue;\">Info</b>] If you see this error again, then please open config.php file and change DB_USER, DB_PASS yourself!");
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



