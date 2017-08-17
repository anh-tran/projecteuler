<?php
set_time_limit(60);
define('NUM', 500);
function count_divisors($n) {
  $result = 1;
  $i = 2;
  $count = 0;
  while ($n > 1) {
    if ($n % $i == 0) {
      $n = $n / $i;
      $count++;
    } else {
      $i++;
      $result *= ($count + 1);
      $count = 0;
    }
  }
  $result *= ($count + 1);
  return $result;
}

$i = 0;
while (1) {
  $i += 2;
  $ni = count_divisors($i/2);
  if ($ni * count_divisors($i - 1) > NUM) {
    echo ($i * ($i - 1) / 2);
    return;
  }
  if ($ni * count_divisors($i + 1) > NUM) {
    echo ($i * ($i + 1) / 2);
    return;
  }
}

?>