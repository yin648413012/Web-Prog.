<?php
// File name: movies.php
// Use this hard coded array of movie title (year)
$array = [
    'The African Queen (1952)',
    'Interstellar (2015)',
    'The Martian (2016)',
    "The Imitation Game (2014)",
    "Guardians of the Galaxy (2014)",
    "12 Years a Slave (2013)",
    "Who Framed Roger Rabbit (1988)",
    "Starman (1984)",
    "Saving Private Ryan (1998)",
    "Raising Arizona (1987)" ];

sort($array);
//print_r($array);  // sanity check
echo json_encode ( $array );
?>
