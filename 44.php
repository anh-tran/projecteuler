<?php
set_time_limit(300);
function pentagon($i) {
  return $i * (3 * $i - 1) / 2;
}

function is_pentagon($n) {
  $i = intval(sqrt(2 * $n / 3)) + 1;
  if ($n == pentagon($i))
    return TRUE;
  else
    return FALSE;
}

$i = 1;
while (1) {
  $ni = pentagon($i);
  for ($j = $i - 1; $j > 0; $j--) {
    $nj = pentagon($j);
    if (is_pentagon($ni + $nj)){
      if (is_pentagon($ni - $nj)) {
        echo "Result: " . ($ni - $nj);
        exit;
      }
    }
  }
  $i++;
}
?>