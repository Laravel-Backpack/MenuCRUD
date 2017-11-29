# Backpack\MenuCRUD

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

An admin panel for menu items on Laravel 5, using [Backpack\CRUD](https://github.com/Laravel-Backpack/crud). Add, edit, reorder, nest, rename menu items and link them to [Backpack\PageManager](https://github.com/Laravel-Backpack/pagemanager) pages, external link or custom internal link.


> ### Security updates and breaking changes
> Please **[subscribe to the Backpack Newsletter](http://eepurl.com/bUEGjf)** so you can find out about any security updates, breaking changes or major features. We send an email every 1-2 months.


## Install

Since MenuCRUD is just a Backpack\CRUD example, you can choose to install it one of two ways.

**(A) Download and place files in your application** (recommended)

or

**(B) As a package**

The only PRO of installing it as a package is that you may benefit from updates. But the reality is there is very little (if any) bug fixing to do, so you probably won't need to update it, ever.



#### Installation type (A) - download


1) [Download the latest build](https://github.com/Laravel-Backpack/MenuCRUD/archive/master.zip).

2) Paste the 'app' and 'database' folders over your projects (merge them). No file overwrite warnings should come up.

3) Replace all mentions of 'Backpack\MenuCRUD\app' in the pasted files with your application's namespace ('App' if you haven't changed it):
- app/Http/Controllers/Admin/MenuItemCrudController.php
- app/Models/MenuItem.php

4) Run the migration to have the database table we need:
```
php artisan migrate
```

5) Add MenuCRUD to your routes file:

```
Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    // Backpack\MenuCRUD
    CRUD::resource('menu-item', 'MenuItemCrudController');
});
```

6) [optional] Add a menu item for it in resources/views/vendor/backpack/base/inc/sidebar.blade.php or menu.blade.php:

```html
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
```



#### Installation type (B) - package

1) In your terminal, run:

``` bash
$ composer require backpack/MenuCRUD
```

2) Then add the service providers to your config/app.php file:

```
Backpack\MenuCRUD\MenuCRUDServiceProvider::class,
```

3) Publish the migration:

```
php artisan vendor:publish --provider="Backpack\MenuCRUD\MenuCRUDServiceProvider"
```

4) Run the migration to have the database table we need:

```
php artisan migrate
```

5) [optional] Add a menu item for it in resources/views/vendor/backpack/base/inc/sidebar.blade.php or menu.blade.php:

```html
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
```



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Overwriting functionality

If you've used installation type A and need to modify how this works in a project: 
- create a ```routes/backpack/menucrud.php``` file; the package will see that, and load _your_ routes file, instead of the one in the package; 
- create controllers/models that extend the ones in the package, and use those in your new routes file;
- modify anything you'd like in the new controllers/models;

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@tabacitu.ro instead of using the issue tracker.

Please **[subscribe to the Backpack Newsletter](http://eepurl.com/bUEGjf)** so you can find out about any security updates, breaking changes or major features. We send an email every 1-2 months.

## Credits

- [Cristian Tabacitu][link-author]
- [All Contributors][link-contributors]

## License

Backpack is free for non-commercial use and 39 EUR/project for commercial use. Please see [License File](LICENSE.md) and [backpackforlaravel.com](https://backpackforlaravel.com/#pricing) for more information.

[ico-version]: https://img.shields.io/packagist/v/backpack/MenuCRUD.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Laravel-Backpack/MenuCRUD/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Laravel-Backpack/MenuCRUD.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Laravel-Backpack/MenuCRUD.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/MenuCRUD.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/MenuCRUD
[link-travis]: https://travis-ci.org/Laravel-Backpack/MenuCRUD
[link-scrutinizer]: https://scrutinizer-ci.com/g/Laravel-Backpack/MenuCRUD/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Laravel-Backpack/MenuCRUD
[link-downloads]: https://packagist.org/packages/backpack/MenuCRUD
[link-author]: https://github.com/tabacitu
[link-contributors]: ../../contributors
