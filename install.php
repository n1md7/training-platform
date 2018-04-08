<?php
require('config.php');
$db = DB_HOST;
$dbn = DB_NAME;
$dbut = DB_USER_TABLE;
$dbsqli = DB_SQLi_TABLE;
$dbxsss = DB_XSSs_TABLE;
try {
    $dbh = new PDO("mysql:host=$db;dbname=$dbn", DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    echo '[<b style="color:rgba(0, 72, 255, 0.9);">Info</b>] Dude, you have already done this setup! Please go to <a href="./">main</a> page<br/>';
}catch(PDOException $e){}

if(isset($_POST['install'])):
	try {
    	$conn = new PDO("mysql:host=$db;",  $_POST['DB_username'], $_POST['DB_password']);

	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbn");
	    $conn->exec("use $dbn");
	    $conn->exec("
					
					SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
					SET time_zone = '+02:00';

					CREATE TABLE IF NOT EXISTS $dbut (  
					  user_id int(5) NOT NULL,
					  email varchar(40) NOT NULL,
					  password varchar(40) NOT NULL,
					  avatar text NOT NULL,
					  reg_date_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					  username varchar(40) NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;

					CREATE TABLE IF NOT EXISTS $dbxsss (
					  id int(4) NOT NULL,
					  fname varchar(10000) NOT NULL,
					  lname varchar(200) NOT NULL,
					  age int(3) NOT NULL,
					  level varchar(30) NOT NULL DEFAULT 'easy'
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;

					CREATE TABLE IF NOT EXISTS $dbsqli (
					  id int(7) NOT NULL,
					  first_name varchar(33) NOT NULL,
					  last_name varchar(33) NOT NULL,
					  email varchar(45) NOT NULL,
					  ip_address varchar(16) NOT NULL,
					  gender varchar(6) NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;

					ALTER TABLE $dbut
					  ADD PRIMARY KEY (user_id);

					ALTER TABLE $dbut
					  MODIFY user_id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

					ALTER TABLE $dbxsss
					  ADD PRIMARY KEY (id);
					 
					ALTER TABLE $dbxsss
					  MODIFY id int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
					 
					ALTER TABLE $dbsqli
					  ADD PRIMARY KEY (id);

					ALTER TABLE $dbsqli
					  MODIFY id int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

					INSERT INTO $dbut (user_id, email, password, avatar, reg_date_time, username) VALUES
					(1, 'nimda@nimda.com', 'f99c91b8541a9a56909ed9b045de4ddeb1da99c1', 'avatar_1.jpg', '2018-01-10 22:36:27', 'nimda');
					 
					INSERT INTO $dbxsss (id, fname, lname, age, level) VALUES
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

					INSERT INTO $dbsqli (id, first_name, last_name, email, ip_address, gender) VALUES
					(1, 'Lynett', 'Borthe', 'lborthe0@timesonline.co.uk', '28.55.217.237', 'Female'),
					(2, 'Filmore', 'Shillito', 'fshillito1@netlog.com', '69.117.211.116', 'Male'),
					(3, 'Redd', 'Rudolfer', 'rrudolfer2@privacy.gov.au', '20.33.239.3', 'Male'),
					(4, 'Beverlie', 'Fish', 'bfish3@oaic.gov.au', '215.33.72.115', 'Female'),
					(5, 'Cristabel', 'Gethyn', 'cgethyn4@sohu.com', '49.61.158.208', 'Female'),
					(6, 'Dottie', 'Synnot', 'dsynnot5@so-net.ne.jp', '125.144.163.231', 'Female'),
					(7, 'Irwinn', 'Rylatt', 'irylatt6@hubpages.com', '194.247.204.232', 'Male'),
					(8, 'Thedrick', 'Pichan', 'tpichan7@w3.org', '20.23.148.17', 'Male'),
					(9, 'Mindy', 'Steuart', 'msteuart8@weebly.com', '247.48.42.130', 'Female'),
					(10, 'Kailey', 'Snowding', 'ksnowding9@ibm.com', '73.181.206.152', 'Female'),
					(11, 'Lanette', 'Camden', 'lcamdena@foxnews.com', '126.45.10.242', 'Female'),
					(12, 'Naoma', 'Frankowski', 'nfrankowskib@nih.gov', '76.187.144.91', 'Female'),
					(13, 'Angel', 'Otterwell', 'aotterwellc@xinhuanet.com', '242.112.215.78', 'Male'),
					(14, 'Olivie', 'Radborn', 'oradbornd@techcrunch.com', '157.77.200.90', 'Female'),
					(15, 'Hakim', 'Fisbburne', 'hfisbburnee@cloudflare.com', '80.198.176.209', 'Male'),
					(16, 'Ashley', 'Sandell', 'asandellf@xinhuanet.com', '34.136.57.99', 'Male'),
					(17, 'Ronald', 'Brevitt', 'rbrevittg@pcworld.com', '160.19.101.128', 'Male'),
					(18, 'Melanie', 'Sollon', 'msollonh@ibm.com', '107.18.136.36', 'Female'),
					(19, 'Cece', 'Harold', 'charoldi@usatoday.com', '212.131.255.19', 'Male'),
					(20, 'Nolie', 'Ohrt', 'nohrtj@scribd.com', '170.205.6.3', 'Female'),
					(21, 'Wallie', 'De Vaar', 'wdevaark@businessinsider.com', '84.203.228.144', 'Male'),
					(22, 'Augusta', 'Lias', 'aliasl@reuters.com', '249.20.211.113', 'Female'),
					(23, 'Milly', 'Patesel', 'mpateselm@apple.com', '89.114.161.50', 'Female'),
					(24, 'Talyah', 'Crispe', 'tcrispen@engadget.com', '66.16.219.101', 'Female'),
					(25, 'Sashenka', 'Ruppeli', 'sruppelio@utexas.edu', '197.124.122.241', 'Female'),
					(26, 'Ruthi', 'Veronique', 'rveroniquep@senate.gov', '88.132.182.142', 'Female'),
					(27, 'Oona', 'Patridge', 'opatridgeq@usgs.gov', '115.168.29.119', 'Female'),
					(28, 'Boniface', 'Magor', 'bmagorr@wordpress.org', '248.231.251.43', 'Male'),
					(29, 'Aila', 'Colten', 'acoltens@tumblr.com', '77.174.243.170', 'Female'),
					(30, 'Marve', 'Castro', 'mcastrot@mtv.com', '188.228.132.200', 'Male'),
					(31, 'Angel', 'Presdee', 'apresdeeu@over-blog.com', '22.108.193.216', 'Male'),
					(32, 'Mehetabel', 'Holtom', 'mholtomv@omniture.com', '149.147.121.50', 'Female'),
					(33, 'Ammamaria', 'Penhalurick', 'apenhalurickw@time.com', '64.13.110.24', 'Female'),
					(34, 'Chad', 'Shillum', 'cshillumx@illinois.edu', '222.100.124.156', 'Male'),
					(35, 'Nina', 'Andino', 'nandinoy@opensource.org', '53.144.88.151', 'Female'),
					(36, 'Rene', 'Keems', 'rkeemsz@meetup.com', '55.202.152.65', 'Male'),
					(37, 'Helaine', 'Walne', 'hwalne10@mysql.com', '86.132.225.234', 'Female'),
					(38, 'Ezequiel', 'Osburn', 'eosburn11@dedecms.com', '161.51.95.227', 'Male'),
					(39, 'Darryl', 'Davall', 'ddavall12@upenn.edu', '207.176.10.22', 'Male'),
					(40, 'Melantha', 'Donoher', 'mdonoher13@bravesites.com', '65.174.188.200', 'Female'),
					(41, 'Sadye', 'Barlass', 'sbarlass14@wired.com', '29.68.172.173', 'Female'),
					(42, 'Essa', 'Lghan', 'elghan15@amazonaws.com', '65.236.23.184', 'Female'),
					(43, 'Eric', 'Teall', 'eteall16@oracle.com', '163.81.129.51', 'Male'),
					(44, 'Clevey', 'Starrs', 'cstarrs17@youtube.com', '181.155.162.203', 'Male'),
					(45, 'Baily', 'Simonite', 'bsimonite18@symantec.com', '88.237.231.117', 'Male'),
					(46, 'Sidnee', 'Ibbeson', 'sibbeson19@homestead.com', '138.46.69.0', 'Male'),
					(47, 'Alfonse', 'Dawnay', 'adawnay1a@w3.org', '95.120.84.170', 'Male'),
					(48, 'Catie', 'Masser', 'cmasser1b@taobao.com', '177.62.193.45', 'Female'),
					(49, 'Cammy', 'McOwan', 'cmcowan1c@comcast.net', '214.97.186.90', 'Female'),
					(50, 'Susana', 'Billings', 'sbillings1d@liveinternet.ru', '142.208.113.207', 'Female');
	 ");


	    echo "[<b style=\"color:rgba(0, 72, 255, 0.9);\">Info</b>] DB created successfully<br>";

	    $path_to_file = 'config.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace('define("DB_USER",',"define(\"DB_USER\",\"".$_POST['DB_username']."\");//",$file_contents);
		$file_contents = str_replace('define("DB_PASS",',"define(\"DB_PASS\",\"".$_POST['DB_password']."\");//",$file_contents);
		if( file_put_contents($path_to_file,$file_contents) === false){
			$dir = __DIR__;
			echo "[<b style=\"color:red;\">Error</b>] Ups! We don't have a permission to change content of config.php file!<br>" ;
		    echo "[<b style=\"color:rgba(0, 72, 255, 0.9);\">Info</b>] Just final step remains. Please open <b>{$dir}/config.php</b> file and change <b>DB_USER, DB_PASS </b>manually with [ <b>{$_POST['DB_username']}</b>:<b>{$_POST['DB_password']}</b> ]!<br><br>";
		    echo "<img src='./assets/img/conf.png'><br>";
		}else{
		    echo "[<b style=\"color:rgba(0, 72, 255, 0.9);\">Info</b>] config.php file modified successfully<br>";
			echo "[<b style=\"color:rgba(0, 72, 255, 0.9);\">Info</b>] Go to <a href=\"./\">Main</a>";
		}

	}
	catch(PDOException $e){
	    echo "[<b style=\"color:red;\">Error</b>] ".$sql . $e->getMessage() . '<br>';
	}
else:
?>
	<p>[<b style="color:rgba(0, 72, 255, 0.9);">Info</b>] Please insert your DataBase credentials! Default user is <b>root</b> and it suppose to valid everywhere but you are free to provide any.
	<br>
	[<b style="color:rgba(255, 72, 0, 0.9);">NB</b>] You should be able to authorize using those username and password in your mysql database!
	</p>
<?php 
endif;
?>

<br>
<form method="post">
	<input type="text" value="root" placeholder="DB_username" name="DB_username" required="">
	<input type="text" placeholder="DB_password" name="DB_password" autofocus="" autocomplete="off">
	<input type="submit" value="Install" name="install" style="color: blue;cursor: pointer;">
</form>