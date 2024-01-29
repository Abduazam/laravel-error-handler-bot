# Error Handler bot
[![Latest Version on Packagist](https://img.shields.io/packagist/v/Abduazam/error-handler-bot?style=flat)](https://packagist.org/packages/abduazam/error-handler-bot)
[![Total Downloads](https://img.shields.io/packagist/dt/Abduazam/error-handler-bot?style=flat)](https://packagist.org/packages/abduazam/error-handler-bot)

## Documentation, Installation, and Usage Instructions
This packages allows you to handle errors and send through telegram bot to your group or channel of developers.

## Download
Install via composer:
``` bash
composer require abduazam/error-handler-bot
```

Publish vendor:
``` bash
php artisan vendor:publish
```

Choose `ErrorHandlerBot` Service:

![image](https://github.com/Abduazam/laravel-error-handler-bot/assets/58428722/9ae3a724-2d6c-4e74-b335-df1af4e096b4)

## Configuration
Configure `error-handler-bot.php` in config folder. Put your Telegram Bot `API-Token` and your group or channel ID:

![image](https://github.com/Abduazam/laravel-error-handler-bot/assets/58428722/902cca3c-84c9-416f-a92f-b245b721708c)

## Usage
Call `ErrorHandlerBot` class on your Exception Handler class's `register()` method:

![image](https://github.com/Abduazam/laravel-error-handler-bot/assets/58428722/2a58dd5b-6349-4247-9c31-a83fc8c6531d)
