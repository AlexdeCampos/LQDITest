FROM wyveo/nginx-php-fpm:php81

COPY . /usr/share/nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /usr/share/nginx

RUN apt update; \ 
    apt install vim -y

RUN ln -s public html

ADD . /var/www
RUN sudo chmod o+w ./storage/ -R

RUN apt -y update \
    && apt -y install curl \
    && curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    && apt -y install nodejs
RUN npm install \ 
    npm run watch