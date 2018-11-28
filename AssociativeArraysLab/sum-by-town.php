<?php

$info = explode(', ', readline());
$towns = [];
$incoms = [];
$result = [];
for ($i = 0; $i < count($info); $i++) {
    if($i%2 === 0){
        $towns[] = $info[$i]; 
    } else {
        $incoms[] = $info[$i];
    }
}

for ($j = 0; $j < count($towns); $j++) {
    $town = $towns[$j];
    if(!key_exists($town, $result)){
        $result[$town] = 0;
    }
    
    $result[$town] += $incoms[$j];
}

foreach ($result as $key => $value) {
    echo "$key => $value".PHP_EOL;
}

