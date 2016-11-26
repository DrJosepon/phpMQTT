<?php

require("../phpMQTT.php");

  $host = "192.168.1.36"; 
  $port = 1883;
  $username = "username"; 
  $password = "password"; 

  $mqtt = new phpMQTT($host, $port, "ClientID".rand()); 
	

	
  if(!$mqtt->connect(true,NULL)){
    exit(1);
  }

	$mqtt->publish("event","Conexion establecida", 0);

  //currently subscribed topics
  $topics['event'] = array("qos"=>0, "function"=>"procmsg");
  $mqtt->subscribe($topics,0);
  
  while($mqtt->proc()){        
  }

  $mqtt->close();
  function procmsg($topic,$msg){
    echo "Msg Recieved: $msg";
	exit;
  }
  
  
	
	
	/*$topics['ferries/IOW/#'] = array("qos"=>0, "function"=>"procmsg"); 
	$mqtt->subscribe($topics,0); 
	$start_time = time(); 
	while (!$done && !hasTimedout() && $mqtt->proc()) {
		
	} 
	$mqtt->close(); 
	function procmsg($topic,$msg) {
		 global $done; 
		 $done = 1;
		  echo "Msg Recieved: ".date("r")."\nTopic:{$topic}\n$msg\n"; 
	} 
	function hasTimedout() {
		 global $start_time; 
		 return (time() - $start_time > 10);//waits up to 10 sec } 
*/

?>
