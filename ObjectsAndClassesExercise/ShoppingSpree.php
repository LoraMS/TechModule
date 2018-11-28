<?php

class Product
{
    private $name;
    private $cost;

    public function __construct(string $name, float $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }
}

class Person
{
    private $name;
    private $money;
    private $products = [];

    public function __construct(string $name, float $money, $products)
    {
        $this->name = $name;
        $this->money = $money;
        $this->products = $products;
    }

    public function buyProduct(Product $product)
    {
        if ($this->money >= $product->getCost()) {
            $this->products[] = $product->getName();
            $this->money -= $product->getCost();
            echo "{$this->getName()} bought {$product->getName()}".PHP_EOL;
        } else {
            echo "{$this->getName()} can't afford {$product->getName()}".PHP_EOL;
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}

$peopleInput = explode(';', readline());
$productsInput = explode(';', readline());
$people = [];
$products = [];
foreach ($peopleInput as $info) {
    list($name, $money) = explode('=', $info);
    $people[] = new Person($name, $money, $products);
}

foreach ($productsInput as $info) {
    list($name, $cost) = explode('=', $info);
    $products[] = new Product($name, $cost);
}

while (true) {
    $command = readline();
    if ($command === 'END') {
        break;
    }
    list($personName, $productName) = explode(' ', $command);
//    $currentPerson = array_filter($people, function ($p) use ($personName) {
//        return $p->getName() === $personName;
//    });
//    $currentProduct = array_filter($products, function ($p) use ($productName) {
//        return $p->getName() === $productName;
//    });
//
//    $currentPerson->buyProduct($currentProduct);

    $currentPerson = null;
    $currentProduct = null;
     foreach($people as $p) {
        if($p->getName() === $personName){
            $currentPerson = $p;
            break;
        }
    }

    foreach($products as $p) {
        if($p->getName() === $productName){
            $currentProduct = $p;
            break;
        }
    }

    $currentPerson->buyProduct($currentProduct);
}

foreach ($people as $person) {
    if (count($person->getProducts()) > 0) {
        echo "{$person->getName()} - ".implode(", ", $person->getProducts()).PHP_EOL;
    } else {
        echo "{$person->getName()} - Nothing bought".PHP_EOL;
    }
}