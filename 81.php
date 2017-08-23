<?php
set_time_limit(60);
$lines = file('p081_matrix.txt');
$path_sum = array();
foreach ($lines as $id => $line) {
    $line = trim($line);
    $numbers = explode(',', $line);
    if ($id == 0) {
        $path_sum = $numbers;
        foreach ($path_sum as $id => $val) {
            if ($id == 0) continue;
            $path_sum[$id] = $path_sum[$id - 1] + $val;
        }
    } else {
        foreach ($numbers as $id => $val) {
            if ($id > 0 && $path_sum[$id] > $path_sum[$id - 1]) {
                $path_sum[$id] = $path_sum[$id - 1] + $val;
            } else {
                $path_sum[$id] = $path_sum[$id] + $val;
            }
        }
    }
}

echo $path_sum[count($path_sum) - 1];
?>