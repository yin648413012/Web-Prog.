<?php
/**
 * Complete the four PHP functions requiring ifs and for loops.
 *
 * Make sure the test cases all work where the expected value == actual value.
 *
 * Programmer: Alec Mire
 *
 */

// 1) minOfThree
//
// Given three arguments of the same type, return the one that is less than
// or equal to the other two.
//
//  minOfThree(1, 2, 3) returns 1
//  minOfThree('three', "two",  'one') returns one
//  minOfThree(5.23, 5.23,  5.23) returns  5.23
function minOfThree($a, $b, $c) {
  if($a > $b){
    if($b > $c){
      return $c;}
    else{
      return $b;}
    }
  if ($a > $c){ //b is the largest
    return $c;}
  else{
    return $a;}
}


// 2) romanNumeral
//
// Complete the free function romanNumeral that returns the numeric
// equivalent of an upper- or lower-case Roman numeral, which is a char.
// Roman numerals and their decimal equivalents are
// 'I' (or 'i') = 1
// 'V' (or 'v') = 5
// 'X' (or 'x') = 10
// 'L' (or 'l') = 50
// 'C' (or 'c') = 100
// 'D' (or 'd') = 500
// 'M' (or 'm') = 1,000
//
// If the input is not a valid Roman numeral, return -1
function romanNumeral($ch) {
  if ($ch == 'I' || $ch == 'i'){
    return 1;
  }
  if ($ch == 'V' || $ch == 'v'){
    return 5;
  }
  if ($ch == 'X' || $ch == 'x'){
    return 10;
  }
  if ($ch == 'L' || $ch == 'l'){
    return 50;
  }
  if ($ch == 'C' || $ch == 'c'){
    return 100;
  }
  if ($ch == 'D' || $ch == 'd'){
    return 500;
  }
  if ($ch == 'M' || $ch == 'm'){
    return 1000;
  }
  else {
    return -1;
  }
}


// 3) sumOfFirstInts
//
// Return the sum of the first n integers
// sumOfFirstInts(3) == 1 + 2 + 3
// Precondition: $n >= 0 (no negatives, integers only
function sumOfFirstInts($n) {
  $sum = 0;
  if ($n < 0) {
    echo "Improper input.  Input must be a positive integer, only.";
  }
  for ($i=0; $i < $n + 1; $i++) {
    $sum = $sum + $i;
  }
  return $sum;
}

// 4) factorial
//
// Given an integer $n, return $n!
// factorial(0) returns 1
// factorial(1) returns 1
// factorial(2) returns 2 * 1
// factorial(3) returns 3 * 2 * 1
// factorial(4) returns 4 * 3 * 2 * 1
// Precondition:  $n >= 0 and is an integer
function factorial($n) {
  // TODO: Implement this function correctly
  $sum = 1;
  for ($i=1; $i < $n + 1; $i++) {
    $sum = $sum * $i;
  }
  return $sum;
}

echo '       minOfThree(888,2222,444) should be 444: ' . minOfThree ( 888,2222,444 ) . "\n";
echo 'minOfThree(charlie,baker,able) should be able: ' . minOfThree ( 'charlie', 'baker', 'able' ) . "\n";
echo '  minOfThree(12.3,67.8,-12.5) should be -12.5: ' . minOfThree ( 12.3, 67.8, - 12.5 ) . "\n";
echo 'minOfThree(false, true, true) should be blank: ' . minOfThree ( false, true, true ) . "\n";
echo '     minOfThree(true, true, true) should be 1: ' . minOfThree ( true, true, true ) . "\n";
echo PHP_EOL;

echo 'romanNumeral(q) should be -1: ' . romanNumeral ( 'q' ) . "\n";
echo 'romanNumeral(i) should be 1: ' . romanNumeral ( 'i' ) . "\n";
echo 'romanNumeral(I) should be 1: ' . romanNumeral ( 'I' ) . "\n";
echo 'romanNumeral(v) should be 5: ' . romanNumeral ( 'v' ) . "\n";
echo 'romanNumeral(V) should be 5: ' . romanNumeral ( 'V' ) . "\n";
echo 'romanNumeral(x) should be 10: ' . romanNumeral ( 'x' ) . "\n";
echo 'romanNumeral(X) should be 10: ' . romanNumeral ( 'X' ) . "\n";
echo 'romanNumeral(l) should be 50: ' . romanNumeral ( 'l' ) . "\n";
echo 'romanNumeral(L) should be 50: ' . romanNumeral ( 'L' ) . "\n";
echo 'romanNumeral(c) should be 100: ' . romanNumeral ( 'c' ) . "\n";
echo 'romanNumeral(C) should be 100: ' . romanNumeral ( 'C' ) . "\n";
echo 'romanNumeral(d) should be 500: ' . romanNumeral ( 'd' ) . "\n";
echo 'romanNumeral(D) should be 500: ' . romanNumeral ( 'D' ) . "\n";
echo 'romanNumeral(m) should be 1000: ' . romanNumeral ( 'm' ) . "\n";
echo 'romanNumeral(M) should be 1000: ' . romanNumeral ( 'M' ) . "\n";
echo 'romanNumeral(abc) should be -1: ' . romanNumeral ( 'abc' ) . "\n";
echo PHP_EOL;
echo 'sumOfFirstInts(0) should be 0: ' . sumOfFirstInts ( 0 ) . "\n";
echo 'sumOfFirstInts(1) should be 1: ' . sumOfFirstInts ( 1 ) . "\n";
echo 'sumOfFirstInts(2) should be 3: ' . sumOfFirstInts ( 2 ) . "\n";
echo 'sumOfFirstInts(3) should be 6: ' . sumOfFirstInts ( 3 ) . "\n";
echo 'sumOfFirstInts(4) should be 10: ' . sumOfFirstInts ( 4 ) . "\n";
echo 'sumOfFirstInts(5) should be 15: ' . sumOfFirstInts ( 5 ) . "\n";
echo PHP_EOL;
echo 'factorial(0) should be 1: ' . factorial ( 0 ) . "\n";
echo 'factorial(1) should be 1: ' . factorial ( 1 ) . "\n";
echo 'factorial(2) should be 2: ' . factorial ( 2 ) . "\n";
echo 'factorial(3) should be 6: ' . factorial ( 3 ) . "\n";
echo 'factorial(4) should be 24: ' . factorial ( 4 ) . "\n";
echo 'factorial(5) should be 120: ' . factorial ( 5 ) . "\n";
?>
