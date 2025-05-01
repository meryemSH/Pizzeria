<?php

use Illuminate\Support\Facades\Route;

// optimize:clear
Route::get('/artisan/optimize:clear', function () {
    \Artisan::call('optimize:clear');
    dump(\Artisan::output());
});

//optimize
Route::get('/artisan/optimize', function () {
    \Artisan::call('optimize');
    dump(\Artisan::output());
});

// storage:link
Route::get('/artisan/storage:link', function () {
    \Artisan::call('storage:link --force');
    dump(\Artisan::output());
});

// artisan migrate
Route::get('/artisan/migrate', function () {
    \Artisan::call('migrate');
    dump(\Artisan::output());
});

Route::get('/artisan/migrate:fresh-seed', function () {
    \Artisan::call('migrate:fresh --seed');
    dump(\Artisan::output());
});

// artisan down
Route::get('/artisan/down', function () {
    \Artisan::call('down');
    dump(\Artisan::output());
});

// artisan up
Route::get('/artisan/up', function () {
    \Artisan::call('up');
    dump(\Artisan::output());
});
