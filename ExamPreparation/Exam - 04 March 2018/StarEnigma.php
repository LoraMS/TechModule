<?php
$num = intval(readline());
$pattern = '/([^@!\-:>]*)@(?<planet>[A-Za-z]+)([^@!\-:>]*):(?<population>\d+)([^@\-!:>]*)!(?<attackType>[A|D])!([^@\-!:>]*)\->(?<soldier>\d+)([^@\-!:>]*)/';
$attackedPlanets = [];
$destroyedPlanets = [];
for($i = 0; $i < $num; $i++){
    $decrypted = readline();
    $countKeys = preg_match_all('/[sStTaArR]/', $decrypted, $matches);
    $encrypted = '';
    for ($y = 0; $y < strlen($decrypted); $y ++) {
        $current = ord($decrypted[$y]);
        $ascii = $current-$countKeys;
        $new = chr($ascii);
        $encrypted .= $new;
    }
    if(preg_match($pattern, $encrypted, $matches)) {
        $planet = $matches['planet'];
        $population = $matches['population'];
        $attackType = $matches['attackType'];
        $soldier = $matches['soldier'];
        if ($attackType === 'A') {
            $attackedPlanets[] = $planet;
        } elseif ($attackType === 'D') {
            $destroyedPlanets[] = $planet;
        }
    }
}

sort($attackedPlanets);
sort($destroyedPlanets);

echo 'Attacked planets: '.count($attackedPlanets).PHP_EOL;
foreach ($attackedPlanets as $planet) {
    echo "-> $planet".PHP_EOL;
}
echo 'Destroyed planets: '.count($destroyedPlanets).PHP_EOL;
foreach ($destroyedPlanets as $planet) {
    echo "-> $planet".PHP_EOL;
}