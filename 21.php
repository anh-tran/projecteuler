<?php
set_time_limit(60);
function sum_divisors($n) {
    $sum = 0;
    for ($i = 1; $i < $n/2 + 1; $i++) {
        if ($n % $i == 0) {
            $sum += $i;
        }
    }
    return $sum;
}

$arr = array();
for ($i = 2; $i < 10000; $i++) {
    $arr[$i] = sum_divisors($i);
}

$result = 0;
foreach ($arr as $key => $val) {
    if ($val > 1 && $val < 10000 && $key != $val && $arr[$val] == $key) {
        $result += $key;
    }
}

echo $result;
?>