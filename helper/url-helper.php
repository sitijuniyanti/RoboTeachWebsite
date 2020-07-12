<?php

function assets_url($link)
{
   $assets = 'assets/';
   return rtrim(BASE_URL, "/") . '/' . $assets  . ltrim($link, '/');
}

function base_url($url = '')
{
   return rtrim(BASE_URL, "/") . '/' . ltrim($url, '/');
}

function redirect_url($url)
{
   header('location:' . rtrim(BASE_URL, "/") . '/' . ltrim($url, '/'));
}
