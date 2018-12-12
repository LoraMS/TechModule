<?php
// NOT FINISHED 70/100
$size = intval(readline());
$matrix = [];
$startRow = 0;
$startCol = 0;
for($i = 0; $i < $size; $i++){
    $line = readline();
    $matrix[$i] = array_fill(0, strlen($line), 0);
    if(strpos($line, 'S') !== false){
        $index = strpos($line, 'S');
        $matrix[$i][$index] = 'S';
        $startRow = $i;
        $startCol = $index;
    }

    if(strpos($line, 'E') !== false){
        $index = strpos($line, 'E');
        $matrix[$i][$index] = 'E';
    }
}

//for($x = 0; $x < $size; $x++){
//    for($y = 0; $y < $size; $y++){
//        if(!isset($matrix[$x][$y])){
//            $matrix[$x][$y] = 'N';
//        }
//    }
//}

$directions = readline();
$count = 0;
$r = 0;
$c = 0;
for($j = 0; $j < strlen($directions); $j++){
    $direction = $directions[$j];
    $count ++;
    if($direction === 'R'){
        if(isset($matrix[$startRow][$startCol+1])) {
//            $matrix[$startRow][$startCol] = 0;
            $startCol++;
        } else {
//            $matrix[$startRow][$startCol] = 0;
            $startCol = 0;
        }

        if($matrix[$startRow][$startCol] === 'E'){
            echo "Experiment successful. $count turns required.";
            return;
        }

//        $matrix[$startRow][$startCol] = 'S';
        $r = $startRow;
        $c = $startCol;
    } elseif($direction === 'L'){
        if(isset($matrix[$startRow][$startCol-1])) {
//            $matrix[$startRow][$startCol] = 0;
            $startCol --;
        } else {
//            $matrix[$startRow][$startCol] = 0;
            $startCol = 0;
        }

        if($matrix[$startRow][$startCol] === 'E'){
            echo "Experiment successful. $count turns required.";
            return;
        }

//        $matrix[$startRow][$startCol] = 'S';
        $r = $startRow;
        $c = $startCol;
    } elseif($direction === 'U'){
        while(true){
            $startRow--;
            if(isset($matrix[$startRow][$startCol])){
//                $matrix[$startRow][$startCol] = 0;
                break;
            }

            if ($startRow < 0) {
//                $matrix[$startRow][$startCol] = 0;
                $startRow = $size-1;
                break;
            }

        }

        if($matrix[$startRow][$startCol] === 'E'){
            echo "Experiment successful. $count turns required.";
            return;
        }

//        $matrix[$startRow][$startCol] = 'S';
        $r = $startRow;
        $c = $startCol;
    } elseif($direction === 'D'){
        while(true){
            $startRow++;
            if(isset($matrix[$startRow][$startCol])){
//                $matrix[$startRow][$startCol] = 0;
                break;
            }

            if ($startRow === $size) {
//                $matrix[$startRow][$startCol] = 0;
                $startRow = 0;
                break;
            }

        }

//        if($matrix[$startRow+1][$startCol] !== null) {
//            $matrix[$startRow][$startCol] = 0;
//            $startRow ++;
//        } else {
//            if ($startRow + 1 > $size - 1) {
//                $matrix[$startRow][$startCol] = 0;
//                $startRow = 0;
//            } else {
//                while(true){
//                    $startRow++;
//                    if($matrix[$startRow][$startCol] !== null || $startRow === $size){
//                        break;
//                    }
//
//                }
//            }
//        }

        if($matrix[$startRow][$startCol] === 'E'){
            echo "Experiment successful. $count turns required.";
            return;
        }

//        $matrix[$startRow][$startCol] = 'S';
        $r = $startRow;
        $c = $startCol;
    }
}

echo "Robot stuck at $r $c. Experiment failed." ;
