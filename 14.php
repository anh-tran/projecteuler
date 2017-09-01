<?php
set_time_limit(60);
$start_time = microtime(true);
// your code here
define('MAX_VAL', 1000000);

$chain_terms = array();
$chain_terms[1] = 1;

function chain_terms($n) {
    global $chain_terms;
    $chains = array();
    if (!empty($chain_terms[$n])) return $chain_terms[$n];

    $count = 1;
    while (empty($chain_terms[$n])) {
        $chains[$n] = $count;
        if ($n % 2 == 0) {
            $n = $n / 2;
        } else {
            $n = $n * 3 + 1;
        }
        $count++;
    }
    $count += $chain_terms[$n];
    foreach ($chains as $number => $term) {
        if ($number < MAX_VAL) {
            $chain_terms[$number] = $count - $term;
        }
    }
    return $count - 1;
}

$result = 0;
$max = 0;
for ($i = 1; $i < MAX_VAL; $i++) {
    if ($max < $tmp = chain_terms($i)) {
        $max = $tmp;
        $result = $i;
    }
}
echo "Result: $result - $max terms";

// end
$end_time = microtime(true);
echo PHP_EOL . "<br>Total execution time: " . ($end_time - $start_time);

// Result: 837799 - 525 terms
// Total execution time: 18.037631034851

// Cached
// Result: 837799 - 525 terms
// Total execution time: 2.8977100849152
?>
