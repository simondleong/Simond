# YeeDate
Dating website that uses your preferences to find you better matches

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
You need to have these installed in your system:

* [Laravel](https://www.laravel.com) - PHP Framework
* [npm](https://www.npmjs.com/) - Javascript Package Manager
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* A web development server (we use [xampp](https://www.apachefriends.org/index.html))

### Installing
Please follow these instructions step by step to get your
development environment running.

Install dependencies
```
composer install
```

Generate Application Key
```
php artisan key:generate
```

Create database (Run in your mysql command line)
```
CREATE DATABASE yeedate;
```

Run migration
```
php artisan migrate
```

Run database seed (optional)
```
php artisan db:seed
```

Install front end dependencies for the first time
```
npm install
```

Compile Javascript files (after modifying scripts in resources/assets/js)
```
npm run dev
```

Run development server
```
php artisan serve
```

### Additional Commands

Clear and cache config (after modifying config file)
```
php artisan config:cache
```

Regenerate the list of all classes that need to be included in 
the project
```
composer dump-autoload
```
## Built With

* [Laravel](https://laravel.com) - The PHP Framework For Web Artisans
* [VueJS](https://vuejs.org/) - The Progressive Javascript Framework
* [Cupid Love](https://themeforest.net/item/cupid-love-dating-website-html5-template/20097943) - HTML 5 Template
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* [PayPal SDK](https://paypal.github.io/PayPal-PHP-SDK/) - PayPal PHP SDK
* [Pusher](https://pusher.com) - Hosted APIs to Build Realtime Apps with Less Code
