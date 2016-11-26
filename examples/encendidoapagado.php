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
  	
  $host = "192.168.1.36"; 
  $port = 1883;
  $username = "username"; 
  $password = "password"; 

  $mqtt = new phpMQTT($host, $port, "ClientID".rand()); 
	
    if ($msg == "1"){
    	echo "OFF";
		
		if ($mqtt->connect(true,NULL)) {
		   $mqtt->publish("event","0", 0);
    		$mqtt->close();
		  }else{
		    echo "Fail or time out<br />";
		  }
    }else{
    	echo "ON";
		
    	if ($mqtt->connect(true,NULL)) {
		    $mqtt->publish("event","1", 0);
    		$mqtt->close();
		  }else{
		    echo "Fail or time out<br />";
		  }
    }
	exit;
  }

?>
