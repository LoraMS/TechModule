<?php
$sets = [];
$tempSet = [];
while (true){
    $input = readline();
    if($input === 'thetinggoesskrra'){
        break;
    }
    if(strpos($input, '|') === false){
        $sets[$input] = [];
        if(key_exists($input, $tempSet)){
            $sets[$input] = $tempSet[$input];
        }
    } else {
        $line = explode(' | ', $input);
        $set = $line[1];
        $info = explode(' -> ', $line[0]);
        $key = $info[0];
        $size = $info[1];
        if(key_exists($set, $sets)){
            $sets[$set][$key] = $size;
        } else {
            $tempSet[$set][$key] = $size;
        }
    }
}

uksort($sets, function ($s1, $s2) use ($sets){
    return array_sum(array_values($sets[$s2])) <=> array_sum(array_values($sets[$s1]));
});
$firstSet = [];
foreach ($sets as $set=>$info) {
    echo "Data Set: $set, Total Size: ".array_sum(array_values($info)).PHP_EOL;
    foreach ($info as $key=>$size) {
        echo "$.$key".PHP_EOL;
    }
    break;
}

