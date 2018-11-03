<form>
    <input type="text" name="array" />
    <input type="submit" />
</form>

<?php

if (isset($_GET['array'])) {
    $array = array_map('intval', explode(' ', $_GET['array']));
    $greater = [];

    $len = count($array);
    if($len <= 1){
        echo 'No';
        return;
    }
    $sum = array_sum($array);
    $averageNumber = $sum / $len;
    
    for($i = 0; $i < count($array); $i++){
        if($array[$i] > $averageNumber){
            $greater[] = $array[$i];
        }
    }

    rsort($greater);
    $result = array_slice($greater, 0, 5);

    echo implode(' ', $result);

}