<?php
function sum_proper_divisors($n, $primes) {
    if ($n <= 1) return 0;
    if (in_array($n, $primes)) return 1;
    $tmp = $n;
    $sum = 1;
    
    foreach ($primes as $p) {
        $count = 0;
        while ($tmp % $p == 0) {
            $tmp = $tmp / $p;
            $count++;
        }
        $sum *= ($p**($count+1) - 1) / ($p - 1);
        if ($tmp == 1) break;
    }

    return $sum - $n;
}

function is_prime($n, $primes) {
    foreach ($primes as $prime) {
        if ($prime > sqrt($n)) return TRUE;
        if ($n % $prime == 0) return FALSE;
    }
    return TRUE;
}
function find_primes($n) {
    if ($n < 5) return FALSE;
    $primes = array(2, 3);
    for ($i = 5; $i < $n; $i += 6) {
        if (is_prime($i, $primes)) {
            $primes[] = $i;
        }
        if ($i+2 < $n && is_prime($i+2, $primes)) {
            $primes[] = $i+2;
        }
    }
    return $primes;
}
?>