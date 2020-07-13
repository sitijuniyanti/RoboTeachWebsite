<?php

function set_flash_message($status, $title, $message, $type = 'alert')
{
   $_SESSION['flash_message'] = [
      'status' => $status,
      'title' => $title,
      'message' => $message,
      'type' => $type
   ];
}
