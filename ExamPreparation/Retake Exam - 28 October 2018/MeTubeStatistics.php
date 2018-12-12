<?php
$videos = [];
while(true){
    $line = readline();
    if($line === 'stats time'){
        break;
    }
    if(preg_match('/-{1}/', $line)){
        $videoViews = explode('-', $line);
        $videoName = $videoViews[0];
        $views = intval($videoViews[1]);
        if(!key_exists($videoName, $videos)){
            $videos[$videoName]['views'] = $views;
            $videos[$videoName]['likes'] = 0;
        } else {
            $videos[$videoName]['views'] += $views;
        }
    } elseif(preg_match('/:{1}/', $line)){
        $videoRate = explode(':', $line);
        $rate = $videoRate[0];
        $videoName = $videoRate[1];
        if(key_exists($videoName, $videos)){
            if($rate === 'like'){
                $videos[$videoName]['likes'] += 1;
            } elseif($rate === 'dislike'){
                $videos[$videoName]['likes'] -= 1;
            }
        }
    }
}

$criteriaLine = explode(' ', readline());
$criteria = $criteriaLine[1];

uksort($videos, function($video1, $video2) use ($videos, $criteria){
    return $videos[$video2][$criteria] <=> $videos[$video1][$criteria];
});


foreach ($videos as $videoName=>$video) {
    echo "$videoName - ".$video['views'].' views - '.$video['likes'].' likes'.PHP_EOL;
}