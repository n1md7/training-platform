clear
echo -e '
mmmmmmm mmmmm  mmmmm
   #    #   "# #   "#
   #    #mmmm" #mmm#"
   #    #   "m #
   #    #    " #
'
echo -e "Welcome to Traning Platform DB setup \n"
echo -e "help:\n bash conn2mysql.sh connect [ username ] [ password ] \n"
echo -e "example:\n bash conn2mysql.sh connect  root  p@ssw0rd \n"




QUERY="
          DROP DATABASE if exists training_platform;

          CREATE DATABASE IF NOT EXISTS training_platform;

          USE training_platform;
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

          CREATE TABLE IF NOT EXISTS users (
            id int(7) NOT NULL,
            first_name varchar(33) NOT NULL,
            last_name varchar(33) NOT NULL,
            email varchar(45) NOT NULL,
            ip_address varchar(16) NOT NULL,
            gender varchar(6) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

          ALTER TABLE trp_users
            ADD PRIMARY KEY (user_id);

          ALTER TABLE trp_users
            MODIFY user_id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

          ALTER TABLE xss_stored
            ADD PRIMARY KEY (id);
           
          ALTER TABLE xss_stored
            MODIFY id int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
           
          ALTER TABLE users
            ADD PRIMARY KEY (id);

          ALTER TABLE users
            MODIFY id int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

          INSERT INTO trp_users (user_id, email, password, avatar, reg_date_time, username) VALUES
          (1, 'nimda@nimda.com', 'f99c91b8541a9a56909ed9b045de4ddeb1da99c1', 'avatar_1.jpg', '2018-01-10 22:36:27', 'nimda');
           
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

          INSERT INTO users (id, first_name, last_name, email, ip_address, gender) VALUES
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
 
"



function connect {
  mysql --user="$1" --password="$2" --execute="$QUERY"
  if [ "$?" -eq "0" ]; then
    echo -e "All important components have been created successfully \n"
    echo -e "Don't forget to change in config.php DB_USER and DB_PASS as well \n"
    echo -e "Default credentials for the user authentication: \n"
    echo -e "nimda:nimda \nHappy Hunting"
  else
    echo "Error: Something happend :("
  fi
}

"$@"




# CREATE USER 'bug'@'%' IDENTIFIED WITH mysql_native_password AS '***';GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'bug'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;