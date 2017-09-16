<?php
//
// Run this as PHP CLI Application to see output in console.
//
// The output can be loaded in an HTML page to its rendering.
//

function oneReview($folder) {
  // Recommended: Test this function separately
  $result = $movieDir = getcwd () . '/' . $folder . '/';
	return $result;
}


function definitionList($folder) {
  // Recommended: Test this function separately
  $result = $movieDir = getcwd () . '/' . $folder . '/';
	return $result;
}

function overall($name) {
  $response = " ";
  if ($name == "princessbride") {
    $response = "freshlarge.png";
  }
  if ($name == "tmnt") {
    $response = "rottenlarge.png";
  }
  if ($name == "mortalkombat") {
    $response = "rottenlarge.png";
  }
  if ($name == "tmnt2") {
    $response = "rottenlarge.png";
  }
  return $response;
}
?>
