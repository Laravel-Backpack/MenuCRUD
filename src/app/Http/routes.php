<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('menu-item', 'MenuItemCrudController');
});
