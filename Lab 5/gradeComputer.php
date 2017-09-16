<?php

// Created by Alec Mire

$test_scores = 0;
if (isset ( $_POST ['test'] )) {
  $test_scores = $_POST ['test'];
}
$tests = explode(",", $test_scores);

$project_scores = 0;
if (isset ( $_POST ['project'] )) {
  $project_scores = $_POST ['project'];
}
$projects = explode(",", $project_scores);
$project_sum = 0;
$test_sum = 0;
for ($i=0; $i < count($projects); $i++) {
  $project_sum = $project_sum + $projects[$i];
}
for ($i=0; $i < count($tests); $i++) {
  $test_sum = $test_sum + $tests[$i];
}

$test_avg = $test_sum / count($tests);
$project_avg = $project_sum / count($projects);
$test_points = $test_avg * 0.40;
$project_points = $project_avg * 0.60;
$course_grade = $test_points + $project_points;
echo "Tests are 40% of " . round($test_avg, 1) . ", which is " . round($test_points, 1);
echo "<br>";
echo "Projects are 60% of " . round($project_avg, 1) . ", which is " . round($project_points, 1);
echo "<br><br>";
echo "Course grade: " . round($course_grade, 1);


//USEFUL FUNCTIONS
//round(1.234, 1)  // returns 1.2, or the first argument to 1 decimal place


?>
