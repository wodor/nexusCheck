nexusCheck
==========

Simple demo app checking if the nexus 4 is availble yet. Utilizing Composer,  Symfony Components and Mink.
It is supposed to send you an email when nexus is availble. Yes it's naive.

Just copy the config.yml.dist to config.yml and set your email in there. 
than install composer and run

`$ ./composer.phar install`

add  something like 
`17    *    *    *    *     cd /home/wodor/nexusCheck; php -f nexuscheck.php > /dev/null 2>&1`
to your crontab (this will run check on 17th minute every hour)  

To make sure that you receive emails you can change url or classname in config to invalid and run the script. 
You should receive an false positive.








