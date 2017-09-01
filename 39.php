<?php
set_time_limit(60);
$start_time = microtime(true);
// your code here
/*
 * a^2 + b^2 = c^2
 * a + b + c = p
 * a <= b < c
 * a < p / 2 + sqrt(2) < p / 3.4
 *
 * a^2 + b^2 = (p-a-b)^2
 * b = p(p-2a)/2/(p-a) is integer
 */

define('MAX_VAL', 1000);

$result = 0;
$max = 0;
for ($p = 1; $p < MAX_VAL; $p++) {
    $count = 0;
    for ($a = 1; $a <= $p/3.4; $a++) {
        $b = $p * ($p - 2 * $a)/2/($p - $a);
        if ($b == intval($b)) {
            $count++;
        }
    }
    if ($count > $max) {
        $max = $count;
        $result = $p;
    }
}
echo "p=$result: $max solutions";
// end
$end_time = microtime(true);
echo PHP_EOL . "<br>Total execution time: " . ($end_time - $start_time);

// p=840: 8 solutions
// Total execution time: 0.057494878768921
?>