# Cooking Recipient Collection - Kochrezeptesammlung

## used development-tools/framework

- Laravel v10
- Livewire

## create the workspace

### install php 
additional modules needed:
- php-sqlite3
- php-xml
- php-curl
- php-mbstring

### install composer

    sudo curl -sS https://getcomposer.org/installer -o composer-setup.php
    sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

### composer update

    composer update - installs all necessary dependendies for the project(composer.json)

### create symbolic links für storage 

    php artisan storage:link

# Deployment

## Deployment on simple WebSpace (like World4You)

### Prepare application

create the assets
    
    npm run build

### Upload

- create two folders on the WebSpace: crc and crc-app
- upload all to crc-app
- upload this files to crc:
    - public/build
    - index.php
    - .htaccess
    - make-symlink.php (replace [webspace-url] with the real path on the webspace)
    - favicon.ico
    - robots.txt

### execute the migration

    crc/mig-ra_te/...... token

### Symlink erstellen

    crc/make-symlink.php

