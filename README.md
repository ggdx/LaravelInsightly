# LaravelInsightly
## Getting started
### Composer
`composer require danw1/laravel-insightly`

### Laravel
Add the provider:
```php
'providers' => [
    DanW1\LaravelInsightly\InsightlyServiceProvider::class,
]
```
Add the facade:
```php
'aliases' => [
    'Insightly' => DanW1\LaravelInsightly\InsightlyFacade::class,
]
```
Generate the config file:
```php
php artisan vendor:publish
```
If using version control, add `INSIGHTLY_KEY=your_key` to the .env or add your key directly to config/insightly.php
***
## More info
[Read the wiki](https://github.com/ggdx/LaravelInsightly/wiki)
