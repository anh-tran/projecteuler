<?php
set_time_limit(60);
define('MAX_VAL', 20);

$arr = array_fill(0, MAX_VAL + 1, 1);

for ($j = 1; $j <= MAX_VAL; $j++) {
    for ($i = 1; $i <= MAX_VAL; $i++) {
        $arr[$i] += $arr[$i - 1];
    }
}

echo $arr[MAX_VAL];

?>