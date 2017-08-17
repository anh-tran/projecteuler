<?php
set_time_limit(300);

function is_triangle($number) {
    $n = intval(sqrt($number * 2));
    if ($n * ($n+1) == $number * 2)
        return true;
    else
        return false;
}

function calc_word($w) {
    $characters = str_split($w);
    $result = 0;
    foreach ($characters as $c) {
        if ($c != '"') {
            $result += ord($c) - 64;
        }
    }
    return $result;
}

$str = file_get_contents("p042_words.txt");
$words = explode(',', $str);
$count = 0;


foreach ($words as $word) {
    $number = calc_word($word);
    if (is_triangle($number)) {
        $count++;
    }
}
echo $count;
?>