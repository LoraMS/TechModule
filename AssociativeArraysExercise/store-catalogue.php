<?php

$n = intval(readline());
$products = [];
$catalog = [];
for ($i = 0; $i < $n; $i++) {
    $products[] = readline();
}

//group by first letter
sort($products);
foreach ($products as $product) {
    $firstLetter = substr($product, 0, 1);
    $catalog[$firstLetter][] = $product;
}

foreach ($catalog as $letter => $products) {
    echo $letter.PHP_EOL;
    foreach ($products as $product) {
        $product = preg_replace('/\s:/',':', $product);
        echo '  '.$product.PHP_EOL;
    }
}