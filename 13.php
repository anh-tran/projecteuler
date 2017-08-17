<?php
set_time_limit(300);
define('MAX_LEN', 10);
$lines = file("p13.txt");

$i = 0;
$result = "";

$tmp = 0;
$space = 0;

while (1) {
  $sum = 0;
  foreach ($lines as $line) {
    $sum += intval($line[$i]);
  }
  $tmp = $tmp * 10 + $sum;
 
  if ($tmp > 10000) {
    if (($tmp % 10000) / 1000 < 9) {
      $result .= str_pad((intval($tmp / 10000)), $space+1, '0', STR_PAD_LEFT);
      $tmp = $tmp % 10000;
      
      if (strlen($result) >= MAX_LEN) {
        echo substr($result, 0, MAX_LEN);
        exit;
      }
      $space = 0;
    } elseif ($result != "") {
      $space++;
    }
  } elseif ($result != "") {
    $space++;
  }
  $i++;
}


?>
