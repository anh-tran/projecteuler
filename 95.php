<?php
$time1 = microtime(true);
define('MAX_VAL', 1000000);
set_time_limit(300);
require('lib.php');

$primes = find_primes(MAX_VAL/2);
// var_dump($primes);
// var_dump(sum_proper_divisors(11, $primes));

// $arr = array();
// for ($i = 1; $i < MAX_VAL; $i++) {
    // $arr[$i] = sum_proper_divisors($i, $primes);
// }

// var_dump($arr);
 $time2 = microtime(true);
echo 'Total execution time: ' . ($time2 - $time1);
?>