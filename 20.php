<?php
set_time_limit(120);
$sum = 1;
for ($i = 2; $i <= 100; $i++) {
    while ($i > 0) {
        $sum *= $i % 10;
        $i = floor($i/10);
    }
}
echo $sum;

?>