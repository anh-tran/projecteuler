<?php
set_time_limit(60);
$n = gmp_init("600851475143");
do {
  $is_prime = true;
  for ($i = 3; $i < $n/3; $i+=2) {
    if (gmp_mod($n, $i) == 0) {
      $n = gmp_div_q($n, gmp_init($i));
      $is_prime = false;
      break;
    }
  }
}while (!$is_prime);
echo $n;
?>