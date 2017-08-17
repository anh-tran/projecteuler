<?php
set_time_limit(60);
$lines = file("p18.txt");
$arr = array();
foreach ($lines as $line) {
    $arr[] = explode(" ", $line);
}

for ($i = 1; $i < count($arr); $i++) {
    for ($j = 0; $j <= $i; $j++) {
        $pre = 0;
        if ($j > 0) {
            $pre = intval($arr[$i - 1][$j - 1]);
        }

        if ($j < $i && $pre < intval($arr[$i - 1][$j])) {
            $pre = intval($arr[$i - 1][$j]);
        }

        $arr[$i][$j] = intval($arr[$i][$j]) + $pre;
    }
}
echo max($arr[count($arr) - 1]);
?>