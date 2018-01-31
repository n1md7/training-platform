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
  CREATE DATABASE traning_platform;

  USE traning_platform;

  CREATE TABLE traning_platform.trp_users ( user_id INT(5) NOT NULL AUTO_INCREMENT ,
  email VARCHAR(40) NOT NULL , password VARCHAR(40) NOT NULL , avatar TEXT NOT NULL ,
  reg_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (user_id))
  ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

  INSERT INTO trp_users (user_id, email, password, avatar, reg_date_time)
  VALUES (NULL, 'admin@trp.com', 'admin',
  'https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fcdn01.wallconvert.com%2F_media%2Fwallpapers_1920x1080%2F1%2F1%2Fneytiri-avatar-5824.jpg&f=1',
  CURRENT_TIMESTAMP);
"




function connect {
  mysql --user="$1" --password="$2" --execute="$QUERY"
  if [ "$?" -eq "0" ]; then
    echo -e "All important components have been created successfully \n"
    echo -e "Default credentials for the user: \n"
    echo -e "admin@trp.com admin \n Happy Hunting"
  else
    echo "Error: Something happend :("
  fi
}

"$@"




# CREATE USER 'bug'@'%' IDENTIFIED WITH mysql_native_password AS '***';GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'bug'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;