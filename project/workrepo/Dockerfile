FROM ubuntu:16.04
MAINTAINER rajesh
RUN apt-get -y update && apt-get install -y  apache2 
RUN apt-get -y install php libapache2-mod-php php-mcrypt php-mysql php-cli
RUN a2enmod php7.0
RUN a2enmod rewrite

RUN mkdir -p /var/www/html/workreport
RUN cd /home 
COPY .  /var/www/html/workreport

EXPOSE 80

CMD /usr/sbin/apache2ctl -D FOREGROUND
