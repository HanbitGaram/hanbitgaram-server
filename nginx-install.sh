#!/bin/sh
# nginx 설치
sudo apt -y update
sudo apt -y install nginx
sudo apt -y install nginx-extras

sudo mkdir -p /etc/nginx/app/
sudo cp -R ./nginx/* /etc/nginx/app/

cd /etc/nginx/app
sudo openssl genrsa 2048 > default.key
sudo chmod 600 default.key
sudo openssl req -new -x509 -nodes -sha256 -days 3650 -key default.key -out default.crt

sudo cp /etc/nginx/nginx.conf /etc/nginx/nginx-default.conf
sudo cp /etc/nginx/app/nginx.conf /etc/nginx/nginx.conf
sudo cp /etc/nginx/app/vhost-default.conf /etc/nginx/sites-enabled/default

echo "========================================="
echo "Nginx 설치가 완료되었습니다."
echo "========================================="
sudo service nginx reload