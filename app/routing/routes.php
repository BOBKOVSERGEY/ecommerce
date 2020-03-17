<?php

$router = new AltoRouter();
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

// for admin routs
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@index', 'admin_dashboard');
$router->map('POST', '/admin', 'App\Controllers\Admin\DashboardController@get', 'admin_form');

// product management
$router->map('GET', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
$router->map('POST', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@store', 'create_product_category');
$router->map('POST', '/admin/product/categories/[i:id]/edit',
    'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category');