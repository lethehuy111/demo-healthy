## Install source backend

    git clone git@github.com:lethehuy111/interview-arent.git

    cd interview-arent/backend/

    ./composer-install.sh 

    docker network create sail

    ./vendor/bin/sail up -d
        cp .env.example .env

   # Note: open file .env and update 

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=app
    DB_USERNAME=app
    DB_PASSWORD=secret   
    FILESYSTEM_DRIVER=public

   # Storage permision issue

    ./vendor/bin/sail exec php-fpm /bin/bash

    php artisan key:gen

    chown -R www-data:www-data /var/www/storage

    chmod -R 775 /var/www/storage

    php artisan migrate

    php artisan db:seed
    
    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
    
    php artisan jwt:secret

    php artisan storage:link
    
    composer dump-autoload
    
    exit

## Start source frontend 

    cd ../frontend/
    cp .env.example .env

# Note: open file .env and update
    API_URL=http://localhost:81/api/v1   
    API_PROTOCOL=http       //Config Read image api
    API_HOSTNAME=localhost  //Config Read image api
    API_POST=81              //Config Read image api
#Run 

    npm install --legacy-peer-deps
    
    npm run dev

# Link TopPage : http://localhost:3000/
# Link Column page without Login : http://localhost:3000/landing-page
# Link Login : http://localhost:3000/login  // user : huylt@gmail.com / 123456

#The system don't have manage page , but we can develop below : 
- add diets, dish , news , update history heath for customer each month
- customer can chose diet, update dietDay and follow diet each day
# Refer structure Db : erd.png 
    
