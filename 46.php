<?php
set_time_limit(60);
$primes = array(2, 3, 5, 7);

function is_prime($n) {
  global $primes;
  $limit = sqrt($n);
  foreach ($primes as $prime) {
    if ($prime > $limit) {
      // $n is prime
      
      return TRUE;
    }
    if ($n % $prime == 0) return FALSE;
  }
}
$i = 9;
while (1) {
  if (is_prime($i)) {
    // prime
    $primes[] = $i;
  } else {
    // composite
    $is_sum = FALSE;
    foreach ($primes as $prime) {
      if ($prime < $i) {
        $tmp = sqrt(($i - $prime) / 2);
        if (intval($tmp) == $tmp) {
          $is_sum = TRUE;
          break;
        }
      }
    }
    if (!$is_sum) {
      echo $i;
      exit;
    }
  }
  $i += 2;
}
?>