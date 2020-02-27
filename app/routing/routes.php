<?php

$router = new AltoRouter();
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

// for admin routs
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@index', 'admin_dashboard');