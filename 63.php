<?php
set_time_limit(60);

$result = 0;
for ($i = 1; $i < 10; $i++){
    $n = 1;
    while (1) {
        $digits = strlen(bcpow($i, $n));
        if ($digits == $n) {
            $result++;
        } else {
            break;
        }
        $n++;
    }
}
echo $result;
?>