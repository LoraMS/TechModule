<?php
while(true){
    $type = readline();
    if($type === 'Davai Emo'){
        break;
    }
    if($type === 'Type: Normal' || $type === 'Type: Warning' || $type === 'Type: Danger'){
        $source = readline();
        if(preg_match('/^Source: [A-Za-z0-9]+$/', $source, $matchSource)){
            $forecast = readline();
            if(preg_match('/^Forecast: [^!\.,\?]+$/', $forecast, $matchForecast)){
                $type = substr($type, strpos($type, ':') + 2);
                $forecast = substr($forecast, strpos($forecast, ':') + 2);
                $source = substr($source, strpos($source, ':') + 2);
                echo "($type) $forecast ~ $source".PHP_EOL;
            }
        }
    }
}