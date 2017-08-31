<?php
define('MAX_VAL', 1001);
set_time_limit(60);
/*
 * Sum of number at the corner of the square with side n (n>1) is 4.n^2 - 6(n-1)
 * Eg: square with side 5 contains: 25, 21, 17, 13 and the sum is 4.5^2 - 6(5-1) = 76
 */
$sum = 1;
for ($i = 1; $i < MAX_VAL/2; $i++) {
    $n = 2 * $i + 1;
    $sum += 4 * $n * $n - 6 * ($n - 1);
}
echo $sum;
?>