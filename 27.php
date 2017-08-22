<?php
set_time_limit(60);
define('MAX_VAL', 1000);

// n = 0: b is prime
// n = 1: a+b+1 is prime
// |a| < 1000, |b| <= 1000 => a+b+1 <= 2000

function is_prime($n) {
    global $primes;
    foreach ($primes as $prime) {
        if ($prime > sqrt($n)) return TRUE;
        if ($n % $prime == 0) return FALSE;
    }
    return TRUE;
}

function is_prime_over_2_MAX_VAL($n) {
    if (!is_prime($n)) return FALSE;
    $i = intval(2 * MAX_VAL / 6);
    $limit = sqrt($n);
    while (1) {
        $p = 6 * $i - 1;
        if ($p > $limit) return TRUE;
        if ($n % $p == 0 || $n % ($p + 2) == 0) return FALSE;
        $i++;
    }
}

function max_number_primes($a, $b) {
    global $primes;
    $i = 2;
    while (1) {
        $n = $i * $i + $a * $i + $b;
        if ($n < 2 * MAX_VAL) {
            if (!in_array($n, $primes)) return $i - 1;
        } else {
            // check prime
            if (!is_prime_over_2_MAX_VAL($n)) return $i - 1;
        }
        $i++;
    }

}

// get primes < 2000
$primes = array(2, 3);
for ($i = 1; $i < 2 * MAX_VAL / 6; $i++) {
    $n = 6 * $i - 1;
    if (is_prime($n)) $primes[] = $n;
    $n = 6 * $i + 1;
    if (is_prime($n)) $primes[] = $n;
}

$nmax = 0;
$result = 0;
foreach ($primes as $b) {
    if ($b > MAX_VAL) break;
    foreach ($primes as $ab1) {
        $a = $ab1 - $b - 1;
        $tmp = max_number_primes($a, $b);
        if ($tmp > $nmax) {
            $nmax = $tmp;
            $result = $a * $b;
        }
    }
}

echo $result;

?>