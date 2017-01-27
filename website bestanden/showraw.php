<?php
	$db = new PDO('mysql:host=localhost;dbname=sweetcaffeine', 'vincent', 'V1nc3nt');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($db === false){
		echo "C-E";
	}else{
		$sql = "SELECT post, time, temperature, humidity, groundmoisture FROM growbox ORDER BY post DESC";      
		$resultaat = $db->query($sql);      

		 foreach($resultaat as $row) {
		 	echo "post:    " . $row['post'] . "    time:    " . $row['time'] . "    day:    " . $row['day'] . "    month:    " . $row['month'] . "    temperature:    " . $row['temperature'] . "    humidity:    " . $row['humidity'] . "    groundmoisture:    " . $row['groundmoisture'] . "    distance:    " . $row['distance'] . "    fans:    " . $row['fans'] ."<br>"; 
	 }     
	 // Sluiten van verbinding   
	 }   
	 $db = NULL;

?>
