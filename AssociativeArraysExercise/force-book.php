<?php

$users = [];
while (true) {
    $input = readline();
    if ($input === 'Lumpawaroo') {
        break;
    }

    if (strpos($input, '|') !== FALSE) {
        $line = explode(' | ', $input);
        $forceSide = $line[0];
        $forceUser = $line[1];
        
        if (!key_exists($forceUser, $users)) {
            $users[$forceUser] = '';
            $users[$forceUser] = $forceSide;
        } 
    } elseif (strpos($input, '->') !== FALSE) {
        $line = explode(' -> ', $input);
        $forceSide = $line[1];
        $forceUser = $line[0];
        if (!key_exists($forceUser, $users)) {
            $users[$forceUser] = '';
        } 
        
        $users[$forceUser] = $forceSide;
        echo "$forceUser joins the $forceSide side!" . PHP_EOL;
    }
}

$result = [];
foreach ($users as $user => $side) {
    $result[$side][] = $user;
}

$counts = array_map(function($c) { return count($c); }, $result);
array_multisort($counts, SORT_DESC, array_keys($result), SORT_ASC, $result);

//uksort($result, function($key1, $key2) use ($result){
//    $value1 = $result[$key1];
//    $value2 = $result[$key2];
//
//    $count1 = count($value1);
//    $count2 = count($value2);
//    
//    if($count1 === $count2){
//        return $key1 <=> $key2;
//    }
//
//    return $count2 <=> $count1;
//});

foreach ($result as $side => $users) {
    echo "Side: $side, Members: ".count($users).PHP_EOL;
    sort($users);
    foreach ($users as $user) {
        echo '! '.$user.PHP_EOL;
    }
    
}

