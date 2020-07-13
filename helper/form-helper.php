<?php

function set_value($inputName, $value = null)
{
   if (isset($_REQUEST[$inputName])) {
      $value = $_REQUEST[$inputName];
   }
   return $value;
}

function set_input_error($errMsg)
{
   $_REQUEST['input_error'] = $errMsg;
}

function input_error($inputName)
{
   return isset($_REQUEST['input_error'][$inputName]) ? true : false;
}

function show_input_error($inputName)
{
   return (isset($_REQUEST['input_error'][$inputName])) ? $_REQUEST['input_error'][$inputName] : null;
}

// function show_input_error(&$errMsg, $inputName)
// {
//    return (isset($errMsg['input_error'][$inputName])) ? $errMsg['input_error'][$inputName] : null;
// }
