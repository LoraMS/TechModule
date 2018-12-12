<?php
$tier = [];
while(true){
    $input = readline();
    if($input === 'Season end'){
        break;
    }
    if(strpos($input, '->') !== false){
        $line = explode(' -> ', $input);
        $player = $line[0];
        $position = $line[1];
        $skill = intval($line[2]);

        if(!key_exists($player, $tier)){
            $tier[$player][$position] = $skill;
        } else {
            if(!key_exists($position, $tier[$player])){
                $tier[$player][$position] = $skill;
            } else {
                if($tier[$player][$position] < $skill){
                    $tier[$player][$position] = $skill;
                }
            }
        }
    } else {
        $line = explode(' vs ', $input);
        $player1 = $line[0];
        $player2 = $line[1];
        if(key_exists($player1, $tier) && key_exists($player2, $tier)){
            $positionsPlayer1 = array_keys($tier[$player1]);
            $positionsPlayer2 = array_keys($tier[$player2]);
            $positionsCompare = array_intersect($positionsPlayer1, $positionsPlayer2);
            if (count($positionsCompare) > 0) {
                if(array_sum($tier[$player1]) > array_sum($tier[$player2])){
                    //unset in foreach ->?
                    unset($tier[$player2]);
                } elseif(array_sum($tier[$player1]) < array_sum($tier[$player2])) {
                    //unset in foreach ->?
                    unset($tier[$player1]);
                }
            }
        }
    }
}

uksort($tier, function($player1, $player2) use ($tier){
    $sumPlayer1 = array_sum($tier[$player1]);
    $sumPlayer2 = array_sum($tier[$player2]);
    if($sumPlayer1 === $sumPlayer2){
        return strcmp($player1, $player2);
    }
    return $sumPlayer2 <=> $sumPlayer1;
});

foreach ($tier as $player=>$positions) {
    echo "$player: ".array_sum($positions).' skill'.PHP_EOL;
    uksort($positions, function($p1, $p2) use ($positions) {
        if($positions[$p2] === $positions[$p1]){
            return strcmp($p1, $p2);
        }
        return $positions[$p2] <=> $positions[$p1];
    });
    foreach ($positions as $position=>$skill) {
        echo "- $position <::> $skill".PHP_EOL;
    }
}