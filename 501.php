<?php
set_time_limit(300);
$n = 100;
$arr = array(2);
function find($n) {
    global $arr;
    $i = 3;
    while ($i < $n) {
        $nto = true;
        foreach ($arr as $j) {
            if ($i % $j == 0) {
                $nto = false;
                break;
            }
        }
        if ($nto) {
            $arr[] = $i;
        }
        $i+=2;
    }
}
find (1000000);
echo count($arr);
?>