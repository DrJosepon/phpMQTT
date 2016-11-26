<?php

require("../phpMQTT.php");

	
  $host = "192.168.1.36"; 
  $port = 1883;
  $username = "username"; 
  $password = "password"; 
  $message = "1";

  //MQTT client id to use for the device. "" will generate a client id automatically
  $mqtt = new phpMQTT($host, $port, "ClientID".rand()); 

  if ($mqtt->connect(true,NULL)) {
    $mqtt->publish("event",$message, 0);
    $mqtt->close();
  }else{
    echo "Fail or time out<br />";
  }

?>
