<?php
error_reporting(-1);
ini_set('display_errors', 'On');
date_default_timezone_set('Asia/Jakarta');
require_once './helper/path-helper.php';
require_once config_path('database.php');
require_once lib_path('mysql-database.php');
require_once route_path('api-route.php');

$route_req = implode("/", $parseURL);
$path =  (array_key_exists($route_req, $route)) ? $route[$route_req] : $route['404'];

if (file_exists(api_path($path))) {
   require_once api_path($path);
}
