<?php

  // Use this like this
  // proxy.php?url=

  $ch = curl_init( $_GET['url']);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents('php://input'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $res = curl_exec($ch);
  echo $res;
  error_log("Reponse ". file_get_contents('php://input')."  || Request ".$res);
  curl_close($ch);