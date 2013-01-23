nexusCheck
==========

Simple demo app checking if the nexus 4 is availble yet. Utilizing Composer,  Symfony Components and Mink.
It is supposed to send you an email when nexus is availble. Yes it's naive.


Just copy the config.yml.dist to config.yml and set your email in there. 
than install composer and run


`$ ./composer.phar install`

add  `php /path/to/yours/nexusCheck.php` to your crontab
