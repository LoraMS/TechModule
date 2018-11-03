<?php
$listWadons = explode(' ', readline());
$maxCapacity = intval(readline());

while (true) {
    $input = readline();
    if($input === 'end'){
        break;
    }
    $line = explode(' ', $input);
    if ($line[0] === 'Add') {
        $listWadons[] = $line[1];
    } else {
        $passingers = intval($line[0]);
        for ($i = 0; $i < count($listWadons); $i++) {
            if($listWadons[$i] + $passingers <= $maxCapacity){
                $listWadons[$i] += $passingers;
                break;
            }
        }
    }   
}

echo implode(' ', $listWadons);