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

INSERT INTO trp_users (user_id, email, password, avatar, reg_date_time, username) VALUES
(1, 'nimda@nimda.com', 'f99c91b8541a9a56909ed9b045de4ddeb1da99c1', 'undefined', '2018-01-10 22:36:27', 'nimda');

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
(4, 'Herc', 'Dog', 49, 'easy'),
(5, 'Fianna', 'Maymond', 28, 'medium'),
(6, 'Addy', 'Backshill', 13, 'medium'),
(7, 'Burke', 'Defew', 16, 'medium'),
(8, 'Herc', 'Dog', 49, 'medium'),
(9, 'Keith', 'Beet', 54, 'hard'),
(10, 'Alison', 'Mayou', 61, 'hard');
 
 
"



function connect {
  mysql --user="$1" --password="$2" --execute="$QUERY"
  if [ "$?" -eq "0" ]; then
    echo -e "All important components have been created successfully \n"
    echo -e "Default credentials for the user: \n"
    echo -e "nimda:nimda \nHappy Hunting"
  else
    echo "Error: Something happend :("
  fi
}

"$@"




# CREATE USER 'bug'@'%' IDENTIFIED WITH mysql_native_password AS '***';GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'bug'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;