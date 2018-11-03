<?php
$sites = intval(readline());
$securityKey = intval(readline());
$siteLoss = 0.0;

for($i = 0; $i < $sites; $i++){
    $line = explode(' ', readline());
    $siteName = $line[0];
    $siteVisits = $line[1];
    $siteCommercialPricePerVisit = $line[2];
    $siteLoss += $siteVisits * $siteCommercialPricePerVisit;
    echo $siteName.PHP_EOL;
}

$_floatSiteLoss = explode(".", $siteLoss);
if(count($_floatSiteLoss) === 2){
    $afterDecimalPoint = strlen($_floatSiteLoss[1]);
    echo 'Total Loss: '.$siteLoss.str_repeat('0', (20-$afterDecimalPoint)).PHP_EOL;
} else {
    echo 'Total Loss: '.$siteLoss.'.'.str_repeat('0', 20).PHP_EOL;
}
$securityToken = bcpow($securityKey, $sites);
echo 'Security Token: '.$securityToken;
