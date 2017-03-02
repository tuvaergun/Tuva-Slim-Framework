<?php

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Configure the database and boot Eloquent.
 */
$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'slim',
    'username'  => 'root',
    'password'  => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

date_default_timezone_set('Europe/Istanbul');
