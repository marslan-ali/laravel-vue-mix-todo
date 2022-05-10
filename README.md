<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a> <br><a href="https://vuejs.org" target="_blank" rel="noopener noreferrer"><img width="100" src="https://vuejs.org/images/logo.png" alt="Vue logo"></a></p>

### INSTALLATION GUIDE
1. Clone the project
1. ``cd`` to the project and run ``composer install`` on the terminal to install php dependencies
1. copy the `.env-example` file to `.env` file 
1. Create a Mysql database and edit the ``.env`` to reflect your connections as follows:
1. Migrate your migrations: `php artisan migrate`
1. Generate application encryption key: `php artisan key:generate`
1. Run `npm install` to install node.js dependencies
1. Run ` npm run dev or npm run watch` to compile
1. Start your development server and start testing the web app. `php artisan serve --port 8080`
