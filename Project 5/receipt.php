<?php
// Programmer: Alec Mire
echo "<link href='styles.css' type='text/css' rel='stylesheet' />";
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$quantity = $_POST["quantity"];
$size = $_POST["size"];

date_default_timezone_set ( 'America/Phoenix' );
$mydate = date ( "d-M-Y" );
$price = 0;
$state = $_POST["state"];
$city = $_POST["city"];
$zip = $_POST["zip"];
if ($size == "Small") {
  $price = 2.00;
}
echo "<br>";
if ($size == "Medium") {
  $price = 2.65;
}
if ($size == "Large") {
  $price = 2.99;
}

$totalCost = $price * $quantity;
$totalCost = number_format((float)$totalCost, 2, '.', '');

echo "<div class='receipt'>";
echo "<h3>Receipt</h3>";
echo "<br>";
echo "Purchase date: " . $mydate;
echo "<br>";
//quantity, size, price of size
echo "Purchased " . $quantity . " item(s) of size '" . $size . "' at $" . $price;
echo "<br>";
//total cost (quantity * price of size)
echo "Total Cost: $" . $totalCost;
echo "<br><br>";


echo "<fieldset><legend>Ship to</legend>";
echo $firstName . " " . $lastName .  "<br>";
if ($state == "Arizona") {
  $state = "AZ";
}
if ($state == "California") {
  $state = "CA";
}
if ($state == "Washington") {
  $state = "WA";
}
echo $city . ", " . $state . "<br>";
echo $zip;
echo "</fieldset>";
echo "</div>";


?>
