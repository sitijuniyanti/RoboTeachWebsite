<?php

function api_path($path)
{
   return BASE_PATH . "/" . "api" . "/" . ltrim($path, "/");
}

function base_path($path)
{
   return BASE_PATH . "/" . ltrim($path, "/");
}

function config_path($path)
{
   return BASE_PATH . "/" . "config" . "/" . ltrim($path, "/");
}

function function_path($path)
{
   return BASE_PATH . "/" . "function" . "/" . ltrim($path, "/");
}

function helper_path($path)
{
   return BASE_PATH . "/" . "helper" . "/" . ltrim($path, "/");
}

function lib_path($path)
{
   return BASE_PATH . "/" . "lib" . "/" . ltrim($path, "/");
}

function route_path($path)
{
   return BASE_PATH . "/" . "route" . "/" . ltrim($path, "/");
}

function view_path($path)
{
   return BASE_PATH . "/" . "view" . "/" . ltrim($path, "/");
}
