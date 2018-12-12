<?php
$games = explode(' ', readline());
while(true){
    $input = readline();
    if($input === 'Play!'){
        break;
    }
    $line = explode(' ', $input);
    $command = $line[0];
    $game = $line[1];
    if($command === 'Install'){
        if(!in_array($game, $games)){
            $games[] = $game;
        }
    } elseif ($command === 'Uninstall'){
        if(in_array($game, $games)){
            $index = array_search($game, $games);
            array_splice($games, $index, 1);
        }
    } elseif ($command === 'Update'){
        if(in_array($game, $games)){
            $index = array_search($game, $games);
            array_splice($games, $index, 1);
            $games[] = $game;
        }
    } elseif ($command === 'Expansion'){
        $toExpand = explode('-', $game);
        $currentGame = $toExpand[0];
        $expansion = $toExpand[1];

        if(in_array($currentGame, $games)){
            $index = array_search($currentGame, $games);
            array_splice($games, $index+1, 0, $currentGame.':'.$expansion);
        }
    }
}

echo implode(' ', $games);