<?php
$namePattern = '/\[(?<name>[^\s-][A-Za-z-\s]+[^\s-])\]/';
$lyricsPattern = '/"(?<lyrics>[\w\s]+)"/';
$lengthPattern = '/(?<length>\d+s|\d+:\d+m)/';

$counter = 0;
while(true){
    $input = readline();
    if($input === 'Rock on!'){
        break;
    }
    if($counter === 4){
        break;
    }

    if(preg_match($namePattern, $input, $nameMatch) && preg_match($lyricsPattern, $input, $lyricsMatch) && preg_match($lengthPattern, $input, $lengthMatch)){
        $counter ++;
        $name = $nameMatch['name'];
        $lyrics = $lyricsMatch['lyrics'];
        $length = $lengthMatch['length'];
        $time = substr($length,0, -1);
        if(strpos($time, ':') === false){
            $seconds = intval($time);
//            $minutes = floor($seconds / 60);
//            $seconds -= $minutes * 60;
//            $time = "$minutes:$seconds";
            $time = gmdate("i:s", $seconds);
        }

        echo "$name -> $time => $lyrics".PHP_EOL;
    }
}