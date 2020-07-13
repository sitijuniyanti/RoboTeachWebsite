<?php

function login_user($level)
{
   $result = false;
   if (isset($_SESSION['user'])) {
      $result = $_SESSION['user']['level'] == $level;
   }
   return $result;
}

function set_user($user)
{
   $_SESSION['user'] = $user;
}

function logout_user()
{
   if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
   }
}
