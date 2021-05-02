# Speedest

[![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)

PRs and issues is welcome!

----------

## Getting started

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation#installation)

Clone the repository.

    git clone https://github.com/Atiladanvi/speedest.git

Switch to the repo folder.

    cd speedest

Install all the dependencies using composer.

    composer install

Install all the node dependencies using npm.

    npm install

Compile the css and javascript assets.

    npm run dev #For local
    npm run prod #For Production

Install required application things.

    php artisan speedest:install

Copy the example env file and make the required configuration changes in the .env file.

    cp .env.example .env

* Social login
 If you want to activate the social login make sure if you put the follows credentials below.

```.env
GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_CLIENT_CALLBACK=
```

Generate a new application key.

    php artisan key:generate
    
Flush de application cache.

    php artisan cache:clear
    php artisan route:clear
    php artisan config:clear
    php artisan view:clear
    php artisan optimize

Run the database migrations (**Set the database connection in .env before migrating**).

    php artisan migrate

Start the local development server.

    php artisan serve

You can now access the server at http://localhost:8000.

**TL;DR command list**

    git clone https://github.com/Atiladanvi/speedest.git
    cd speedest
    composer install
    npm install
    npm run dev
    cp .env.example .env
    php artisan speedest:install
    php artisan cache:clear
    php artisan route:clear
    php artisan config:clear
    php artisan view:clear
    php artisan optimize
    php artisan optimize
    php artisan migrate
    php artisan serve
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables).

## Demo Application

You can set faker data using our assistant.

    php artisan speedest:setup

This will create a user with the follow credentials:

**E-mail**: usain@speedest.dev

**Password**: UsainBolt

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email `atila.danvi@outlook.com` instead of using the issue tracker.

### Credits

- [Atila Silva](https://github.com/Atiladanvi)
- [All Contributors](../../contributors)

### License

The MIT License. Please see [license file](LICENSE.md) for more information.
