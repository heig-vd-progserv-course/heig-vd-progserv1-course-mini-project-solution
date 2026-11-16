#!/usr/bin/env bash

## Install required packages
# Update packages list
sudo apt update

# Install network utilities (dig, nslookup, ping, ncat)
sudo apt install --yes dnsutils iputils-ping ncat

# Install PHP and related packages
sudo apt install --yes php-common php-cli sqlite3 php-sqlite3
