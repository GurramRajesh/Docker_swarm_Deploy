FROM ubuntu:16.04
MAINTAINER rajesh
RUN apt-get -y update && apt-get install -y  apache2 && apt-get install -y vim 
RUN apt-get -y install php libapache2-mod-php php-mcrypt php-mysql php-cli
RUN a2enmod php7.0
RUN a2enmod rewrite

RUN mkdir -p /var/www/html/workrepo
RUN cd /home 
COPY workrepo /var/www/html/workrepo
RUN  sed -i 's/localhost/trellodatabase.cso7rxzaby4d.ap-south-1.rds.amazonaws.com/g' /var/www/html/workrepo/connect.php

EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
