<?php
$string = "This is a string."." This is a concatenated string";

echo $string."<br>";
$string = "You can also ";
$string .= "add to strings using the ";
$string .= "dot-equals (.=) operator";
echo $string."<br>";

$myString = "I say, nay, nay, and thrice nay!";
echo substr_count( $myString, "nay" )."<br>"; // DISPLAYS '3'

$string = "this is a string";
echo strtoupper($string)."<br>";
echo strtolower($string)."<br>";
echo ucwords($string)."<br>";
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP demo</title>
  </head>
  <body>
    <p><?php  ?></p>
  </body>
</html>