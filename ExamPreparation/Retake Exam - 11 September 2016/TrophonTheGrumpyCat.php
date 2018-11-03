<?php
$priceRating = array_map('intval', explode(' ', readline()));
$entryPoint = intval(readline());
$itemsType = readline();
$priceRatingType = readline();
$sumLeft = 0;
$sumRight = 0;

for($i = $entryPoint+1; $i < count($priceRating); $i++){
    if($itemsType === 'cheap'){
        switch ($priceRatingType){
            case 'positive':
                if($priceRating[$i] < $priceRating[$entryPoint] && $priceRating[$i] > 0){
                    $sumRight += $priceRating[$i];
                }
                break;
            case 'negative':
                if($priceRating[$i] < $priceRating[$entryPoint] && $priceRating[$i] < 0){
                    $sumRight += $priceRating[$i];
                }
                break;
            case 'all':
                if($priceRating[$i] < $priceRating[$entryPoint]){
                    $sumRight += $priceRating[$i];
                }
                break;
            default:
        }
    } elseif($itemsType === 'expensive') {
        switch ($priceRatingType) {
            case 'positive':
                if ($priceRating[$i] >= $priceRating[$entryPoint] && $priceRating[$i] > 0) {
                    $sumRight += $priceRating[$i];
                }
                break;
            case 'negative':
                if ($priceRating[$i] >= $priceRating[$entryPoint] && $priceRating[$i] < 0) {
                    $sumRight += $priceRating[$i];
                }
                break;
            case 'all':
                if ($priceRating[$i] >= $priceRating[$entryPoint]) {
                    $sumRight += $priceRating[$i];
                }
                break;
            default:
        }
    }
}


for($i = 0; $i < $entryPoint; $i++){
    if($itemsType === 'cheap'){
        switch ($priceRatingType){
            case 'positive':
                if($priceRating[$i] < $priceRating[$entryPoint] && $priceRating[$i] > 0){
                    $sumLeft += $priceRating[$i];
                }
                break;
            case 'negative':
                if($priceRating[$i] < $priceRating[$entryPoint] && $priceRating[$i] < 0){
                    $sumLeft += $priceRating[$i];
                }
                break;
            case 'all':
                if($priceRating[$i] < $priceRating[$entryPoint]){
                    $sumLeft += $priceRating[$i];
                }
                break;
            default:
        }
    } elseif($itemsType === 'expensive') {
        switch ($priceRatingType) {
            case 'positive':
                if ($priceRating[$i] >= $priceRating[$entryPoint] && $priceRating[$i] > 0) {
                    $sumLeft += $priceRating[$i];
                }
                break;
            case 'negative':
                if ($priceRating[$i] >= $priceRating[$entryPoint] && $priceRating[$i] < 0) {
                    $sumLeft += $priceRating[$i];
                }
                break;
            case 'all':
                if ($priceRating[$i] >= $priceRating[$entryPoint]) {
                    $sumLeft += $priceRating[$i];
                }
                break;
            default:
        }
    }
}

if($sumLeft >= $sumRight){
    echo "Left - $sumLeft";
} else {
    echo "Right - $sumRight";
}