<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Base\IndexController@index')->name('welcome');
