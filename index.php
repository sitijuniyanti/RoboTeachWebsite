<?php
require_once './config/config.php';
require_once './helper/parse-url.php';
define('BASE_PATH', __DIR__);
// define('BASE_URL', $config['base_url']);

$path = BASE_PATH . '/include/web-include.php';

$parseURL = (isset($_GET['url'])) ? parseURL($_GET['url']) : $config['page_default'];
if ($parseURL[0] == "rest-api") {
   $path = BASE_PATH . '/include/api-include.php';
}

require_once $path;
