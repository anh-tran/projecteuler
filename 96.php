<?php
set_time_limit(60);

function solve(&$arr) {
    $mark = array();
    
    do {
        // mark all exist number
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($arr[$i][$j] > 0) {
                    for ($k = 0; $k < 9; $k++) {
                        $mark[$i][$k][$arr[$i][$j]] = 1;
                        $mark[$k][$j][$arr[$i][$j]] = 1;
                        $mark[intval($i/3)*3 + intval($k/3)][intval($j/3)*3 + ($k%3)][$arr[$i][$j]] = 1;
                    }
                }
            }
        }
        
        $changed = false;
        $need_to_solve = false;
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($arr[$i][$j] == 0) {
                    $need_to_solve = true;
                    if (!empty($mark[$i][$j]) && array_sum((array)$mark[$i][$j]) == 8) {
                        for ($k = 1; $k <= 9; $k++) {
                            if (empty($mark[$i][$j][$k])) {
                                $arr[$i][$j] = $k;
                                $changed = true;
                            }
                        }
                    } else {
                        for ($k = 1; $k <= 9; $k++) {
                            if (empty($mark[$i][$j][$k])) {
                                // horizontal
                                $sum = 0;
                                for ($l = 0; $l < 9; $l++) {
                                    $sum += intval($arr[$i][$l][$k]);
                                }
                                if ($sum == 8) {
                                    $arr[$i][$j] = $k;
                                    $changed = true;
                                    break;
                                }
                                
                                // vertical
                                $sum = 0;
                                for ($l = 0; $l < 9; $l++) {
                                    $sum += $arr[$l][$j][$k];
                                }
                                if ($sum == 8) {
                                    $arr[$i][$j] = $k;
                                    $changed = true;
                                    break;
                                }
                                
                                // square
                                $sum = 0;
                                for ($l = 0; $l < 9; $l++) {
                                    $sum += $arr[intval($i/3)*3 + intval($k/3)][intval($j/3)*3 + ($k%3)][$k];
                                }
                                if ($sum == 8) {
                                    $arr[$i][$j] = $k;
                                    $changed = true;
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
    } while ($need_to_solve && $changed);
}

function print_sudoku($arr) {
    for ($i = 0; $i < 9; $i++) {
        echo implode(" ", $arr[$i]) . "<br>\r\n";
    }
}

$result = 0;
$file = @fopen("p096_sudoku.txt", "r");
while(!feof($file)) {
    // Grid line
    fgets($file);
    
    // Numbers array
    $lines = array();
    for ($i = 0; $i < 9; $i++) {
        $lines[] = str_split(trim(fgets($file)));
    }
    print_sudoku($lines);
    solve($lines);
    echo "===Solved===<br>\r\n";
    print_sudoku($lines);
    echo "============<br>\r\n";
    $result += 100*$lines[0][0] + 10*$lines[0][1] + $lines[0][2];
}
fclose($file);
echo $result;
?>