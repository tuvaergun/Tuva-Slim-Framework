<?php

ob_start();
session_start();

require_once 'vendor/autoload.php';

$app = new Slim\Slim([
    'view'           => new \Slim\Views\Blade(),
    'templates.path' => 'app/view',
]);

define('LANG', Tuva::dil());

$app->add(new \Slim\Middleware\SessionCookie(['secret' => 'TuvaDeveloperSecret']));

$app->config([
    'view'               => new \Slim\Views\Blade(),
    'cookies.secret_key' => 'TuvaDeveloperSecret',
    'log.enable'         => true,
    'log.path'           => 'app/logs',
    'log.level'          => 4,
    'debug'              => true,
    'sessions.files'     => 'app/session',
]);

$view = $app->view();
$view->parserOptions = [
    'debug' => true,
    'cache' => dirname(__FILE__).'/cache',
];

$Input = $app->request();

require_once 'app/filter.php';

// Otomatik rutur yukleyici
$routers = glob('app/routes/*.php');
foreach ($routers as $router) {
    require_once $router;
}

$app->run();

/*
 * Log tutuyor...
 */
if ($logs = Log::where('ip', $app->request->getIp())->where('agent', $app->request->getUserAgent())->first()) {
    $logs->hit += 1;
    $logs->save();
} else {
    $newlogs = new Log();
    $newlogs->ip = $app->request->getIp();
    $newlogs->agent = $app->request->getUserAgent();
    $newlogs->save();
}
