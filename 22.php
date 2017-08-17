<?php
set_time_limit(60);

function alphabet_value($str) {
    $sum = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $sum += ord($str[$i]) - 64;
    }
    return $sum;
}

$text = file_get_contents("p022_names.txt");
$names = explode(",", $text);
foreach ($names as $id => $name) {
    $names[$id] = trim($name, '"');
}
sort($names);

$result = 0;
foreach ($names as $id => $name) {
    $result += ($id + 1) * alphabet_value($name);
}
echo $result;
?>