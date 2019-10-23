#!/bin/bash

## @todo: remove analytics and other garbage files before zipping
## @todo: show a help screen...?
## @todo: show a splash screen

figlet chug

echo Downloading: $1

T=$(date +%s)

PROCURL=$(echo $1 | sed -e "s|^https://||" | sed -e "s|^http://||" | sed -e "s|/|.|g" | tr -cd '[:alnum:]._-')

mkdir /tmp/$PROCURL

cd /tmp/$PROCURL

echo $t > .chug.timestamp

wget --recursive --html-extension --convert-links --restrict-file-names=windows --no-directories --no-parent --level=1 --span-hosts --tries=5 --timeout=5 ${1}

7z a -mx9 /tmp/$PROCURL.7z /tmp/$PROCURL/*

mv -fv /tmp/$PROCURL.7z /data
