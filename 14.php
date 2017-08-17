<?php
set_time_limit(60);
define('MAX_VAL', 30);

$chains = array();
$chains[1] = 1;

$count = 1;

do {
  $flag = FALSE;
  foreach ($chains as $n => $val) {
    if ($n > 1 && ($n - 1) % 3 == 0 && intval(($n - 1) / 3) % 2 != 0 && empty($chains[intval(($n - 1) / 3)])) {
      $chains[intval(($n - 1) / 3)] = $val + 1;
      if (intval(($n - 1) / 3) < MAX_VAL) $count++;
      $flag = TRUE;
    }
    if (empty($chains[$n * 2])) {
      $chains[$n * 2] = $val + 1;
      if ($n * 2 < MAX_VAL) $count++;
      $flag = TRUE;
    }
  }
  
  if ($count == MAX_VAL - 1) {
    break;
  }
} while ($flag);
echo count($chains);

?>
