<?php

function base_path($path)
{
   return BASE_PATH . "/" . ltrim($path, "/");
}

function function_path($path)
{
   return BASE_PATH . "/" . "function" . "/" . ltrim($path, "/");
}

function lib_path($path)
{
   return BASE_PATH . "/" . "lib" . "/" . ltrim($path, "/");
}

function api_path($path)
{
   return BASE_PATH . "/" . "api" . "/" . ltrim($path, "/");
}

function view_path($path)
{

   //$path = ltrim($path, "/");
   return BASE_PATH . "/" . "view" . "/" . $path;
}
