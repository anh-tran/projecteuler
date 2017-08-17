<?php
set_time_limit(0);
function check_prime($no) {
	for ($i = 2; $i <= (int)($no/2); $i++) {
		if ($no % $i == 0) {
			return FALSE;
		}
	}
	return TRUE;
}

$index = 0;
$n = 1;
do {
	$n++;
	if (check_prime($n)) {
		$index++;
	}
} while ($index < 10001);
echo $n;

?>