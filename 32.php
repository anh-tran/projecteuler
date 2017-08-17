<?php
set_time_limit(60);

// a = b * c
// abc contains 9 digits from 1-9
// Let b < c
// => a: 4 digits, b: 1 digit, c: 4 digits
// OR a: 4 digits, b: 2 digits, c: 3 digits

function is_pandigital($n) {
  if (strpos($n, "0") !== FALSE) return FALSE;
  return count(array_unique(str_split($n))) == strlen($n);
}

$result = 0;
for ($a = 1234; $a <= 9876; $a++) {
  for ($b = 1; $b <= 98; $b++) {
    if (is_pandigital($a) && is_pandigital($b) && ($a % $b == 0)) {
      $c = $a / $b;
      if (is_pandigital($a . $b . $c) && strlen($a . $b . $c) == 9) {
        $result += $a;
        break;
      }
    }
  }
}
echo $result;
?>