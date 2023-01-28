#!/bin/sh
sudo apt -y update
sudo apt -y install ca-certificates
sudo apt -y install git
sudo curl -fsSL https://get.docker.com/ | sudo sh