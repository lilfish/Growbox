<?php
$time = $_POST['time'];
$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];
$password = $_POST['password'];
$groundmoisture = $_POST['groundmoisture'];
$month = $_POST['month'];
$day = $_POST['day'];
$distance = $_POST['distance'];
$fans = $_POST['fans'];
$confirm = "growbox";
$db = new PDO('mysql:host=localhost;dbname=sweetcaffeine', 'vincent', 'V1nc3nt');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if($db === false){
		echo "C-E";
	}elseif($password == $confirm){
		echo "D";
		$sql = "INSERT INTO growbox (time, temperature, humidity, groundmoisture, distance, day, month, fans)
		VALUES ('$time', '$temperature', '$humidity', '$groundmoisture', '$distance', '$day', '$month', '$fans')";
		if ($db->query($sql)) {
			echo "Suc6";	
			
		} else {
			echo "E";
		}
	}else{
		echo "E-P";
	}
	if($groundmoisture < 500){
		$message = "Dear Admin\r\nYour growbox is running low on water\r\nPlease check your water supply as soon as possible";
		$message = wordwrap($message, 70, "\r\n");
		mail('vincentvenhuizen1997@gmail.com', 'Growbox', $message);
	}


?>

