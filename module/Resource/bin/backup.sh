#!/usr/bin/env bash

# Database credentials
user="root"
password="root"
host="localhost"
db_name="kubnete.dev"

# Other options
backup_path="../data"
date=$(date +"%d-%b-%Y")

# Set default file permissions
umask 177

# Dump database into SQL file
mysqldump --routines --no-create-info --user=$user --password=$password --host=$host $db_name > $backup_path/$db_name-$date.sql

# Compress the backup file
7z a $backup_path/$db_name-$date.7z $backup_path/*.sql

# Remove the original sql file
rm -I $backup_path/*.sql

# Delete files older than 30 days
find $backup_path/* -mtime +30 -exec rm {} \;