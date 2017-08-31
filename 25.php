<?php
set_time_limit(60);
$limit = gmp_pow(10, 999);
$f = array();
$f[0] = 1;
$f[1] = 1;
$n = 2;
$i = 1;

while ($f[$i] < $limit) {
    $i = ($i+1)%3;
    $f[$i] = gmp_add($f[($i+1)%3], $f[($i+2)%3]);
    $n++;
}
echo $n;

?>