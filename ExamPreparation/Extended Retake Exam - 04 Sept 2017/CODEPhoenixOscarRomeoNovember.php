<?php
$mates = [];
while(true){
    $input = readline();
    if($input === 'Blaze it!'){
        break;
    }
    $line = explode(' -> ', $input);
    $creature = $line[0];
    $mate = $line[1];

    if(!key_exists($creature, $mates)){
        $mates[$creature] = [];
        $mates[$creature][] = $mate;
    } else {
        if(!in_array($mate, $mates[$creature]) && $mate !== $creature){
            $mates[$creature][] = $mate;
        }
    }
}

foreach ($mates as $creature=>$friends) {
    for($i = 0; $i < count($friends); $i++){
        $currentFriend = $friends[$i];
        if(key_exists($currentFriend, $mates)){
            if(in_array($creature, $mates[$currentFriend])){
                $index = array_search($creature, $mates[$currentFriend]);
                array_splice($friends, $i, 1);
                array_splice($mates[$currentFriend], $index, 1);
                $i--;
            }
        }
    }
}

uksort($mates, function ($m1, $m2) use ($mates){
    return count($mates[$m2]) <=> count($mates[$m1]);
});

foreach ($mates as $creature=>$friends) {
        echo "$creature : ".count($friends).PHP_EOL;
}