<?php
//setlocale(LC_TIME, 'Russian');
// init session
if (!isset($_SESSION)) session_start();

// load environment variable
require_once __DIR__ . '/../app/config/_env.php';

// init database
new \App\Classes\Database();

// set custom error handler
set_error_handler([
    new \App\Classes\ErrorHandler(),
    'handleErrors'
]);

require_once __DIR__ . '/../app/routing/routes.php';

new \App\RouteDispatcher($router);
