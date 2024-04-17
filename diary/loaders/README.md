# Loaders Directory
this is the directory where stuff that either
a. should be able to be accessed by any user
or
b. stuff that is loaded by a different script in /php

# Permission info
if youre running an ubuntu server and you wish to keep zip support you will need to run these commands in THIS directory
```
sudo chown $USER:www-data zip
chmod -R 0777 zip
```
if youre on arch youre basically fucked
youre running a server with arch you can do it i believe in you

# specifics on the scripts

## file/folder footer.php
these are actually headers for the file and folder viewers
if you add your own features you will want to add them there

## folder.php
this is a redirect to a folder in the file viewer
its fucky but it works so `¯\_(ツ)_/¯`

## logecho.php
this is needed to be publicly available due to how ajax works

## isowner.php
YOU WILL NEED TO CHANGE THIS IN ORDER TO MAKE LOGS WORK.
you will need to change the `$allowed_ips = array("CHANGEME", $customip);` line to your own ip.
if you dont know how to get it
[google it](https://www.google.com/search?q=what%20is%20my%20ip)

## download.php
all this does is stream the data directly in order to circumvent the server displaying the php file
also has the benefit of allowing Firefox on android to actually download shit when used with auth_basic!

## zip.php
this is the last special file that isnt related to viewing files
all this does is zip a folder and make the user download it
if you want to disable the user being given the zip option just delete the one and only line in there
