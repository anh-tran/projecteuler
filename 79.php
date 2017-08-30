<?php
set_time_limit(60);
$lines = file('p079_keylog.txt');
$numbers = array_map('trim', $lines);

function remove_first_char($numbers, $i) {
    foreach ($numbers as $id => $no) {
        if ($no[0] == $i) {
            $no = substr($no, 1);
            if ($no != "") {
                $numbers[$id] = $no;
            } else {
                unset($numbers[$id]);
            }
        }
    }
    return $numbers;
}

$result = "";
do {
    $changed = false;
    $numbers = array_unique($numbers);
    $weight = array_fill(0, 10, 0);
    foreach ($numbers as $number) {
        for ($i = 0; $i < strlen($number); $i++) {
            $weight[$number[$i]] |= 1<<$i;
        }
    }
    foreach ($weight as $i => $w) {
        if ($w == 1) {
            $result .= $i;
            $numbers = remove_first_char($numbers, $i);

            $changed = true;
        }
    }
} while ($changed);
echo $result;
?>