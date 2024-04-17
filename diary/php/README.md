# PHP Directory
this is for files people shouldnt be accessing alone for security issues
it is expected you block access to this directory

# CHANGE THE PASSWORD IN enc-set.php
this is settings for the encryption to the logs
considering this is quite basically an ip logger you WILL. need to change the password
if you cant move the log location out of the way you should at least change the password

# disabling logging
if you want to disable logging entirely just blank out logging.php
if youre inclined enough you can remove all mentions but
thats HARD.

# permissions
in order to get logs working php needs to have write access
for those of you with ubuntu just run this in the root directory of the diary.
```
sudo chown $USER:www-data logs.txt
chmod -R 0777 logs.txt
```
