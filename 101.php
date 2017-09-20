<?php
set_time_limit(60);
$start_time = microtime(true);
// your code here
define('MAX_VAL', 10);
function gauss($A, $x, $n) {

    for ($i=0; $i < $n; $i++) {
        $A[$i][$n] = $x[$i];
    }
//     $n = count($A);
    for ($i=0; $i < $n; $i++) {
        $maxEl = abs($A[$i][$i]);
        $maxRow = $i;
        for ($k=$i+1; $k < $n; $k++) {
            if (abs($A[$k][$i]) > $maxEl) {
                $maxEl = abs($A[$k][$i]);
                $maxRow = $k;
            }
        }


        for ($k=$i; $k < $n+1; $k++) {
            $tmp = $A[$maxRow][$k];
            $A[$maxRow][$k] = $A[$i][$k];
            $A[$i][$k] = $tmp;
        }

        for ($k=$i+1; $k < $n; $k++) {
            $c = -$A[$k][$i]/$A[$i][$i];
            for ($j=$i; $j < $n+1; $j++) {
                if ($i==$j) {
                    $A[$k][$j] = 0;
                } else {
                    $A[$k][$j] += $c * $A[$i][$j];
                }
            }
        }
    }

    $x = array_fill(0, $n, 0);
    for ($i=$n-1; $i > -1; $i--) {
        $x[$i] = $A[$i][$n]/$A[$i][$i];
        for ($k=$i-1; $k > -1; $k--) {
            $A[$k][$n] -= $A[$k][$i] * $x[$i];
        }
    }
    // be bold and return the $x vector in any case:
    return $x;
}

function u($n) {
//     return $n**3;
    return 1 - $n + $n**2 - $n**3 + $n**4 - $n**5 + $n**6 - $n**7 + $n**8 - $n**9 + $n**10;
}

$A = array();
$B = array();
for ($i = 0; $i < MAX_VAL+1; $i++) {
    for ($j = 0; $j < MAX_VAL; $j++) {
        $A[$i][$j] = ($i+1) ** $j;
    }
    $B[$i] = u($i+1);
}


$sum = 0;
for ($i = 0; $i < MAX_VAL; $i++) {
    $x = gauss($A, $B, $i+1);
    var_dump($x);

    for ($j = 0; $j <= $i; $j++) {
        $sum += $A[$i+1][$j] * $x[$j];
    }
}
echo "Result: $sum";
// end
$end_time = microtime(true);
echo PHP_EOL . "<br>Total execution time: " . ($end_time - $start_time);
?>