<!DOCTYPE html>
<head>
<title>PHP application to get the weather report for the cities.</title>
<link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
<meta charset="UTF-8">
<meta name="description" content="PHP application to get the weather report for the cities - Open Weather Map API is used to get the Live data for a city and integrated with jQuery.">
<meta name="keywords" content="HTML, CSS, JavaScript, PHP, Weather">
<meta name="author" content="Aashika">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<h2>Weather Report for the Cities</h2>
<form method="GET" action="index.php">
<h5>Enter Full City Name</h5>
<input type="text" name="q" placeholder="Coimbatore" required /></br><br>
<input type="submit" name="submit" value="Get Weather Report">
</form>
</center>
<?php
if(empty($_GET['q'])){
    $city = 'Coimbatore';
}else{
    $city = $_GET['q'];
}
error_reporting(0);
$get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
date_default_timezone_set($get['timezone']);

 $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=ae61a217472f97a10239627b67c157f4";
 $data = json_decode(file_get_contents($string),true);
 $temp = $data['main']['temp'];
 $tempMin = $data['main']['temp_min'];
 $tempMax = $data['main']['temp_max'];
 $icon = $data['weather'][0]['icon'];
 $visibility = $data['visibility'];
 $visibilitykm = $visibility / 1000;
 $country =  "<h1 class='w3-xxxlarge w3-animate-zoom'><b>".$data['name'].",".$data['sys']['country']."</h1></b>";
 $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
 $desc = "<b><p>".$data['weather'][0]['description']."</p></b>";
 $temperature =  "<b>Temp:".$temp."°C</b><br>";
 $mintemperature =  "<b>Min Temp:".$tempMin."°C</b><br>";
 $maxtemperature =  "<b>Max Temp:".$tempMax."°C</b><br>";
 $clouds = "<b>Clouds:".$data['clouds']['all']."%</b><br>";
 $humidity = "<b>Humidity:".$data['main']['humidity']."%</b><br>";
 $windspeed = "<b>Wind Speed:".$data['wind']['speed']."m/s</b><br>";
 $pressure = "<b>Pressure:".$data['main']['pressure']."hpa</b><br>";
 $visibility =  "<b>Visibility:".$visibilitykm."Km</b><br>";
 $sunrise = "<b>Sunrise:".date('h:i A', $data['sys']['sunrise'])."</b><br>";
 $sunset = "<b>Sunset:".date('h:i A', $data['sys']['sunset'])."</b>";
?>
		  <div>
				<?php 
				echo $country;
				echo $logo; 
				echo "<center><h2>".$desc."</h2></center>";
				?>
		  </div>
		  <h1>
			<?php echo $temperature; ?>
			<?php echo $maxtemperature; ?>
			<?php echo $mintemperature; ?>
			<?php echo $clouds; ?>
			<?php echo $humidity; ?>
			<?php echo $$windspeed; ?>
			<?php echo $pressure; ?>
			<?php echo $$visibility; ?>
			<?php echo $sunrise; ?>
			<?php echo $sunset; ?>
			</h2>
		</div>
<div class="footer">
  <p><a href="https://openweathermap.org/" target="_blank">Open Weather Map API</a> is used to get the Live data for a City and integrated with jQuery-v3.5.1</p>
</div>
</body>
</html>
