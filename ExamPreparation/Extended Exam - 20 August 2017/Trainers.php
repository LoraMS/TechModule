<?php
$participants = intval(readline());
$earnedMoneyMax = 0;
$teamWinner = '';
for($i = 0; $i < $participants; $i++){
    $distance = intval(readline());
    $cargo = floatval(readline());
    $team = readline();

    $participantEarnedMoney = (($cargo*1000) * 1.5) - (0.7 * ($distance*1600) * 2.5);
    if($participantEarnedMoney > $earnedMoneyMax){
        $earnedMoneyMax = $participantEarnedMoney;
        $teamWinner = $team;
    }
}

echo "The $team Trainers win with $".sprintf('%.3f', $earnedMoneyMax).".";