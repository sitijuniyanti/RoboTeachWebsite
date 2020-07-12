<?php

function base_path($path)
{
   return BASE_PATH . "/" . ltrim($path, "/");
}

function function_path($path)
{
   return BASE_PATH . "/" . "functions" . "/" . ltrim($path, "/");
}

function library_path($path)
{
   return BASE_PATH . "/" . "libraries" . "/" . ltrim($path, "/");
}

function process_path($path)
{
   return BASE_PATH . "/" . "process" . "/" . ltrim($path, "/");
}

function api_path($path)
{
   return BASE_PATH . "/" . "api" . "/" . ltrim($path, "/");
}

function web_path($path)
{

   //$path = ltrim($path, "/");
   return BASE_PATH . "/" . "web" . "/" . $path;
}
