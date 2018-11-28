<?php
$list = explode(', ', readline());
$participants = [];
while(true){
    $line = readline();
    if($line === 'end of race'){
        break;
    }
    $patternName = '/[A-Za-z]/';
    $patternDistance = '/[\d]/';
    preg_match_all($patternName, $line, $matchName);
    preg_match_all($patternDistance, $line, $matchDistance);
    $name = implode('',$matchName[0]);
    $distance = array_sum(array_map('intval', $matchDistance[0]));

    if(!key_exists($name, $participants)){
        $participants[$name] = $distance;
    } else {
        $participants[$name] += $distance;
    }
}
uksort($participants, function($p1, $p2) use ($participants){
    return $participants[$p2] <=> $participants[$p1];
});

$count = 0;
foreach ($participants as $participant=>$distance){
    if($count === 3){
        break;
    }
    if(in_array($participant, $list)){
        $count ++;
        if($count === 1){
            echo "{$count}st place: $participant".PHP_EOL;
        } elseif($count === 2){
            echo "{$count}nd place: $participant".PHP_EOL;
        } elseif ($count === 3){
            echo "{$count}rd place: $participant".PHP_EOL;
        }
    }
}