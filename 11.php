<?php
set_time_limit(60);
define('NUM', 4);
$lines = file("p11.txt");
$arr = array();
foreach ($lines as $line_id => $line) {
  $arr[$line_id] = explode(" ", $line);
}

$result = 0;

// horizontal
for ($i = 0; $i < count($arr); $i++) {
  for ($j = 0; $j <= count($arr[$i]) - NUM; $j++) {
    $p = 1;
    for ($k = 0; $k < 4; $k++) {
      $p *= intval($arr[$i][$j + $k]);
    }
    if ($p > $result) $result = $p;
  }
}

// vertical
for ($i = 0; $i < count($arr); $i++) {
  for ($j = 0; $j <= count($arr[$i]) - NUM; $j++) {
    $p = 1;
    for ($k = 0; $k < 4; $k++) {
      $p *= intval($arr[$j + $k][$i]);
    }
    if ($p > $result) $result = $p;
  }
}

// diagonal
for ($i = 0; $i <= count($arr) - NUM; $i++) {
  for ($j = 0; $j <= count($arr[$i]) - NUM; $j++) {
    $p = 1;
    for ($k = 0; $k < 4; $k++) {
      $p *= intval($arr[$i + $k][$j + $k]);
    }
    if ($p > $result) $result = $p;
  }
}

for ($i = NUM - 1; $i < count($arr); $i++) {
  for ($j = 0; $j <= count($arr[$i]) - NUM; $j++) {
    $p = 1;
    for ($k = 0; $k < 4; $k++) {
      $p *= intval($arr[$i - $k][$j + $k]);
    }
    if ($p > $result) $result = $p;
  }
}

echo $result;
?>