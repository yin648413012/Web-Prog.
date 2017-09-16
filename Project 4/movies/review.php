<!DOCTYPE html>
<html>
<head>
<!-- Alec Mire -->
<title>Movie Reviews</title>
<meta charset="utf-8" />
<link href="movies.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php
include 'functions.php';
$folder = $_GET['movie'];


echo "<div id='primary'>";
echo "<div id='banner'>
        <img src='images/rancidbanner.png' alt='Rancid Tomatoes'>
      </div>";
list($name, $year, $rating) = file($folder . "\info.txt");
echo "<h1>" . $name . "(" . $year . ")</h1><br>";
echo "<div id='main'>";
echo "<div id='rating'>";
echo "<img src='images/" . overall($folder) . "' alt='Rotten' />";
echo "<span id='rating_percent'>" . $rating . "%</span>";
echo "</div>"; //rating div
echo '<div class="overview">
        <img src="' . $folder . '/overview.png" alt="general overview" />
      </div>';
$loops = 0;
$count1 = 0;
if ($folder === "princessbride") {
  $count1 = 3;
  $loops = 7;
}
if ($folder === "tmnt") {
  $count1 = 4;
  $loops = 8;
}
if ($folder === "mortalkombat") {
  $count1 = 4;
  $loops = 9;
}
if ($folder === "tmnt2") {
  $count1 = 5;
  $loops = 11;
}

for ($i=1; $i <= $count1; $i++) {
  list($review, $overall, $critic, $source) = file($folder . "/review" . $i . ".txt");
  echo "<p class='review1'>
    <img src='images/" . $overall . ".gif' alt='" . $overall . "' /> <q>" . $review . "</q>
  </p>
  <p class='s1'>
    <img src='images/critic.gif' alt='Critic' /> " . $critic . " <br />
    <em>" . $source . "</em>
  </p>";
}
for ($i=$count1 + 1; $i <= $loops; $i++) {
  list($review, $overall, $critic, $source) = file($folder . "/review" . $i . ".txt");
  echo "<p class='review2'>
    <img src='images/" . $overall . ".gif' alt='" . $overall . "' /> <q>" . $review . "</q>
  </p>
  <p class='s2'>
    <img src='images/critic.gif' alt='Critic' /> " . $critic . " <br />
    <em>" . $source . "</em>
  </p>";
}


echo "<dl class='info'>";
$file = fopen($folder . "/overview.txt", 'r');
while ($line = fgets($file)) {
  $count = 0;
  for ($i=0; $i < strlen($line); $i++) {
    if ($line[$i] === ":") {
      break;
    }
    $count = $count + 1;
  }
  echo "<dt>" . substr($line, 0, $count) . ": </dt";
  echo "<dd>" . substr($line, $count) . "</dd>";
}
echo "</dl>";
fclose ($file);

echo "</div>"; //main div
echo "</div>"; //primary div


?>



</body>
</html>
