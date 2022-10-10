<?php

class Phone {
  public $color;
  public $manufacturer;
  static public $numberSold = 13;
  }
  Phone::$numberSold+=5;
  echo Phone::$numberSold;

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