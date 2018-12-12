<?php
$users = [];
while (true) {
    $input = readline();
    if ($input === 'Lumpawaroo') {
        break;
    }

    if (strpos($input, '|') !== FALSE) {
        $line = explode(' | ', $input);
        $side = $line[0];
        $user = $line[1];
        if(!key_exists($user, $users)){
            $users[$user] = $side;
        }
    } elseif (strpos($input, '->') !== FALSE){
        $line = explode(' -> ', $input);
        $user = $line[0];
        $side = $line[1];
        if(!key_exists($user, $users)){
            $users[$user] = $side;
        } else {
            $users[$user] = $side;
        }
        echo "$user joins the $side side!".PHP_EOL;
    }
}

$sides = [];
foreach ($users as $user => $side) {
    $sides[$side][] = $user;
}

uksort($sides, function($side1, $side2) use ($sides){
    $side1Count = count($sides[$side1]);
    $side2Count = count($sides[$side2]);
    if($side2Count === $side1Count){
        return strcmp($side1, $side2);
    }
    return $side2Count <=> $side1Count;
});

foreach ($sides as $side=>$members) {
    echo "Side: $side, Members: ".count($members).PHP_EOL;
    sort($members);
    foreach ($members as $member) {
        echo '! '.$member.PHP_EOL;
    }
}