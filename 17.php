<?php
set_time_limit(60);

$units = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine");
$teens = array("ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen");
$tens = array("twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety");

// one digit
$sum_one_digit = 0;
foreach ($units as $word) {
    $sum_one_digit += strlen($word);
}

// one and two digits
$sum_two_digits = $sum_one_digit;
foreach ($teens as $word) {
    $sum_two_digits += strlen($word);
}
foreach ($tens as $word) {
    $sum_two_digits += strlen($word) * 10 + $sum_one_digit;
}

// one to three digits
$sum_three_digits = $sum_two_digits;
foreach ($units as $word) {
    $sum_three_digits += (strlen($word) + strlen("hundred")) * 100 + strlen("and") * 99 + $sum_two_digits;
}

echo $sum_three_digits + strlen("onethousand");

?>