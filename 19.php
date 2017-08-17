<?php
set_time_limit(60);

$days_in_month = array(
        31,
        28,
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31
);
function is_leap_year($year) {
    if ($year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0)) {
        return true;
    } else {
        return false;
    }
}

/*
 Sunday: 0
 Monday: 1
 Tuesday: 2
 Wednesday: 3
 Thursday: 4
 Friday: 5
 Saturday: 6
 */

$count = 0;
// 1/1/1901 is Tuesday
$first_day = 2;
for ($y = 1901; $y <= 2000; $y++) {
    if (is_leap_year($y)) {
        $days_in_month[1] = 29;
    } else {
        $days_in_month[1] = 28;
    }

    foreach ($days_in_month as $index => $days) {
        if ($first_day == 0) {
            $count++;
        }
        $first_day = ($first_day + $days) % 7;
    }
}
echo $count;
?>