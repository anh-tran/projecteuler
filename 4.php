<?php
set_time_limit(0);
function check_palindromic($no) {
	$digits = array();
	while ($no > 0) {
		$digits[] = $no % 10;
		$no = (int) ($no / 10);
	}
	$n = count($digits);
	for ($i = 0; $i < $n / 2; $i++) {
		if ($digits[$i] != $digits[$n-1-$i]) {
			return FALSE;
		}
	}
	return TRUE;
}

$result = 0;
for ($n1 = 999; $n1 > 99; $n1--) {
	for ($n2 = 999; $n2 > 99; $n2--) {
		$n = $n1*$n2;
		if ($n>$result && check_palindromic($n)) {
			$result = $n;
		}
	}
}
echo $result;
?>