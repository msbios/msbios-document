#!/usr/bin/env bash

# Start backup
echo "[--------------------------------[`date +%F-%H:%M:%S`]--------------------------]"
echo "     ____.         .___      .__    .__            _____  .__.__                 "
echo "    |    |__ __  __| _/______|  |__ |__| ____     /     \ |__|  |   ____   ______"
echo "    |    |  |  \/ __ |\___   /  |  \|  |/    \   /  \ /  \|  |  | _/ __ \ /  ___/"
echo "/\__|    |  |  / /_/ | /    /|   Y  \  |   |  \ /    Y    \  |  |_\  ___/ \___ \ "
echo "\________|____/\____ |/_____ \___|  /__|___|  / \____|__  /__|____/\___  >____  >"
echo " info[at]msbios.com \/      \/    \/        \/          \/             \/     \/ "

# Database credentials
user="root"
password="root"
host="localhost"
port="3306"
db_name="kubnete.dev"

# Other options
backup_path="./data/cache"
date=$(date +"%F-%H:%M")

# Set default file permissions
umask 177

# Dump database into SQL file
mysqldump --routines --user=$user --password=$password --host=$host --port=$port $db_name > $backup_path/$db_name-$date.sql

# Delete files older than 30 days
find $backup_path/* -mtime +30 -exec rm {} \;