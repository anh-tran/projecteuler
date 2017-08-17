<?php
set_time_limit(300);
function triangle($i) {
  return $i * ($i + 1) / 2;
}

function is_triangle($n) {
  $i = intval(sqrt(2 * $n));
  if ($n == triangle($i))
    return TRUE;
  else
    return FALSE;
}

function pentagonal($i) {
  return $i * (3 * $i - 1) / 2;
}

function is_pentagonal($n) {
  $i = intval(sqrt(2 * $n / 3)) + 1;
  if ($n == pentagonal($i))
    return TRUE;
  else
    return FALSE;
}

function hexagonal($i) {
  return $i * (2 * $i - 1);
}

function is_hexagonal($n) {
  $i = intval(sqrt($n / 2)) + 1;
  if ($n == hexagonal($i))
    return TRUE;
  else
    return FALSE;
}

$i = 1;
while (1) {
  $h = hexagonal($i);
  if ($h > 40755 && is_triangle($h) && is_pentagonal($h)) {
    echo $h;
    exit;
  }
  $i++;
}
?>