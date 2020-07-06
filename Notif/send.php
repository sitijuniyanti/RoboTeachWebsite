<?php
$ch = curl_init("https://fcm.googleapis.com/fcm/send");
$header = array("Content-Type:application/json", "Authorization:key=AAAAdAw38ZQ:APA91bH6-4CswrFg1XDVDq5ORpjb2Uo5RGxqSl2fXCkUI2HQzuzboBFldbSxs4n7V2Rr5S4WKcZQvFTFwFAOIFB9IKOy935ys5VFB8Q4FEof09F3PZgftnQqnHKk40-ZutQh162CahOI");

$data = json_encode(array("to" => "/topics/allDevices", "data" => array("title" => $_REQUEST['title'], "message" => $_REQUEST['message'])));
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_exec($ch);
