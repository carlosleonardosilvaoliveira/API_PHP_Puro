<?php

require __DIR__.'/../vendor/autoload.php';

use App\core\Database;
use App\core\Environment;
use App\Http\Middleware\Queue as MiddlewareQueue;

Environment::load(__DIR__.'/../');

Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS')
);

define('URL', getenv('URL'));

MiddlewareQueue::setMap([
    'maintenance' => \App\Http\Middleware\Maintenance::class
]);

MiddlewareQueue::setDefault([
    'maintenance'
]);