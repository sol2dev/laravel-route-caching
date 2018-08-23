# Laravel route caching.

## Configuration

To configure the package you need to publish settings first:
```
php artisan vendor:publish --provider="App\Providers\RouteCachingServiceProvider"
```

## Installation

Add the following providers in `config/app.php`:

```php
'providers' => [
    App\Providers\RouteCachingServiceProvider::class,
]
``` 
