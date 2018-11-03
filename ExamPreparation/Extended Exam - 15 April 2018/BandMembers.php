<?php

$members = intval(readline());
$vocalist = 1;
$guitarists = floor($members/3);
$drummers = $members - $vocalist - $guitarists;
$guitarPrice = floatval(readline());
$drumPrice = $guitarPrice + ($guitarPrice * 0.5);
$microphonePrice = ($drummers * $drumPrice) - ($guitarists * $guitarPrice);
$totalPrice = $guitarPrice*$guitarists + $drumPrice*$drummers + $microphonePrice*$vocalist;
$rentPerMonth = $totalPrice / $members;
$rentPerYear = $rentPerMonth * 12;

echo 'Total cost: '.sprintf('%.2f', $totalPrice + $rentPerYear).'lv.';
