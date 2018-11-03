<?php
$orders = intval(readline());
$totalPrice = 0;
for ($i = 0; $i < $orders; $i++) {
    $pricePerCapsule = floatval(readline());
    $orderDateArr = explode('/', readline());
    $month = $orderDateArr[1];
    $year = $orderDateArr[2];
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $capsulesCount = intval(readline());

    $price = (($daysInMonth * $capsulesCount) * $pricePerCapsule);
    $totalPrice += $price;
    echo 'The price for the coffee is: $'.sprintf('%.2f', $price).PHP_EOL;
}

echo 'Total: $'.sprintf('%.2f', $totalPrice);