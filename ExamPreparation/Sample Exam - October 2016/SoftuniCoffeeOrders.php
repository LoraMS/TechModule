<?php
$orders = intval(readline());
$totalPrice = 0;
for ($i = 0; $i < $orders; $i++) {
    $pricePerCapsule = floatval(readline());
    $orderDate = explode('/',readline());
    $date = strtotime("$orderDate[2]/$orderDate[1]/$orderDate[0]");
    $month = date('m', $date);
    $year = date('Y', $date);
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $capsulesCount = intval(readline());

    $price = ($daysInMonth * $capsulesCount) * $pricePerCapsule;
    $totalPrice += $price;
    echo 'The price for the coffee is: $'.sprintf('%.2f', $price).PHP_EOL;
}

echo 'Total: $'.sprintf('%.2f', $totalPrice);