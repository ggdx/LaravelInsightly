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

### Example:
```php
use Insightly;
```
and then
```php
Insightly::getContacts();
```

... or if you prefer dependency injection ...

```php
use Insightly;

private $insightly;

public function __construct(Insightly $insightly)
{
    $this->insightly = $insightly;
}
```
and then in some method
```php
$this->insightly->getContacts();
```


## More info
[See the SDK repository](https://github.com/ggdx/php-insightly)
