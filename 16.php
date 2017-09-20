<?php
set_time_limit(60);
$start_time = microtime(true);
// your code here

$sum = 0;
$n = bcpow(2, 1000);
while ($n > 0) {
    $d = bcmod($n, 10);
    $sum += $d;
    $n = bcdiv($n, 10);
}
echo "Result: $sum";

// end
$end_time = microtime(true);
echo PHP_EOL . "<br>Total execution time: " . ($end_time - $start_time);

// Result: 1366
// Total execution time: 0.0079581737518311
?>