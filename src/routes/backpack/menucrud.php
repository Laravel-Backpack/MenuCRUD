<?php

/*
|--------------------------------------------------------------------------
| Backpack\MenuCRUD Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\MenuCRUD package.
|
*/

Route::group([
    'prefix' => config('backpack.base.route_prefix'),
    'middleware' => ['web', 'admin'],
    'namespace' => 'Backpack\MenuCRUD\app\Http\Controllers\Admin',
], function () {
    CRUD::resource('menu-item', 'MenuItemCrudController');
});
