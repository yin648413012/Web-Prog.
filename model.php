<?php
// Author Alec Mire
//
class DatabaseAdaptor {

  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;
  // Make a connection to an existing data based named 'imdb_small' that has
  // table . In this assignment you will also need a new table named 'users'
  public function __construct() {
    $db = 'mysql:dbname=imdb_small;host=127.0.0.1;charset=utf8';
    $user = 'root';
    $password = '';

    try {
      $this->DB = new PDO ( $db, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
      echo ('Error establishing Connection');
      exit ();
    }
  }



// return an array with all roles from all movies
  public function getAllMoviesAndRoles() {
    // Return an array containing all roles in all movies.
     $stmt = $this->DB->prepare ( "SELECT movies.name, roles.actor_id FROM roles JOIN movies ON roles.movie_id = movies.id JOIN actors on roles.actor_id = actors.id;");
    // $stmt = $this->DB->prepare ( "SELECT actors.first_name, actors.last_name FROM actors JOIN roles ON roles.actor_id = movies.id JOIN actors on roles.actor_id = actors.id;");
     $stmt->execute ();
    //  $stmt = $this->DB->prepare ("SELECT actors.first_name, actors.last_name FROM actors JOIN movies on actors.id = roles.actor_id;");
    //  $stmt->execute ();
     return $stmt->fetchAll ( PDO::FETCH_ASSOC );
   }
  } // End class DatabaseAdaptor



  // Testing code that should not be run when a part of MVC
  $theDBA = new DatabaseAdaptor ();
  $arr = $theDBA->getAllMoviesAndRoles ();
  print_r($arr);
  // print all movies immediately followed
  // by all actors and their roles in that movie.
  for ($i=0; $i < count($arr); $i++) {
    $arrI = $arr[$i];
    $name = $arrI['name'];
    if ($arr[$i]['name'] != $arr[$i - 1]['name']) {
      echo ($arrI['name'] . PHP_EOL);
    }
    echo $arrI['actor_id'] . ' --- ' . PHP_EOL;
    // for ($j=0; $j < $arrI; $j++) {
    //   echo ($arrI['actor_id'] . ' --- ');
    // }
  }


?>
