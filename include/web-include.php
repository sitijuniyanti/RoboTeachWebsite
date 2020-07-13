<?php
session_start();
define("SITE_NAME", $config['site_name']);
define('BASE_URL', $config['base_url']);

require_once './helper/path-helper.php';
require_once config_path('database.php');
require_once helper_path('url-helper.php');
require_once lib_path('mysql-database.php');
require_once lib_path('session-user.php');
require_once lib_path('flash-message.php');
require_once route_path('web-route.php');

$route_req = implode("/", $parseURL);
$path =  (array_key_exists($route_req, $route)) ? $route[$route_req] : $route['404'];

if (file_exists(view_path($path))) {
   require_once view_path($path);
}
