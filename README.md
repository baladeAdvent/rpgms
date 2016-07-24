RPG Management System
Pet project to setup a rich system for allowing groups to set up worlds and characters and facilitate playing online with fun features.

~baladeAdvent

Update Schema:

    php bin/console doctrine:schema:update --force

Generate Entities:
    
    php bin/console doctrine:generate:entity

Generate Getters/Setters:

    php bin/console doctrine:generate:entities AppBundle/Entity/Product

Init Vagrant:

    vagrant init puphpet/centos65-x64
    vagrant up


Symfony Install:

    $ COMPOSER_PROCESS_TIMEOUT=2000 composer install


Edit Hosts File: C:/Windows/System32/drivers/etc/hosts & add these two lines:

    192.168.99.90    rpg.dev www.rpg.dev
    192.168.99.90    rpgdev.computer www.rpgdev.computer


Setup Permissions:

    $ sudo chmod 0777 /usr/share/nginx/html --recursive


FastCGI fix

    fastcgi_pass 127.0.0.1:9000;


Copy Symfony.conf over to the /etc/nginx/sites-enabled folder

    $ sudo cp /vagrant/symfony.conf /etc/nginx/sites-enabled/symfony.conf
    $ cd /etc/nginx/sites-enabled
    $ sudo rm -rf {notsymfonyor_}.conf
    $ sudo service nginx restart


"There was an error when attempting to rsync a synced folder"
    
    Edit $VAGRANT_HOME\embedded\gems\gems\vagrant-1.8.0\plugins\synced_folders\rsync\helper.rb

    Remove the following codes (line 77~79):

    "-o ControlMaster=auto " +
    "-o ControlPath=#{controlpath} " +
    "-o ControlPersist=10m " +


"SSH: * private_key_path file must exist: P://.vagrant.d/insecure_private_key"

    delete the id_rsa files in puphpet\files\dot\ssh