<?php
set_time_limit(60);
$start_time = microtime(true);
// your code here
define('MAX_VAL', 1000000);

function is_palindromic($str) {
    $str = strval($str);
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        if ($str[$i] != $str[$len - $i - 1]) {
            return false;
        }
    }
    return true;
}

$sum = 0;
for ($n = 1; $n < MAX_VAL; $n++) {
    if (is_palindromic($n) && is_palindromic(decbin($n))) {
        $sum += $n;
    }
}
echo "Result: $sum";

// end
$end_time = microtime(true);
echo PHP_EOL . "<br>Total execution time: " . ($end_time - $start_time);

// Result: 872187
// Total execution time: 1.2677788734436
?>