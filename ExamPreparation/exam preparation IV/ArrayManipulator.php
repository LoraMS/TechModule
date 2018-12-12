<?php
//NOT FINISHED 10p
$arr = array_map('intval', explode(' ', readline()));
$result = [];

while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }
    $line = explode(' ', $input);
    $command = $line[0];
    if($command === 'exchange'){
        $index = $line[1];
        if($index < 0 || $index > count($arr)){
            echo 'Invalid index'.PHP_EOL;
        } else {
            $firstPart = array_slice($arr, 0, $index + 1);
            $secondPart = array_slice($arr, $index + 1);
            $arr = array_merge($secondPart, $firstPart);
        }

    } elseif($command === 'max'){
        $secondCommand = $line[1];
        $max = PHP_INT_MIN;
        $position = -1;
        if($secondCommand === 'odd'){
            for ($i = 0; $i < count($arr); $i++) {
                if($arr[$i] %2 !== 0){
                    if($arr[$i] >= $max){
                        $max = $arr[$i];
                        $position = $i;
                    }
                }
            }
        } elseif ($secondCommand === 'even'){
            for ($i = 0; $i < count($arr); $i++) {
                if($arr[$i] %2 === 0){
                    if($arr[$i] >= $max){
                        $max = $arr[$i];
                        $position = $i;
                    }
                }
            }
        }
        if($position === -1){
            echo 'No matches'.PHP_EOL;
        } else {
            echo $position.PHP_EOL;
        }
    } elseif($command === 'min'){
        $secondCommand = $line[1];
        $min = PHP_INT_MAX;
        $position = -1;
        if($secondCommand === 'odd'){
            for ($i = 0; $i < count($arr); $i++) {
                if($arr[$i] %2 !== 0){
                    if($arr[$i] <= $min){
                        $min = $arr[$i];
                        $position = $i;
                    }
                }
            }
        } elseif ($secondCommand === 'even'){
            for ($i = 0; $i < count($arr); $i++) {
                if($arr[$i] %2 === 0){
                    if($arr[$i] <= $min){
                        $min = $arr[$i];
                        $position = $i;
                    }
                }
            }
        }
        if($position === -1){
            echo 'No matches'.PHP_EOL;
        } else {
            echo $position.PHP_EOL;
        }
    } elseif($command === 'first'){
        $count = $line[1];
        $secondCommand = $line[2];
        $result = [];
        if($count > count($arr)){
            echo 'Invalid count'.PHP_EOL;
        } else {
            if ($secondCommand === 'odd') {
                $result = array_filter($arr, function ($n) {
                    return $n % 2 !== 0;
                });
                $result = array_slice($arr, 0, $count);
            } elseif ($command === 'even') {
                $result = array_filter($arr, function ($n) {
                    return $n % 2 === 0;
                });
                $result = array_slice($arr, 0, $count);
            }
        }
        if(count($result) === 0){
            echo '[]'.PHP_EOL;
        } else {
            echo '['.implode(', ', $result).']'.PHP_EOL;
        }
    } elseif($command === 'last'){
        $count = $line[1];
        $secondCommand = $line[2];
        $result = [];
        if($count > count($arr)){
            echo 'Invalid count'.PHP_EOL;
        } else {
            if($secondCommand === 'odd'){
                $result = array_filter($arr, function($n){
                    return $n %2 !== 0;
                });
                $result = array_slice($arr, -$count);
            } elseif ($command === 'even'){
                $result = array_filter($arr, function($n){
                    return $n %2 === 0;
                });
                $result = array_slice($arr, -$count);
            }
        }
        if(count($result) === 0){
            echo '[]'.PHP_EOL;
        } else {
            echo '['.implode(', ', $result).']'.PHP_EOL;
        }
    }
}

echo '['.implode(', ', $arr).']';