<?php
set_time_limit(60);
$romans = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
function roman2number($roman) {
    global $romans;
    $result = 0;
    foreach ($romans as $str => $val) {
        while (strpos($roman, $str) === 0) {
            $roman = substr($roman, strlen($str));
            $result += $val;
        }
    }
    return $result;
}

function number2roman($number) {
    global $romans;
    $result = "";
    foreach ($romans as $str => $val) {
        while ($number >= $val) {
            $number -= $val;
            $result .= $str;
        }
    }
    return $result;
}

$result = 0;
$lines = file('p089_roman.txt');
foreach ($lines as $roman) {
    $roman = trim($roman);
    $new_roman = number2roman(roman2number($roman));
    $diff = strlen($roman) - strlen($new_roman);
    if ($diff > 0) {
        echo "[$roman] -> [$new_roman] : $diff<br>\r\n";
    }
    $result += strlen($roman) - strlen($new_roman);
}
echo $result;
?>