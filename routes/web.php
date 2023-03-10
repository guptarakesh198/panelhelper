<?php

use Illuminate\Support\Facades\Route;

Route::get('/plugin_page', function () {
    return view('panelhelper::welcome');
});
