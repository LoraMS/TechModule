<?php
$num = intval(readline());
$pattern = '/([^@\-!:>]*)@(?<planet>[A-Za-z]+)([^@\-!:>]*):(?<population>\d+)([^@\-!:>]*)!(?<attackType>[A|D])!([^@\-!:>]*)\->(?<soldier>\d+)([^@\-!:>]*)/';
$attackedPlanets = [];
$destroyedPlanets = [];
for($i = 0; $i < $num; $i++){
    $line = readline();
    $count = 0;
    for($j = 0; $j < strlen($line); $j++){
        $currentChar = $line[$j];
        if($currentChar === 'S'||$currentChar === 'T'||$currentChar === 'A'||$currentChar === 'R'||$currentChar === 's'||$currentChar === 't'||$currentChar === 'a'||$currentChar === 'r'){
            $count++;
        }
    }
    $message = '';
    for($y = 0; $y < strlen($line); $y++){
        $currentChar = $line[$y];
        $asciiChar = ord($currentChar) - $count;
        $message .= chr($asciiChar);
    }
    preg_match_all($pattern, $message, $matches);
    for($x = 0; $x < count($matches['planet']); $x++){
        if($matches['attackType'][$x] === 'A'){
            $attackedPlanets[] = $matches['planet'][$x];
        } else {
            $destroyedPlanets[] = $matches['planet'][$x];
        }
    }
}

sort($attackedPlanets);
sort($destroyedPlanets);

echo 'Attacked planets: '.count($attackedPlanets).PHP_EOL;
foreach ($attackedPlanets as $attackedPlanet=>$name) {
    echo '-> '.$name.PHP_EOL;
}
echo 'Destroyed planets: '.count($destroyedPlanets).PHP_EOL;
foreach ($destroyedPlanets as $destroyedPlanet=>$name) {
    echo '-> '.$name.PHP_EOL;
}
