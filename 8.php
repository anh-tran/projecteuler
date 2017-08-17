<?php
set_time_limit(60);
$number = file_get_contents("p8.txt");
$number = str_replace(array("\r", "\n"), "", $number);
$arr = explode("0", $number);

$result = 0;
foreach ($arr as $str) {
  if (strlen($str) >= 13) {
    $p = 1;
    for ($i = 0; $i < 13; $i++) {
      $p *= intval($str[$i]);
    }
    if ($p > $result) $result = $p;
    for ($i = 13; $i < strlen($str); $i++) {
      $p = $p / intval($str[$i - 13]) * intval($str[$i]);
      if ($p > $result) $result = $p;
    }
  }
}
echo $result;

?>