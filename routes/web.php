<?php

use App\Models\Tenancy;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;


Route::domain('{tenancy}.laravel.multi-tenancy')->group(function () {
    Route::get('/', function (string $tenancy) {
        $tenancy = Tenancy::whereDomain($tenancy . '.laravel.multi-tenancy')->firstOrFail();
        Config::set('database.', $tenancy->database);
        dd($tenancy->toArray());
    });
});


Route::get('/', function () {
    return view('welcome');
});
