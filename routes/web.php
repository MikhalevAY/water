<?php

// Todo remove on stage/prod

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

define('STDIN', fopen("php://stdin", "r"));

Route::get('/artisan/{command}', function (string $command) {
    switch ($command) {
        case 'db' :
            Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
            break;
        case 'storage':
            Artisan::call('storage:link');
            break;
    }
});
