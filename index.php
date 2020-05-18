<!DOCTYPE html>
<head>
<title>Weather Report Using OpenWeatherMap API</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<style>
html, body, h1, h2, h3, h4, h5, h6 {
  font-family: "Comic Sans MS", cursive, sans-serif;
  text-align: center;
}
</style>
</head>
<body style="background-image: url('bg.jpg'); color:#ffffff;">
<center>
<form method="GET" action="weather.php">
<h1>Enter Full City Name</h1>
<input type="text" name="q" placeholder="Coimbatore" required /></br><br>
<input type="submit" name="submit" value="Get Weather Report">
</form>
</center>
</body>
</html>
