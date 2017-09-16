<?php
// This controller acts as the go between the view and the model.
//
// Author Alec Mire
//
include 'model.php';  // for $theDBA, an instance of DataBaseAdaptor
$string = $_GET['string'];
$function = $_GET['function'];

if ($function === 'actor') {
  $new = $theDBA->getAllActors ($string);
}

elseif ($function === 'role') {
  $new = $theDBA->getAllRoles ($string);
}
echo  json_encode($new);
?>
