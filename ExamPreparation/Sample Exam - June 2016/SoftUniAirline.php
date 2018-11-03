<?php
$n = intval(readline());
$overallProfit = 0;
for ($i = 0; $i < $n; $i++) {
    $adultCount = intval(readline());
    $adultTicketPrice = floatval(readline());
    $youthCount = intval(readline());
    $youthTicketPrice = floatval(readline());
    $fuelPricePerHour = floatval(readline());
    $fuelConsumptionPerHour = readline();
    $flightDuration = readline();

    $income = ($adultCount * $adultTicketPrice) + ($youthCount * $youthTicketPrice);
    $expenses = $flightDuration * $fuelConsumptionPerHour * $fuelPricePerHour;

    $overallProfit += $income - $expenses;

    if ($income >= $expenses) {
        echo 'You are ahead with ' . sprintf('%.3f', $income - $expenses) . '$.'.PHP_EOL;
    } else {
        echo 'We’ve got to sell more tickets! We’ve lost ' . sprintf('%.3f', $income - $expenses) . '$.'.PHP_EOL;
    }
}

echo 'Overall profit -> ' . sprintf('%.3f', $overallProfit) . '$.'.PHP_EOL;
echo 'Average profit -> ' . sprintf('%.3f', $overallProfit / $n) . '$.'.PHP_EOL;
