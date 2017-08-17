<?php
set_time_limit(0);
function bcnn($n1, $n2) {
	$result = max($n1, $n2);
	$d = min($n1, $n2);
	for ($i=1; $i<= $d; $i++) {
		if ($result * $i % $d == 0) {
			$result = $result * $i;
			return $result;
		}
	}
}

$result = 20;
for ($n=19; $n>1; $n--) {
	$result = bcnn($result, $n);
}
echo $result;
?>