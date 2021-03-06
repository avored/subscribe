<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])
    ->namespace('AvoRed\Subscribe\Http\Controllers')
    ->group(function () {


        Route::post('/subscribe', 'SubscribeController@store')
            ->name('subscribe.store');

    });


$baseAdminUrl = config('avored-ecommerce.admin_url');



Route::middleware(['web', 'admin.auth', 'permission'])
    ->prefix($baseAdminUrl)
    ->name('admin.')
    ->namespace('AvoRed\Subscribe\Http\Controllers\Admin')
    ->group(function () {

        Route::resource('subscribe', 'SubscribeController');
    });