<?php
set_time_limit(60);

function gcd($n,$m){
    if(!$m) return $n;
    return gcd($m,$n%$m);
}

$numerator = 1;
$denominator = 1;
for ($a = 10; $a < 100; $a++) {
    if ($a % 10 != 0) {
        for ($i = 1; $i < 10; $i++) {
            $b = 10*$i + intval($a/10);
            if ($b > $a && $b*($a%10) == $a * $i) {
                $numerator *= $a%10;
                $denominator *= $i;
                echo "$a/$b\r\n";
            }

            $b = 10*($a%10) + $i;
            if ($b > $a && $b*intval($a/10) == $a * $i) {
                $numerator *= intval($a/10);
                $denominator *= $i;
                echo "$a/$b\r\n";
            }
        }
    }
}
echo "$numerator/$denominator\r\n";
echo $denominator / gcd($numerator, $denominator);
?>