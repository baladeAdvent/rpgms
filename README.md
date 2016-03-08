RPG Management System
Pet project to setup a rich system for allowing groups to set up worlds and characters and facilitate playing online with fun features.

~baladeAdvent

Init Vagrant:

    vagrant init puphpet/centos65-x64
    vagrant up


Symfony Install:

    $ composer create-project symfony/framework-standard-edition my_project_name "2.8.*"


Edit Hosts File: C:/Windows/System32/drivers/etc/hosts & add these two lines:

    192.168.99.90    rpg.dev www.rpg.dev
    192.168.99.90    rpgdev.computer www.rpgdev.computer

FastCGI fix

    fastcgi_pass 127.0.0.1:9000;

Copy Symfony.conf over to the /etc/nginx/sites-enabled folder

    $ sudo cp /vagrant/symfony.conf /etc/nginx/sites-enabled/symfony.conf
    $ cd /etc/nginx/sites-enabled
    $ sudo rm -rf {notsymfonyor_}.conf
    $ sudo service nginx restart