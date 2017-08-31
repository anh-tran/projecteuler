<?php
set_time_limit(60);
define('MAX_VAL', 1000000);
$n = 1;
$i = 1;
$length = 0;
$product = 1;
while ($n <= MAX_VAL) {
    $length += strlen($i);
    if ($length >= $n) {
        // get dn
        $dn = intval($i / (10**($length - $n))) % 10;
        $product *= $dn;
        $n *= 10;
    }
    $i++;
}
echo $product;
?>