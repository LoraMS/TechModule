<?php

$tier = [];
while (true) {
    $input = readline();
    if ($input === 'Season end') {
        break;
    }
    if (strpos($input, ' -> ') !== FALSE) {
        $line = explode(' -> ', $input);
        $player = $line[0];
        $position = $line[1];
        $skill = intval($line[2]);

        if (!key_exists($player, $tier)) {
            $tier[$player] = [];
            $tier[$player][] = ['position' => $position, 'skill' => $skill];
            $tier[$player]['totalSkill'] = $skill;
        } else {
            $positionsPlayer = array_column($tier[$player], 'position');
            if (!in_array($position, $positionsPlayer)) {
                array_push($tier[$player], ['position' => $position, 'skill' => $skill]);
                $tier[$player]['totalSkill'] += $skill;
            } else {
                $positionIndex = array_search($position, $positionsPlayer);
                if($tier[$player][$positionIndex]['skill'] < $skill){
                    $tier[$player]['totalSkill'] += ($skill - $tier[$player][$positionIndex]['skill']);
                    $tier[$player][$positionIndex]['skill'] = $skill;
                }          
            }
        }
    } else {
        $line = explode(' vs ', $input);
        $player1 = $line[0];
        $player2 = $line[1];

        if (key_exists($player1, $tier) && key_exists($player2, $tier)) {
            $positionsPlayer1 = array_column($tier[$player1], 'position');
            $positionsPlayer2 = array_column($tier[$player2], 'position');
            $positionsCompare = array_intersect($positionsPlayer1, $positionsPlayer2);
            if (count($positionsCompare) > 0) {
                if ($tier[$player1]['totalSkill'] > $tier[$player2]['totalSkill']) {
                    unset($tier[$player2]);
                } elseif ($tier[$player1]['totalSkill'] < $tier[$player2]['totalSkill']) {
                    unset($tier[$player1]);
                }
            }
        }
    }
}

uksort($tier, function($player1, $player2) use ($tier) {
    if ($tier[$player2]['totalSkill'] === $tier[$player1]['totalSkill']) {
        return $player1 <=> $player2;
    }
    return $tier[$player2]['totalSkill'] <=> $tier[$player1]['totalSkill'];
});

foreach ($tier as $player => $p) {
    echo $player . ': ' . $p['totalSkill'] . ' skill' . PHP_EOL;
    uksort($p, function($p1, $p2) use ($p) {
        if ($p[$p1]['skill'] === $p[$p2]['skill']) {
            return $p[$p1]['position'] <=> $p[$p2]['position'];
        }
        return $p[$p2]['skill'] <=> $p[$p1]['skill'];
    });
    foreach ($p as $position) {
        if (is_array($position)) {
            echo '- ' . $position['position'] . ' <::> ' . $position['skill'] . PHP_EOL;
        }
    }
}
