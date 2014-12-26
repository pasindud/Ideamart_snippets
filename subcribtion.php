<?php

$url = "http://api.dialog.lk:8080/subscription/send";

subcribe('APP_005755','asda',$address);

function subcribe($url,$appid,$pw,$sub){

    $arrayField = array("applicationId" => $appid,
        "password" => $pw,
        "subscriberId" => $sub,
        "version"=>"1.0",
        "action"=>"1"
    );

    $jsonStream = json_encode($arrayField);

    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $jsonStream);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);

    return json_decode($res);
}