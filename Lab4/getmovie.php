<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Query Parameters</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
Complete the PHP code to make your page <br>
look like the screenshot on the lab spec.<br>

<?php
$value = $_GET ["folder"];
list($name, $year, $rating) = file($value . "\info.txt");
echo "<h1>" . $name . "</h1><br>";
echo "<div id='rating'>" . $rating . "% </div><br>";
echo '<div id="year"> Released in ' . $year . "</div><br>";
echo "<img src='" . $value . "\overview.png' alt='" . $value . "'>";
?>

</body>
</html>
