<?php

$url="http://localhost:7000/ussd/send";

sendUSSD($url,"APP_001","password","Hello World","tel:94771231234","1","mt-cont","440");

function sendUSSD($url,$appid,$password,$message,$address,$seesionid,$ussdOperation,$encoding)
{

  $arrayField = array("applicationId" => $appid,
    "password" => $password,
    "message" => $message,
    "destinationAddress" => $destinationAddress,
    "sessionId" => $sessionId,
    "ussdOperation" => $ussdOperation,
    "encoding" => $encoding
    );

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($req));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $res = curl_exec($ch);
  curl_close($ch);
  return json_decode($res);
}


function recieveUSSD(){

  $req = json_decode(file_get_contents('php://input'));

  $res = array('statusCode'=>'S1000','statusDetail'=>'Process completed successfully.');
  header('Content-type: application/json');

  return json_encode($res);
}

