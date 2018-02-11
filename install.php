<?php

if(isset($_POST['install'])):
	try {
	    $conn = new PDO('mysql:host=localhost', $_POST['DB_username'], $_POST['DB_password']);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $conn->exec("CREATE DATABASE IF NOT EXISTS training_platform");
	    $conn->exec("use training_platform");
	    $conn->exec("
					SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
					SET time_zone = '+02:00';

					CREATE TABLE IF NOT EXISTS trp_users (  
					  user_id int(5) NOT NULL,
					  email varchar(40) NOT NULL,
					  password varchar(40) NOT NULL,
					  avatar text NOT NULL,
					  reg_date_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					  username varchar(40) NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;

					CREATE TABLE IF NOT EXISTS xss_stored (
					  id int(4) NOT NULL,
					  fname varchar(10000) NOT NULL,
					  lname varchar(200) NOT NULL,
					  age int(3) NOT NULL,
					  level varchar(30) NOT NULL DEFAULT 'easy'
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;

					INSERT INTO trp_users (user_id, email, password, avatar, reg_date_time, username) VALUES
					(1, 'nimda@nimda.com', 'f99c91b8541a9a56909ed9b045de4ddeb1da99c1', 'avatar_1.jpg', '2018-01-10 22:36:27', 'nimda');

					ALTER TABLE trp_users
					  ADD PRIMARY KEY (user_id);

					ALTER TABLE trp_users
					  MODIFY user_id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

					ALTER TABLE xss_stored
					  ADD PRIMARY KEY (id);
					 
					ALTER TABLE xss_stored
					  MODIFY id int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
					 

					 
					INSERT INTO xss_stored (id, fname, lname, age, level) VALUES
					(1, 'Fianna', 'Maymond', 28, 'easy'),
					(2, 'Addy', 'Backshill', 13, 'easy'),
					(3, 'Burke', 'Defew', 16, 'easy'),
					(4, 'Harry', 'Ford', 25, 'easy'),
					(5, 'Fianna', 'Maymond', 38, 'medium'),
					(6, 'Addy', 'Backshill', 11, 'medium'),
					(7, 'Burke', 'Defew', 34, 'medium'),
					(8, 'Hercy', 'Dog', 49, 'medium'),
					(9, 'Keith', 'Beet', 54, 'hard'),
					(10, 'Alison', 'Mayou', 61, 'hard');
	 ");


	    echo "[<b style=\"color:rgba(0, 72, 255, 0.9);\">Info</b>] DB created successfully<br>";

	    $path_to_file = 'config.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace('define("DB_USER",',"define(\"DB_USER\",\"".$_POST['DB_username']."\");//",$file_contents);
		file_put_contents($path_to_file,$file_contents);

		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace('define("DB_PASS",',"define(\"DB_PASS\",\"".$_POST['DB_password']."\");//",$file_contents);
		file_put_contents($path_to_file,$file_contents);

	    echo "[<b style=\"color:rgba(0, 72, 255, 0.9);\">Info</b>] config.php file modified successfully<br>";
		echo "[<b style=\"color:rgba(0, 72, 255, 0.9);\">Info</b>] Go to <a href=\"./\">Main</a>";


	}
	catch(PDOException $e){
	    echo "[<b style=\"color:red;\">Error</b>] ".$sql . $e->getMessage();
	}

endif;




?>


<form method="post">
	<p>[<b style="color:rgba(0, 72, 255, 0.9);">Info</b>] Please insert your DataBase credentials! Default user is root and it suppose to valid everywhere but you are free to provide any.
	<br>
	[<b style="color:rgba(255, 72, 0, 0.9);">NB</b>] You should be able to authorize using those username and password in your mysql database!
	</p>

	<input type="text" value="root" placeholder="DB_username" name="DB_username" required="">
	<input type="text" placeholder="DB_password" name="DB_password" required="" autofocus="" autocomplete="off">
	<input type="submit" value="Install" name="install" style="color: blue;cursor: pointer;">
</form>