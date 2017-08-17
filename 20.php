<?php
set_time_limit(60);
define('MAX_VAL', 100);
$factorial = 1;
for ($i = 2; $i <= MAX_VAL; $i++) {
    $factorial = bcmul($factorial, $i);
}
$str = strval($factorial);
$sum = 0;
for ($i = 0; $i < strlen($str); $i++) {
    $sum += intval($str[$i]);
}
echo $sum;
?>