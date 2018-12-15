<?php
$n = intval(readline());
$legions = [];
$pattern = '/(?<lastActivity>\d+) = (?<legionName>.+) -> (?<soldierType>[a-zA-Z]+):(?<soldierCount>\d+)/';
for($i = 0; $i < $n; $i++){
    $input = readline();
    preg_match($pattern, $input, $match);
    $lastActivity = intval($match['lastActivity']);
    $legionName = $match['legionName'];
    $soldierType = $match['soldierType'];
    $soldierCount = intval($match['soldierCount']);
    if(!key_exists($legionName, $legions)){
        $legions[$legionName] = ['activity'=>$lastActivity, $soldierType=>$soldierCount];
    } else {
        if($legions[$legionName]['activity'] < $lastActivity){
            $legions[$legionName]['activity'] = $lastActivity;
        }

        if(!key_exists($soldierType, $legions[$legionName])){
            $legions[$legionName][$soldierType] = $soldierCount;
        } else {
            $legions[$legionName][$soldierType] += $soldierCount;
        }
    }
}

$criteria = readline();
$groupByType = [];
if(strpos($criteria, '\\') !== false){
    $line = explode('\\', $criteria);
//    $line = preg_split("/\\\\/", $criteria);
    $activity = $line[0];
    $type = $line[1];
    foreach ($legions as $legion=>$types) {
        foreach ($types as $key=>$value) {
            if($key === $type && $types['activity'] < $activity){
                $groupByType[$legion] = $value;
            }
        }
    }

//    // unstable sort
//    uksort($groupByType, function ($l1, $l2) use ($groupByType){
//        $a = $groupByType[$l1];
//        $b = $groupByType[$l2];
//
//        if ($a === $b){
//            return strcmp($l1, $l2);
//        }
//        return $a < $b ? 1 : -1;
//    });

    // STABLE SORT
    $keys = array_keys($groupByType);
    array_multisort($groupByType, SORT_DESC, range(1, count($groupByType)), $keys);
    $groupByType = array_combine($keys, $groupByType);

    foreach ($groupByType as $item=>$count) {
       echo "$item -> $count".PHP_EOL;
    }
} else {
    $type = $criteria;
    foreach ($legions as $legion=>$types) {
        foreach ($types as $key=>$value) {
            if($key === $type){
                $groupByType[$legion] = $types['activity'];
            }
        }
    }

    // STABLE SORT
    $keys = array_keys($groupByType);
    array_multisort($groupByType, SORT_DESC, range(1, count($groupByType)), $keys);
    $groupByType = array_combine($keys, $groupByType);

    foreach ($groupByType as $item=>$a) {
        echo "$a : $item".PHP_EOL;
    }
}