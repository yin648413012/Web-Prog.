<?php
// send a PHP encoded as JSON.
$dir = "books/";
$arr = [];
$newArr = [];
// Open a directory, and read its contents
if (is_dir($dir)){ //TRY SCANDIR TO PUT ALL FOLDERS IN AN ARRAY
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      array_push($arr, $file);
    }
    closedir($dh);
  }
}

for ($i=2; $i < sizeof($arr); $i++) {
  $files = glob('books/' . $arr[$i] . '.jpg');
  array_push($newArr, $files);
}
$newnewArr = [];
for ($i=0; $i < sizeof($newArr); $i++) {
  $myStr = $arr[$i+2];
  array_push($newnewArr, $myStr);
}
echo json_encode ( $newnewArr );
?>
