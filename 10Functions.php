<?php
/**
 * 10 PHP functions requiring functions, assert, selection, repetition, arrays,
 * and file processing. The code is quasi-tested with a few test cases with output
 * Write more asserts to test your code. We will have many more asserts when grading.
 * It is important to be able to write your own tests.
 *
 * Programmer: Alec Mire
 */



// 1) howSwedish
// ABBA is a band, they have many songs including Dancing Queen, and
// Fernando. ABBA is actually a Swedish band, so if we wanted to find
// out howSwedish a String is, we could simply find out how many times
// the String contains the substring "abba". We want to look for this
// substring in a case insensitive manner. So "abba" counts, and so
// does "aBbA". We also want to check for overlapping abba's such as
// in the String "abbAbba" that contains "abba" twice.
//
// howSwedish("ABBA a b b a") returns 1
// howSwedish("abbabba!") returns 2
function howSwedish($str) {
  $count = 0;
  for ($i=0; $i <= strlen($str) - 4; $i++) {
    if (strcasecmp('abba', substr($str, $i, 4)) == 0) {
      $count += 1;
    }
  }
  return $count;
}

echo '     howSwedish(abbabba) 2: ' . howSwedish ( 'abbabba' ) . "\n";
assert ( 2, howSwedish ( 'abbabba' ) );
assert ( 2, howSwedish ( 'abbabba!' ) );
echo 'howSwedish(ABBA a b b a) 1: ' . howSwedish ( "ABBA a b b a" ) . "\n";



// 2)  mirrorEnds
// Complete method mirrorEnds that given a string, looks for a mirror
// image (backwards) string at both the beginning and end of the given string.
// In other words, zero or more characters at the very beginning of the given
// string, and at the very end of the string in reverse order (possibly overlapping).
// For example, "abXYZba" has the mirror end "ab".
//
assert("" == mirrorEnds("")); //passed
assert("" == mirrorEnds("abcde"));
assert("a" == mirrorEnds("abca"));
assert("aba" ==  mirrorEnds("aba"));
assert("aa" == mirrorEnds("aa"));
assert("aaa" == mirrorEnds("aaa"));
assert("asdfghjkl" == mirrorEnds("asdfghjklmjlkjhgfdsa"));
assert("asdfg" == mirrorEnds("asdfgjhgfdsa"));
assert("asdfghjk" == mirrorEnds("asdfghjkkmjlkjhgfdsa"));
assert("asdfghj" == mirrorEnds("asdfghjalmjlkjhgfdsa"));
assert("asdfgh" == mirrorEnds("asdfghdjklmjlkjhgfdsa"));
assert("asdf" == mirrorEnds("asdfasdmjlkjhgfdsa"));
assert("a" == mirrorEnds("a"));
assert("abba" == mirrorEnds("abba"));
assert("abcba" == mirrorEnds("abcba"));

function mirrorEnds($str) {
  $end = '';
  $reverse = strrev($str);
  if ($reverse == $str) {
    return $str;
  }
  for ($i=0; $i < round(strlen($str) / 2); $i++) {
    if (substr($str, 0, $i) == strrev(substr($str, strlen($str) - $i, strlen($str) - 1))) {
      $end = substr($str, 0, $i);
    }
  }
  return $end;
}

echo PHP_EOL . "mirrorEnds(abcdefcba) abc: " . mirrorEnds ( 'abcdefcba' ) . "\n";
assert ( 'abc' == mirrorEnds ( 'abcdefcba' ) );
echo "   mirrorEnds(zzRSTzz) zz: " . mirrorEnds ( 'zzRSTzz' ) . "\n";




// 3) isStringSorted
// Given a String, return true if the letters are in ascending order.
// Note: 'a' < 'b' and '5' < '8'
assert(true == isStringSorted(""));
assert(true == isStringSorted("a"));
assert(true == isStringSorted("ab"));
assert(false == isStringSorted("ba"));
assert(false == isStringSorted("aca"));
assert(true == isStringSorted("abbcddef"));
//assert(true == isStringSorted("1b3d")); //1234, abcd     ## is this proper behavior?
assert(false == isStringSorted("12ab3"));
assert(true == isStringSorted("123456"));
assert(false == isStringSorted("12321"));
assert(true == isStringSorted("  123"));
assert(true == isStringSorted("123  "));
assert(true == isStringSorted("1 23"));

function isStringSorted($str) {
  $str = str_replace(' ', '', $str);
  if ($str == '') {
    return true;
  }
  if (strlen($str) == 1) {
    return true;
  }
  if (strlen($str) == 2) {
    if ($str[0] < $str[1]) {
      return true;
    }
    else {
      return false;
    }
  }
  for ($i=0; $i <= strlen($str) - 2; $i++) {
    if ($str[$i+1] < $str[$i]) {
      return false;
    }
  }
  return true;
}

echo PHP_EOL . '  isStringSorted(abcdefg) 1: ' . isStringSorted ( 'abcdefg' ) . "\n";
echo '  isStringSorted(cba) false: ' . isStringSorted ( 'cba' ) . "\n";
assert ( ! isStringSorted ( 'cba' ) );
echo 'isStringSorted(abcddeeff) 1: ' . isStringSorted ( 'abcddeeff' ) . "\n";



// 4) maxBlock
// Given a string, return the length of the largest "block" in the string.
// A block is a run of adjacent chars that are the same.
// maxBlock("hoopla") returns 2
// maxBlock("abbCCCddBBBxx") returns 3
// maxBlock("") returns 0
//
function maxBlock($str) {     //FIXME: FUNCTION NOT WORKING PROPERLY...
  $temp = 1;
  $max = 1;
  if ($str == '' || $str == ' ') {
    return 0;
  }
  for ($i=0; $i < strlen($str) - 1; $i++) {
    if ($str[$i] == $str[$i+1]) {
      ++$temp;
    }
    else {
      if ($temp >= $max) {
        $max = $temp;
        $temp = 1;
      }
      else {
        $temp = 1;
      }
    }
  }
  return $max;
}
echo PHP_EOL . 'maxBlock(abbCCCddBBBxx) 3: ' . maxBlock ( "abbCCCddBBBxx" ) . "\n";
assert ( 3 == maxBlock ( "abbCCCddBBBxx" ) );
assert ( 1 == maxBlock ( "abBc" ) );                                                    // TA says function should be case-sensitive. checks out.
assert ( 3 == maxBlock ( "abbCCCddBBxx" ) );
assert ( 3 == maxBlock ( "abbCCddBBBxx" ) );
assert ( 4 == maxBlock ( "abbCCCddddBBBxx" ) );
assert ( 3 == maxBlock ( "abbCCCddBBBxx" ) );
assert ( 5== maxBlock ( "abb55555CCCddBBBxx" ) );
assert ( 0 == maxBlock ( "" ) );
assert ( 0 == maxBlock (' ') );
echo '          maxBlock(abc) 1: ' . maxBlock ( "abc" ) . "\n";


// 5) isArraySorted
// Given an array , return true if the element are in ascending order.
// Note: 'abe' < 'ben' and 5 > 3
// Precondition $arr has all the same type of elements
function isArraySorted($arr) {
  for ($i=0; $i < count($arr) - 1; $i++) {
    if ($arr[$i] > $arr[$i+1]) {
      return false;
    }
  }
  return true;
}

echo PHP_EOL . 'isArraySorted(array(1, 2, 2, 99) 1: ' . isArraySorted ( array (
    1,
    2,
    2,
    99 ) ) . "\n";
assert ( isArraySorted ( array (
    1,
    2,
    2,
    99 ) ) );
assert (false == isArraySorted ( array (
  1,
  3,
  2,
  3,
  4 ) ) );
  assert (isArraySorted ( array (
    '  a',
    'b  ',
    'c',
    'd',
    'd' ) ) );
echo 'isArraySorted(array(2, 2, 1) false: ' . isArraySorted ( array (
    2,
    2,
    1 ) ) . "\n";


// 6) numberOfPairs
// Return the number of times a pair occurs in array. A pair is any two String values that are equal (case
// sensitive) in consecutive array elements. The array may be empty or have only one element. In both of
// these cases, return 0.
//
assert( 0 == numberOfPairs( array('a', 'b', 'c') ) );
assert ( 2 == numberOfPairs( array('a', 'a', 'a') ) );
assert(2 == numberOfPairs( array('a', 'a', 'b', 'b' ) ) );
assert(2 == numberOfPairs( array('a', 'a', 'b', 'b', 'a' ) ) );
assert(3 == numberOfPairs( array('a', 'a', 'a', 'b', 'b', 'a' ) ) );
assert(4 == numberOfPairs( array('a', 'a', 'a', 'a', 'b', 'b', 'a' ) ) );
assert(2 == numberOfPairs( array('1', '1', '2', '2' ) ) );
assert(2 == numberOfPairs( array('1', '1', '2', '2', '1' ) ) );
assert(3 == numberOfPairs( array('1', '1', '1', '2', '2', '1' ) ) );
assert(4 == numberOfPairs( array('1', '1', '1', '1', '2', '2', '1' ) ) );
assert( 0 == numberOfPairs( array ( ) ) );
assert( 0 == numberOfPairs( array ('a') ) );
// Precondition: $arr has all the same type of elements
function numberOfPairs($arr) {
  $pairs = 0;
  if (count($arr) == 0 || count($arr) == 1) {
    return 0;
  }
  for ($i=0; $i < count($arr) - 1; $i++) {
    if ($arr[$i] == $arr[$i+1]) {
      ++$pairs;
    }
  }
  return $pairs;
}

echo PHP_EOL . 'numberOfPairs( array(a, a, a) ) 2: ' . numberOfPairs ( array (
    'a',
    'a',
    'a' ) ) . "\n";
echo '       numberOfPairs( array() ) 0: ' . numberOfPairs ( array () ) . "\n";



// 7) frequency
// Given an  array of integers in the range of 0..10 (like quiz scores),
// return an array of 11 integers where the first value (at index 0) is the
// number of 0s in the array argument, the second value (at index 1) is the number
// of ones in the array and the 11th value (at index 10) is the number of
// tens in the array. The following assertions must pass.
//
// Precondition: $arr has valid ints in the range of 0..10
function frequency($arr) {
  $arr2 = $arr;
  $arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  $count = 0;
  for ($i=0; $i < count($arr); $i++) {
    $count = 0;
    for ($j=0; $j < count($arr2); $j++) {
      if ($arr2[$j] == $i) {
        ++$count;
      }
    }
    $arr[$i] = $count;
  }
  return $arr;
}

echo PHP_EOL . "Frequency of 0..10" . "\n";
$arr = frequency ( array (
    1,
    1,
    4,
    4,
    4,
    9,
    9,
    9,
    9,
    10,
    0,
    0,
    0,
    0,
    0 ) );
assert(5 == $arr[0]);
assert(1 == $arr[10]);
assert(2 == $arr[1]);
assert(0 == $arr[2]);
assert(0 == $arr[3]);
assert(3 == $arr[4]);
assert(0 == $arr[5]);
assert(0 == $arr[6]);
assert(0 == $arr[7]);
assert(0 == $arr[8]);
assert(4 == $arr[9]);
// Use print_r to show all array elements
print_r ( $arr );




// 8) shiftNTimes
// Modify array so it is "left shifted" n times -- so shiftNTimes(array(6, 2, 5, 3), 1)
// changes the array argument to (2, 5, 3, 6) and shiftNTimes(array(6, 2, 5, 3), 2)
// changes the array argument to (5, 3, 6, 2). You must modify the array argument by
// changing the parameter array inside method shiftNTimes. A change to the
// parameter inside the method shiftNTimes changes the argument if the
// argument is passed by reference, that means it is preceded by an ampersand &
//
// shiftNTimes( array(1, 2, 3, 4, 5, 6, 7), 3 ) modifies array to ( 4, 5, 6, 7, 1, 2, 3 )
// shiftNTimes( array(1, 2, 3), 5) modifies array to (3, 1, 2)
// shiftNTimes( array(3), 5) modifies array to (3)
//
function shiftNTimes(& $array, $numShifts) {
  $temp = 0;
  $last_num = 0;
  for ($i=0; $i < $numShifts; $i++) {
    for ($j=0; $j < count($array) - 1; $j++) {
      if ($j == 0) {
        $last_num = $array[0];
      }
      $array[$j] = $array[$j+1];
    }
    $array[count($array) - 1] = $last_num;
  }
}


$arr = array (
    1,
    2,
    3,
    4 );
shiftNTimes ( $arr, 2 );
assert(3 == $arr[0]);
assert(4 == $arr[1]);
assert(1 == $arr[2]);
assert(2 == $arr[3]);
echo PHP_EOL . 'shiftNTimes(array(1, 2, 3, 4),  2)' . "\n";
// Use print_r to see all array elements on separate lines
print_r ( $arr );



// 9) wordsPerLine
// Complete method wordsPerLine($fileName) such that for every line
// in the input file specified by $fileName, there is an array of
// integers where the first element is the number of words on line 1
// the second array element is the number of elements on the 2nd line
// of the input file. The input file may have 0 to mant lines.  Each
// line may have 0 to many words. If the input file has these three lines:
//
// one!
// one two.
// one, two, three, and four
//
// wordsPerLine should return array(1, 2, 5)
//
// Precondition: each word on a line is separated by exactly one space.
//
function wordsPerLine($fileName) {
  $file = file($fileName);
  $arr = array();
  for($line = 0; $line < count($file); $line++){
    array_push($arr, str_word_count($file[$line]));
    //echo $file[$line];
  //  echo $line . ":  " . str_word_count($file[$line]);
  }
  return $arr;
}

$words = wordsPerLine ( "10Functions.php" );
assert(1 == $words[0]);  // Assuming you don't change the top of file from <?php
assert(3 == $words[1]);  // Assuming you don't change the top of file from /**
assert(0 == $words[2]);
assert(5 == $words[3]);

// 10) saveAshape
// This method must generate a triangle that is saved to a file.
// The file named 'outfile' should contain a triangle of height 5.
//
//     x          0: 1
//    xxx         1: 3
//   xxxxx        2: 5
//  xxxxxxx       3: 7
// xxxxxxxxx      4: 9
//
// with the function call saveAShape ( 5, 'x', 'outfile' );
// Make sure the leading spaces are correct, the 'x' is used
// and there are the correct number of characters on each line
//
function saveAShape($n, $ch, $fileName) {
  $str = '';
  $fp = fopen($fileName, 'w');
  for ($i=0; $i < $n; $i++) {
    for ($j=0; $j < $n - $i; $j++) {
      fwrite($fp, " ");
    }
    for ($k=0; $k <= 2*$i; $k++) {
      fwrite($fp, $ch);
    }
    for ($j=0; $j < $n - $i; $j++) {
      if ($j = $n - $i - 1) {
        fwrite($fp, " " . PHP_EOL);
      }
      else {
        fwrite($fp, " ");
      }
    }
  }
  fclose($fp);
}

saveAShape(5, "x", "AlecShape.txt");

?>
