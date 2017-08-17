<?php
set_time_limit(60);
// 7 digits number has maximum 7* 9^5=413343 (less than 7 digits)
// So the number can only be maximum 6 digits
$limit = 6 * 9 ** 5;

function is_sum_fifth_powers($n) {
  $sum = 0;
  $tmp = $n;
  while ($tmp > 0) {
    $sum += ($tmp % 10) ** 5;
    $tmp = intval($tmp/10);
  }
  return $sum == $n;
}

$result = 0;
for ($i = 2; $i <= $limit; $i++) {
  if (is_sum_fifth_powers($i)) {
    $result += $i;
  }
}
echo $result;
?>