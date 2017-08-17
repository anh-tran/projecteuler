<?php
set_time_limit(60);
define('MAX_VAL', 28123);
function is_abundant($n) {
    $nn = $n;
    $s2 = 2;
    while ($n % 2 == 0) {
        $n = $n / 2;
        $s2 *= 2;
    }
    $s2 = $s2 - 1;
    $sum = $s2;

    $s3 = 3;
    while ($n % 3 == 0) {
        $n = $n / 3;
        $s3 *= 3;
    }
    $s3 = ($s3 - 1) / 2;
    $sum *= $s3;

    $i = 1;
    while ($n > 1) {
        $p = 6 * $i - 1;
        $s = $p;
        while ($n > 1 && $n % $p == 0) {
            $n = $n / $p;
            $s *= $p;
        }
        if ($s > $p) {
            $s = ($s - 1) / ($p - 1);
            $sum *= $s;
        }

        $p = 6 * $i + 1;
        $s = $p;
        while ($n > 1 && $n % $p == 0) {
            $n = $n / $p;
            $s *= $p;
        }
        if ($s > $p) {
            $s = ($s - 1) / ($p - 1);
            $sum *= $s;
        }
        $i++;
    }
    return $sum > $nn * 2;
}

$abundants = array();

for ($i = 2; $i <= MAX_VAL; $i++) {
    if (is_abundant($i)) {
        $abundants[] = $i;
    }
}

$arr = array();

foreach ($abundants as $a) {
    foreach ($abundants as $b) {
        $c = $a + $b;
        if ($c <= MAX_VAL && !in_array($c, $arr)) {
            $arr[] = $c;
        }
    }
}

$result = 0;
for ($i = 1; $i <= MAX_VAL; $i++) {
    if (!in_array($i, $arr)) {
        $result += $i;
    }
}

echo $result;
?>