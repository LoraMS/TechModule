<?php
$healthPattern = '/[^0-9+\-*\/\.]+/';
$damagePattern = '/-?\d+(?:\.\d+)?/';
$arithmeticPattern = '/[\/*]+/';
$names = preg_split('/[\s]*,[\s]*/', readline());
$demons = [];

foreach ($names as $name) {
    $health = 0;
    $damage = 0.0;
    preg_match_all($healthPattern, $name, $healthMatch);
    preg_match_all($damagePattern, $name, $damageMatch);
    preg_match_all($arithmeticPattern, $name, $arithmeticMatch);

    $healthLetters = implode('', $healthMatch[0]);
    for($i = 0; $i < strlen($healthLetters); $i++){
        $health += ord($healthLetters[$i]);
    }
    
    for($j = 0; $j < count($damageMatch[0]); $j++){
        if($damageMatch[0][$j][0] !== '-'){
            $damage += $damageMatch[0][$j];
        } else {
            $number = substr($damageMatch[0][$j], 1);
            $damage -= $number;
        }
    }

    $symbols = implode('', $arithmeticMatch[0]);
    for ($s = 0; $s < strlen($symbols); $s++) {
        if($symbols[$s] === '*'){
            $damage *= 2;
        } elseif ($symbols[$s] === '/'){
            $damage /= 2;
        }
    }

    $demons[$name]['health'] = $health;
    $demons[$name]['damage'] = $damage;
}

uksort($demons, function($d1, $d2){
    return strcmp($d1, $d2);
});

foreach ($demons as $demon=>$data) {
    echo "$demon - ".$data['health']." health, ".sprintf('%0.2f', $data['damage'])." damage".PHP_EOL;
}