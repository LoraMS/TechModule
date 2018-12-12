<?php
$key = readline();
$key = preg_quote($key, '/');
$countries = [];
while(true){
    $input = readline();
    if($input === 'final'){
        break;
    }
    $pattern = '/'.$key.'(?<country1>[A-Za-z]+)'.$key.'(.*)'.$key.'(?<country2>[A-Za-z]+)'.$key.'(.*)(?<score1>\d+):(?<score2>\d+)/';
    preg_match($pattern, $input, $match);
    $country1 = strtoupper(strrev($match['country1']));
    $country2 = strtoupper(strrev($match['country2']));
    $score1 = $match['score1'];
    $score2 = $match['score2'];
    if(!key_exists($country1, $countries)){
        $countries[$country1]['points'] = 0;
        $countries[$country1]['bestScore'] = 0;
    }

    $countries[$country1]['bestScore'] += $score1;

    if(!key_exists($country2, $countries)){
        $countries[$country2]['points'] = 0;
        $countries[$country2]['bestScore'] = 0;
    }

    $countries[$country2]['bestScore'] += $score2;

    if($score1 > $score2){
        $countries[$country1]['points'] += 3;
    } elseif($score1 < $score2){
        $countries[$country2]['points'] += 3;
    } else {
        $countries[$country1]['points'] += 1;
        $countries[$country2]['points'] += 1;
    }
}

echo 'League standings:'.PHP_EOL;

$counterPoints = 1;
uksort($countries, function($c1, $c2) use ($countries){
    if($countries[$c2]['points'] === $countries[$c1]['points']){
        return strcmp($c1, $c2);
    }
    return $countries[$c2]['points'] <=> $countries[$c1]['points'];
});

foreach ($countries as $country=>$data){
    echo "$counterPoints. $country ".$data['points'].PHP_EOL;
    $counterPoints ++;
}

echo 'Top 3 scored goals:'.PHP_EOL;

$counterBestScore = 0;
uksort($countries, function ($c1, $c2) use ($countries){
    if($countries[$c2]['bestScore'] === $countries[$c1]['bestScore']){
        return strcmp($c1, $c2);
    }
    return $countries[$c2]['bestScore'] <=> $countries[$c1]['bestScore'];
});

foreach ($countries as $country=>$data){
    if($counterBestScore === 3){
        break;
    }
    echo "- $country -> ".$data['bestScore'].PHP_EOL;
    $counterBestScore ++;
}