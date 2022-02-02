# Training-platform for web application security

# How to use

```bash
# clone it first
git clone https://github.com/n1md7/training-platform.git

# From the project root directory run
docker compose up -d

# run db migrations
curl --location --request POST 'http://localhost:8000/install.php' \
--form 'install="yes"' \
--form 'DB_username="user"' \
--form 'DB_password="password"'
```

Application is running on http://localhost:8000 (phpmyadmin is available on http://localhost:8001)

## Requirements

- ~~Apache webserver~~
- ~~Mysql database~~
- Docker 🐳
- Computer 💻😬

## ~~Manual Installation~~

- ~~download zip file or git clone https://github.com/n1md7/training-platform.git~~
- ~~Start apache + mysql~~
- ~~Just run from your favorite browser~~
- ~~It will ask your Database user and password. User by default is root and password could be blank as well but better to
  know your DB pass. Write password, submit form and you are done!~~

<img src="./assets/img/front1.png" alt="">
<img src="./assets/img/front2.png" alt="">
<img src="./assets/img/front3.png" alt="">
<img src="./assets/img/front4.png" alt="">
