<?php

require_once __DIR__ . '/../bootstrap/init.php';

$appName = getenv('APP_NAME');

//var_dump(in_array('mod_rewrite', apache_get_modules()));

use Illuminate\Database\Capsule\Manager as Capsule;

$user = Capsule::table('users')->where('id', 1)->first();
var_dump($user);