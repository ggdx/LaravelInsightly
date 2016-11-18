# LaravelInsightly
## Getting started
### Composer
`composer require ggdx/laravel-insightly`

### Laravel
Add the provider:
```php
'providers' => [
    GGDX\LaravelInsightly\InsightlyServiceProvider::class,
]
```
Add the facade:
```php
'aliases' => [
    'Insightly' => GGDX\LaravelInsightly\InsightlyFacade::class,
]
```
Generate the config file:
```php
php artisan vendor:publish
```
If using version control, add `INSIGHTLY_KEY=your_key` to the .env or add your key directly to config/insightly.php
***
## More info
[Read the SDK repository](https://github.com/ggdx/php-insightly)
