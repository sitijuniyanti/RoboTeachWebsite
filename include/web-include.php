<?php
session_start();
define("SITE_NAME", $config['site_name']);
define('BASE_URL', $config['base_url']);
require_once './route/web-route.php';
require_once './config/database.php';
require_once './helper/url-helper.php';
require_once './helper/path-helper.php';
require_once './lib/mysql-database.php';

$route_req = implode("/", $parseURL);
$path = BASE_PATH . "/view" . "/";

$path .=  (array_key_exists($route_req, $route)) ? $route[$route_req] : $route['404'];

if (file_exists($path)) {
   require_once $path;
}
