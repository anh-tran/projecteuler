<?php
set_time_limit(0);

$sum1=0;
$sum2=0;
for ($i = 1; $i <= 100; $i++) {
	$sum1 += $i;
	$sum2 += $i*$i;
}
echo $sum1 * $sum1 - $sum2;
?>