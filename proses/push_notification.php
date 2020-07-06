<?php
include 'connection.php';


$title = $_POST['title'];
$message = $_POST['message'];


define('API_ACCESS_KEY', 'AAAAdAw38ZQ:APA91bH6-4CswrFg1XDVDq5ORpjb2Uo5RGxqSl2fXCkUI2HQzuzboBFldbSxs4n7V2Rr5S4WKcZQvFTFwFAOIFB9IKOy935ys5VFB8Q4FEof09F3PZgftnQqnHKk40-ZutQh162CahOI');
$msg = array(
   'body'   => $message,
   'title'     => $title,
   'key1'  => 'val1'
);
$fields = array(
   'to'            => " c-YxM7qKQs2728uZbLBpBI:APA91bHHrp_vVFsYYQWanouzxZ1ZTBoojBUxbp0CAJrRemtuCc-Ghtpnzy_O2GNNuLUsIRnszsVg5MFrXB_kiACjNv2EGs232C9XEX6W1ml5kjP9t5qyAGQxc2Aft6EQKgjITjl32MOd",
   'notification'          => $msg


);

$headers = array(
   'Authorization: key=' . API_ACCESS_KEY,
   'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
curl_close($ch);
echo $result;
