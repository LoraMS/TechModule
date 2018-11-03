<?php
$participants = explode(', ', readline());
$songs = explode(', ', readline());
$awards = [];

while(true){
    $input = readline();
    if($input === 'dawn'){
        break;
    }
    $performance = explode(', ', $input);
    $participant = $performance[0];
    $song = $performance[1];
    $award = $performance[2];

    if(in_array($participant, $participants) && in_array($song, $songs)){
        if(!array_key_exists($participant, $awards)){
            $awards[$participant] = [];
            array_push($awards[$participant], $award);
        } else {
            if(!in_array($award, $awards[$participant])){
                array_push($awards[$participant], $award);
            }
        }
    }
}

if (count($awards) === 0){
    echo 'No awards';
    return;
}

krsort($awards);
foreach ($awards as $participant => $value) {
    echo $participant.': '.count($value).' awards'.PHP_EOL;
    foreach ($value as $award => $v){
        echo "--$v".PHP_EOL;
    }
}