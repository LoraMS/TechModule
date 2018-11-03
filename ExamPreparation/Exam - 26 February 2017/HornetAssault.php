<?php

$beehives = array_map('intval', explode(' ', readline()));
$hornets = array_map('intval', explode(' ', readline()));

for($i = 0; $i < count($beehives); $i++){
    if (count($hornets) === 0){
        break;
    }
    $sumHornetsPower = array_sum($hornets);
//    if($sumHornetsPower > $beehives[$i]){
//        array_splice($beehives, $i, 1);
//        $i--;
//    } else {
//        $beehives[$i] -= $sumHornetsPower;
//        array_splice($hornets, 0, 1);
//    }
    if($beehives[$i] >= $sumHornetsPower){
        array_splice($hornets, 0, 1);
    }
    $beehives[$i] -= $sumHornetsPower;
}

$beehives = array_filter($beehives, function($b){
    return $b > 0;
});

if(count($beehives) > 0){
    echo implode(' ', $beehives);
} else {
    echo implode(' ', $hornets);
}
