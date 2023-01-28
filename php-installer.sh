#!/bin/sh
sudo apt -y update
sudo apt -y install ca-certificates
sudo apt -y install gnupg
sudo apt -y install gnupg2

# https://gist.github.com/janus57/37b079a383dd0507149bd94fd35053d1
sudo wget https://packages.sury.org/php/apt.gpg -O /etc/apt/trusted.gpg.d/php-sury.gpg
sudo echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php-sury.list
sudo apt update

# 내부용으로 사용할 PHP이기 때문에 아파치 설치를 하지 않음.
sudo apt -y install php8.2-cli
sudo apt -y install php8.2-zip
sudo apt -y install php8.2-xml
sudo apt -y install php8.2-bcmath
sudo apt -y install php8.2-ldap
sudo apt -y install php8.2-gd
sudo apt -y install php8.2-iconv
sudo apt -y install php8.2-mbstring
sudo apt -y install php8.2-curl
sudo apt -y install php8.2-json
sudo apt -y install php8.2-intl
sudo apt -y install php8.2-mysqli
sudo apt -y install php8.2-phar
sudo apt -y install php8.2-dev
sudo apt -y install php8.2-common
sudo apt -y install php8.2-apc
sudo apt -y install php8.2-ftp
sudo apt -y install php8.2-gettext
sudo apt -y install php8.2-tokenizer