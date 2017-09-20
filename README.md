# Impersonation (Laravel Authentication)

Laravel 5 package to enable impersonation.
Debugging a problem and need to login as one of your customers? This allows you to authenticate as any of your customers.

See it in action at a [Laravel Admin Starter](https://github.com/bpocallaghan/laravel-admin-starter) project.

## Installation

Update your project's `composer.json` file.

```
composer require bpocallaghan/impersonate --dev
```

`Laravel <5.4 only (Laravel 5.5 has automatic package discovery)`<br/>
Register the Service Provider in your `config/app` or in your `app/Providers/AppServiceProvider.php` to only allow it for development.

```php
public function register()
{
    if ($this->app->environment() == 'local') {
        $this->app->register(\Bpocallaghan\Impersonate\ImpersonateServiceProvider::class);
    }
}
```

## Usage

`impersonate()->login($user)` Impersonate the given user and save the currently logged in user in session.<br/>
`impersonate()->logout()` Logout the impersonated user and log the original user back in.<br/>
`impersonate()->isActive()` If the logged in user is currently being impersonated by another user.

You can register your own routes. For example you want to change the endpoints or update the middlewares, etc.
If you need to do additional validation, register your own Controller and only use the above methods.
You can create your own view file to handle the login / logout functionality. The view file included is mostly for reference.

### Config

`register_routes` If the package will register the routes or if you rather prefer to add your own.<br/>
`session` The session keys that will be used. Save original user and if currently impersonating a user.

#### Publish Assets (optional)

Publish the config and view file.
```
php artisan vendor:publish --provider="Bpocallaghan\Impersonate\ImpersonateServiceProvider" --tag=view
php artisan vendor:publish --provider="Bpocallaghan\Impersonate\ImpersonateServiceProvider" --tag=config
```

In your view forms to login or logout.
You can add a hidden input with name `'redirect_to'` to specify the return redirect to url after login / logout.


## Disclaimer

Please use the package with caution.
By using this package, you agree that the contributors of this package cannot be held responsible for any damages caused by using this package.
