FROM debian

RUN apt-get update && apt-get -y install apache2 \
	curl \
	default-mysql-server \
	default-mysql-client \
	php \
	php-curl \
	php-mysql \
	php-xdebug




EXPOSE 80
ENTRYPOINT service apache2 start && service mysql start && /bin/bash

