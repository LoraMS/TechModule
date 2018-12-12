<?php
$towns = [];
$pattern = '/(?<town>[\w-]+):(?<time>\d+|ambush)->(?<passengers>\d+)/';
while(true) {
    $line = readline();
    if ($line === 'Slide rule') {
        break;
    }
    preg_match($pattern, $line, $match);
    $town = $match['town'];
    $timeOrAmbush = $match['time'];
    $passengers = intval($match['passengers']);

//    $firstPart = explode(':', $line);
//    $town = $firstPart[0];
//    $secondPart = explode('->', $firstPart[1]);
//    $timeOrAmbush = $secondPart[0];
//    $passengers = intval($secondPart[1]);

    if ($timeOrAmbush === 'ambush') {
        if (key_exists($town, $towns)) {
            $towns[$town]['time'] = 0;
            $towns[$town]['passengers'] -= $passengers;
        }
    } else {
        $time = intval($timeOrAmbush);
        if (!key_exists($town, $towns)) {
            $towns[$town]['time'] = $time;
            $towns[$town]['passengers'] = $passengers;
        } else {
            if ($towns[$town]['time'] > $time) {
                $towns[$town]['time'] = $time;
            }

            if($towns[$town]['time'] === 0) {
                $towns[$town]['time'] = $time;
            }

            $towns[$town]['passengers'] += $passengers;
        }
    }
}

uksort($towns, function($town1, $town2) use ($towns){
    if($towns[$town1]['time'] === $towns[$town2]['time']){
        return strcmp($town1, $town2);
    }
    return $towns[$town1]['time'] <=> $towns[$town2]['time'];
});

foreach ($towns as $name=>$town) {
    if($town['time'] > 0 && $town['passengers'] > 0){
        echo $name.' -> Time: '.$town['time'].' -> Passengers: '.$town['passengers'].PHP_EOL;
    }
}