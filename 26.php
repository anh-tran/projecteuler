<?php
define('MAX_VAL', 1000);
set_time_limit(60);

function longest_recurring_cycle($d) {
    $r = $d;
    $n = 0;
    do {
        if ($r % 10 == 9) {
            $r = intval($r / 10);
            $n++;
        } else {
            $r += $d;
        }
    } while ($r > 0);
    return $n;
}

$result = 0;
$max = 0;
for ($d = 2; $d < MAX_VAL; $d++) {
    if ($d % 2 != 0 && $d % 5 != 0) {
        $lrc = longest_recurring_cycle($d);
        if ($lrc > $max) {
            $max = $lrc;
            $result = $d;
        }
    }
}
echo "$result: $max digits";
?>