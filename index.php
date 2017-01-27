<?php
	$online = false;
	$today = date("m.d");
	$todaytime = date("H:i:s");

	$db = new PDO('mysql:host=localhost;dbname=sweetcaffeine', 'vincent', 'V1nc3nt');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($db === false){
		echo "C-E";
	}else{
		$sql = "SELECT post, time, temperature, humidity, groundmoisture, distance, month, day, fans FROM growbox ORDER BY post DESC LIMIT 50";      
		$resultaat = $db->query($sql);      

		foreach($resultaat as $row) {
			if ($temperature == NULL){
				$temperature = $row['temperature'];
			}else{
				 $temperature = $temperature . "," . $row['temperature'] ;
			}
			if ($humidity == NULL){
				$humidity = $row['humidity'];
			}else{
				 $humidity = $humidity . "," . $row['humidity'] ;
			}
			if ($groundmoisture == NULL){
				$groundmoisture = $row['groundmoisture'];
			}else{
				 $groundmoisture = $groundmoisture . "," . $row['groundmoisture'] ;
			}
			if ($distance == NULL){
				$distance = $row['distance'];
			}else{
				 $distance = $distance . "," . $row['distance'] ;
			}
			
			if ($time == NULL){
				$time = $row['time'];
			}
			if ($month == NULL){
				$month = $row['month'];

			}
			if ($day == NULL){
				$day = $row['day'];
			}
			if ($fans == NULL){
				$fans = $row['fans'];
			}
		}

	}
	 $db = NULL;

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
    "http://www.w3.org/TR/html4/strict.dtd">
<head>

   <script
  src="https://code.jquery.com/jquery-1.7.2.js"
  integrity="sha256-FxfqH96M63WENBok78hchTCDxmChGFlo+/lFIPcZPeI="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.sparkline.js"></script>

    <script type="text/javascript">
    $(function() {
        $('.inlinesparkline').sparkline(); 

        $(".inlinebar").sparkline('html', {
	     type: 'bar',
	    height: '150',
	    barWidth: 20,
	    barColor: '#00bfbf',
	    negBarColor: '#f96b6b',
	    zeroColor: '#a9e5aa'}); 

	    $(".moisture").sparkline('html', {
	     type: 'bar',
	    height: '150',
	    barWidth: 20,
	    barColor: '#d8953c',
	    negBarColor: '#f96b6b',
	    zeroColor: '#a9e5aa'});        
	 	

		$("#temperature").sparkline('html', {
	    type: 'bar',
	    height: '150',
	    barWidth: 20,
	    barColor: '#78c958',
	    negBarColor: '#f96b6b',
	    zeroColor: '#a9e5aa'});   

	   	$("#distance").sparkline('html', {
	    type: 'bar',
	    height: '150',
	    barWidth: 20,
	    barColor: '#78c958',
	    negBarColor: '#f96b6b',
	    zeroColor: '#a9e5aa'});        
	    });     




    </script>

    <link rel="stylesheet" href="style.css">

</head>
	<header>
		Eindexamen project:<br>
		<span id="headerr">Growbox</span>
	</header>
	<body>
		<p>
			<?php
			if($day == date("d") && 0 . $month == date("m")){
				$todaystrtime = (strtotime($todaytime)- 1*60*60);
				if ($todaystrtime < strtotime($time)){
					$online = true;
				}				
			}
			if ($online == true){
				echo "<h1>Online</h1><br>Last data received at:" . $time;
			}else{
				echo "<h1>Offline</h1><br>Last data received at:" . $time;
			}

			?>
		</p>
		<p>
		Temperature:<br> <span id="temperature">
						<?php echo $temperature;?>
					</span>
		</p>
		<br>
		<p>
		Humidity:<br> <span class="inlinebar">
						<?php echo $humidity;?>
					</span>
		</p>
		<br>
		<p>
		Groundmoisture:<br> <span class="moisture">
						<?php echo $groundmoisture;?>
					</span>
		</p>
		<br>
		<p>
		Height:<br> <span id="distance">
						<?php echo $distance;?>
					</span>
		</p>
		<br>
		<br><br>
		<br>
		<a href="showraw.php">Show Raw Data</a>


	</body>
</html>