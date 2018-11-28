<?php

$n = intval(readline());
$defaultDamage = 45;
$defaultHealth = 250;
$defaultArmor = 10;
$dragons = [];

for ($i = 0; $i < $n; $i++) {
    $line = explode(' ', readline());
    $type = $line[0];
    $name = $line[1];
    $damage = ($line[2] === 'null') ? $defaultDamage : intval($line[2]);
    $health = ($line[3] === 'null') ? $defaultHealth : intval($line[3]);
    $armor = ($line[4] === 'null') ? $defaultArmor : intval($line[4]);


//    if (!key_exists($type, $dragons)) {
//        $dragons[$type] = [];
//    }
//    
//    if(!key_exists($name, $dragons[$type])){
//        $dragons[$type][$name] = [];
//    }
    
    $dragons[$type][$name] = [];
    $dragons[$type][$name][] = $damage;
    $dragons[$type][$name][] = $health;
    $dragons[$type][$name][] = $armor;
   
}

foreach ($dragons as $type => $names) {
    $sumDamage = array_sum(array_column($dragons[$type], '0'));
    $sumHealth = array_sum(array_column($dragons[$type], '1'));
    $sumArmor = array_sum(array_column($dragons[$type], '2'));
    $typeSize = count($names);
    $averageDamage = number_format(($sumDamage / $typeSize), 2, '.', '');
    $averageHealth = number_format(($sumHealth / $typeSize), 2, '.', '');
    $averageArmor = number_format(($sumArmor / $typeSize), 2, '.', '');
    echo "$type::($averageDamage/$averageHealth/$averageArmor)" . PHP_EOL;
    ksort($names);
    foreach ($names as $dragon => $value) {
        echo "-$dragon -> damage: $value[0], health: $value[1], armor: $value[2]" . PHP_EOL;
    }
}

