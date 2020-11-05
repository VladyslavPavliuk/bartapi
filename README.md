<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## How to work with this project:

1. **Run _composer install_**.

2. **Run _npm install && npm run dev_**.

3. **Rename .env-example file to ".env"**.

4. **Configure your .env file** (_Select your database name(DB_DATABASE), host(DB_HOST), username(DB_USERNAME), password(DB_PASSWORD)_). 

5. **Migrate database and seeds** (run in your terminal _php artisan migrate:refresh --seed_).

6. **Run in your terminal** _php artisan key:generate_.

7. **Go to your local server or run in your terminal** _php artisan serve_ **and enjoy!**

## API:

1. /api/gallery           |GET| |POST| - get and store new gallery. |name| - required param, gallery name.

2. /api/gallery/{path}    |GET| |POST| |DELETE| - get concret gallery, upload image, |image| param. {path} - "path" from 'api/gallery'.

3. /api/images/{path}     |GET| - get and download concret image, {path} - "image" from '/api/gallery'.

