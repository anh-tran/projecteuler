<?php
set_time_limit(300);

function find_pandigital($n) {
    $number = "";
    $j = $n;
    $count = 0;
    while (1) {
        if ($j > 0) {
            if (strpos($number, (string)$j) === false) {
                $number .= $j;
                $j = $n;
                if (strlen($number) == $n) {
                    //check
                    if (gmp_prob_prime($number) > 0) {
                        echo $number . " TRUE<br>";
                        return true;
                    }
                    $j = intval(substr($number, -1));
                    $number = substr($number, 0, -1);
                    $j--;
                }
            } else {
                $j--;
            }
        } else {
            $j = $n;
            if ($number == "") {
                break;
            }
            $j = intval(substr($number, -1));
            $number = substr($number, 0, -1);
            $j--;
        }
    }
    return false;
}

for ($i = 7; $i > 0; $i--) {
    echo "Check $i<br>\r\n";
    if (find_pandigital($i)) break;
}
?>