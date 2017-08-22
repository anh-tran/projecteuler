<?php
// $n is equal to the sum of the factorial of its digits.
// $n < 7*9! = 2540160 because 8*9! = 2903040 < 10000000

set_time_limit(60);
function factorial($n) {
    $f = 1;
    for ($i = 1; $i <= $n; $i++) {
        $f *= $i;
    }
    return $f;
}

// Get factorial of all 10 digits
$factorials = array();
for ($i = 0; $i < 10; $i++) {
    $factorials[$i] = factorial($i);
}

$result = 0;
for ($n = 10; $n < 2540160; $n++) {
    $sum = 0;
    $tmp = $n;
    while ($tmp > 0) {
        $sum += $factorials[$tmp%10];
        $tmp = intval($tmp/10);
    }
    if ($sum == $n) {
        $result += $n;
    }
}
echo $result;
?>