<?php
set_time_limit(60);
$start_time = microtime(true);
// your code here

// end
$end_time = microtime(true);
echo PHP_EOL . "<br>Total execution time: " . ($end_time - $start_time);
?>