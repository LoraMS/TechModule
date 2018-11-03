<?php
$websites = intval(readline());
$securityKey = readline();
$totalLoss = 0.0;

for($i = 0; $i < $websites; $i++){
    $data = explode(' ', readline());
    $siteName = $data[0];
    echo $siteName.PHP_EOL;
    $siteVisits = intval($data[1]);
    $siteCommercialPricePerVisit = floatval($data[2]);
    $siteLoss = $siteVisits * $siteCommercialPricePerVisit;
    $totalLoss += $siteLoss;
}

if($websites > 0) {
//list($whole, $decimal) = explode('.', $totalLoss);
    $wholeDecimal = explode('.', $totalLoss);
    if (count($wholeDecimal) === 2) {
        $whole = $wholeDecimal[0];
        $decimal = $wholeDecimal[1];
        echo 'Total Loss: ' . $whole . '.';
        echo str_pad($decimal, 20, '0', STR_PAD_RIGHT) . PHP_EOL;
    } else {
        $whole = $wholeDecimal[0];
        echo 'Total Loss: ' . $whole . '.';
        echo str_repeat('0', 20) . PHP_EOL;
    }

    echo 'Security Token: ' . bcpow($securityKey, $websites);
}

