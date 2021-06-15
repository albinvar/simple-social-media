<p align="center"><a href="https://social.sjcvaipur.in" target="_blank"><img src="https://i.ibb.co/7nDB1kD/Pics-Art-06-14-08-24-08.png" width="180"></a></p>

<h1 align="center">Simple Social Media</h1>

## Table of Contents 
- [Introduction](#introduction)
- [Installation](#installation)
- [Features](#features)
- [Credits](#credits)
- [Contributing](#contributing)
- [License](#license)

## Introduction

A very Simple Social media web application built with laravel Jetstream and livewire.

The application is designed and tested to use conveniently without any issues.

## Features

- Built with Laravel 8
- Jetstream (Livewire + blade stack)
- Create posts
- Like posts
- Comment on posts
- Delete posts
- Delete Comments
- On-time image uploads
- Dynamic and Responsive Design
- Compile and minify assets (200 kb resources)
- Many more features....

## Installation

- Clone this repo using any method (https, ssh, gh cli)

- Set the configuration file using the command 
``` cp .env.example .env ```

- Install all required packages via composer. ``` composer install ```

- Set up Database configuration inside .env file.

- Run the migration and seeder

```
php artisan migrate --seed
```

- Install all dependencies via `npm` or `yarn` and Compile all assets based on your deployment environment. 

#### Yarn (recommended)
```bash
#Install all dependencies
yarn

#Development
yarn dev

#Production
yarn prod
```

#### Npm
```bash
#Install all dependencies
npm install

#Development
npm dev

#Production
npm prod
```

- Start the local server using the command
```
php artisan serve
```

### Current Admin Credentials

You may use these credentials to log into your website. you can change these credentials shortly after logging in.

**Email** : admin@gmail.com<br>
**Password** : password


## Generating Dummy Data

```
php artisan db:seed --class="DummyDataSeeder"
```

## Tests

```bash
php artisan test
```
## Credits

- [@albinvar](https://github.com/albinvar)

## License

[MIT](LICENSE) © Albin Varghese
