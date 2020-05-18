<!DOCTYPE html>
<head>
    <title>Weather Report Using OpenWeatherMap API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <style>
html, body, h1, h2, h3, h4, h5, h6 {
  font-family: "Comic Sans MS", cursive, sans-serif;
  text-align: center;
}
</style>
</head>
<body style="background-image: url('bg.jpg'); color:#ffffff;">
<center>
<form method="GET" action="index.php">
<h1>Enter Full City Name</h1>
<input type="text" name="q" placeholder="Coimbatore" required /></br><br>
<input type="submit" name="submit" value="Get Weather Report">
</form>
</center>
<?php
error_reporting(0);
$get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
date_default_timezone_set($get['timezone']);
$city = $_GET['q'];
 $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=ae61a217472f97a10239627b67c157f4";
 $data = json_decode(file_get_contents($string),true);
 $temp = $data['main']['temp'];
 $icon = $data['weather'][0]['icon'];
 $visibility = $data['visibility'];
 $visibilitykm = $visibility / 1000;
 $country =  "<h1 class='w3-xxxlarge w3-animate-zoom'><b>".$data['name'].",".$data['sys']['country']."</h1></b>";
 $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
 $desc = "<b><p>".$data['weather'][0]['description']."</p></b>";
 $temperature =  "<b>Temp:".$temp."ьз╕C</b><br>";
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
			<?php echo $clouds; ?>
			<?php echo $humidity; ?>
			<?php echo $$windspeed; ?>
			<?php echo $pressure; ?>
			<?php echo $$visibility; ?>
			<?php echo $sunrise; ?>
			<?php echo $sunset; ?>
			</h2>
		</div>
</body>
</html>
