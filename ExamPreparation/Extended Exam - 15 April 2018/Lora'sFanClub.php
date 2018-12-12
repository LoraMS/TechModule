<?php
$boys = [];
$zeroValue = 0;
while(true){
    $input = readline();
    if($input === 'Make a decision already!'){
        break;
    }
    $line = explode(' ', $input);
    if(strpos($input, 'does Gyubek!') === false) {
        $name = $line[0];
        $trait = $line[1];
        $value = intval($line[2]);
        if(!key_exists($name, $boys)){
            $boys[$name]= [];
            if($trait === 'Greedy' || $trait === 'Rude' || $trait === 'Dumb'){
                $boys[$name][$trait] = -$value;
            } elseif($trait === 'Kind'){
                $boys[$name][$trait] = $value*2;
            } elseif($trait === 'Handsome'){
                $boys[$name][$trait] = $value*3;
            } elseif($trait === 'Smart'){
                $boys[$name][$trait] = $value*5;
            } else {
                $boys[$name][$trait] = $value;
            }
        } else {
            if(in_array($trait, $boys[$name])) {
                if ($boys[$name][$trait] < $value) {
                    $boys[$name][$trait] = $value;
                }
            } else {
                if($trait === 'Greedy' || $trait === 'Rude' || $trait === 'Dumb'){
                    $boys[$name][$trait] = -$value;
                } elseif($trait === 'Kind'){
                    $boys[$name][$trait] = $value*2;
                } elseif($trait === 'Handsome'){
                    $boys[$name][$trait] = $value*3;
                } elseif($trait === 'Smart'){
                    $boys[$name][$trait] = $value*5;
                } else {
                    $boys[$name][$trait] = $value;
                }
            }
        }
    } else {
        $name = $line[0];
        if(key_exists($name, $boys)){
            foreach ($boys[$name] as $trait => &$value) {
                $value = $zeroValue;
            }
            unset($value);
        }
    }
}

uksort($boys, function ($b1, $b2) use ($boys){
    if (array_sum(array_values($boys[$b2])) === array_sum(array_values($boys[$b1]))){
        return strcmp($b1, $b2);
    }
    return array_sum(array_values($boys[$b2])) <=> array_sum(array_values($boys[$b1]));
});

foreach ($boys as $boy=>$name) {
    echo "# $boy: ".array_sum(array_values($name)).PHP_EOL;
    $values = array_values($name);
    array_multisort($values, SORT_DESC, $name);
    foreach ($name as $trait=>$value) {
        if($value !== 0){
            echo "!!! $trait -> $value".PHP_EOL;
        }
    }
}
