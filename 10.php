<?php
define('MAX_NUMBER', 2000000);
set_time_limit(120);
$primes = array(2, 3, 5);
function is_prime($n) {
  global $primes;
  foreach ($primes as $prime) {
    if ($prime > sqrt($n)) {
      return true;
    }
    if ($n % $prime == 0) return false;
  }
  return true;
}

// main
for ($i = 1; $i <= MAX_NUMBER/6; $i++) {
  $n = 6 * $i + 1;
  if ($n < MAX_NUMBER && is_prime($n)) {
    $primes[] = $n;
  }
  $n = 6 * $i + 5;
  if ($n < MAX_NUMBER && is_prime($n)) {
    $primes[] = $n;
  }
}

$sum = 0;
foreach ($primes as $prime) {
  $sum += $prime;
}
echo $sum;

?>