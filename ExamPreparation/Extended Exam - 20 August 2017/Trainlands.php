<?php

$trains = [];
while (true){
    $input = readline();
    if($input === 'It\'s Training Men!'){
        break;
    }
    if(strpos($input, ':') !== false){
        $line = explode(' -> ', $input);
        $trainName = $line[0];
        $wagonLine = explode(' : ', $line[1]);
        $wagonName = $wagonLine[0];
        $wagonPower = intval($wagonLine[1]);

        if(!key_exists($trainName, $trains)){
            $trains[$trainName] = [];
        }
        $trains[$trainName][$wagonName] = $wagonPower;
    } elseif(strpos($input, '->') !== false){
        $line = explode(' -> ', $input);
        $trainName = $line[0];
        $otherTrainName = $line[1];
        if(!key_exists($trainName, $trains)){
            $trains[$trainName] = [];
        }
        foreach ($trains[$otherTrainName] as $wagon=>$power) {
            $trains[$trainName][$wagon] = $power;
        }
        unset($trains[$otherTrainName]);
    } elseif (strpos($input, '=') !== false) {
        $line = explode(' = ', $input);
        $trainName = $line[0];
        $otherTrainName = $line[1];

        $trains[$trainName] = [];
        foreach ($trains[$otherTrainName] as $wagon=>$power) {
            $trains[$trainName][$wagon] = $power;
        }
    }
}

uksort($trains, function($t1, $t2) use ($trains){
    if(array_sum($trains[$t2]) === array_sum($trains[$t1])){
        return count($trains[$t1]) <=> count($trains[$t2]);
    }
    return array_sum($trains[$t2]) <=> array_sum($trains[$t1]);
});

foreach ($trains as $train=>$wagons) {
    echo "Train: $train".PHP_EOL;
    array_multisort(array_values($wagons), SORT_DESC, $wagons);
    foreach ($wagons as $wagon=>$power) {
        echo "###$wagon - $power".PHP_EOL;
    }
}