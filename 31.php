<?php
set_time_limit(60);
define('VAL', 200);
$coins = array(2, 5, 10, 20, 50, 100, 200);

$qty = array_fill(0, 8, 0);

$i = 0;
$val = VAL;
$result = 0;
while (1) {
  if ($val >= 0) {
    $result++;
    $i = 0;
    $qty[$i]++;
    $val -= $coins[$i];
  } else {
    for ($j = 0; $j <= $i; $j++) {
      $val += $qty[$j] * $coins[$j];
      $qty[$j] = 0;
    }
    $i++;
    if ($i < count($coins)) {
      $val -= $coins[$i];
      $qty[$i]++;
    } else {
      break;
    }
  }
}

echo $result;
?>