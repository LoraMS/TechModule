<?php

class Truck
{
    private $brand;
    private $model;
    private $weight;

    public function __construct($brand, $model, $weight)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }
}

class Car
{
    private $brand;
    private $model;
    private $horsePower;

    public function __construct($brand, $model, $horsePower)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->horsePower = $horsePower;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getHorsePower()
    {
        return $this->horsePower;
    }
}

class Catalogue
{
    public $trucks = [];
    public $cars = [];

    public function __construct($trucks, $cars)
    {
        $this->trucks = $trucks;
        $this->cars = $cars;
    }

    /**
     * @return array
     */
    public function getTrucks(): array
    {
        return $this->trucks;
    }

    /**
     * @return array
     */
    public function getCars(): array
    {
        return $this->cars;
    }

}

$trucks = [];
$cars = [];
$catalogue = new Catalogue($trucks, $cars);

while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }
    $line = explode('/', $input);
    $vehicle = $line[0];
    $brand = $line[1];
    $model = $line[2];
    if($vehicle === 'Truck'){
        $weight = $line[3];
        $truck = new Truck($brand, $model, $weight);
        $catalogue->trucks[] = $truck;
    } else {
        $horsePower = $line[3];
        $car = new Car($brand, $model, $horsePower);
        array_push($catalogue->cars, $car);
    }
}

usort($catalogue->cars, function(Car $car1, Car $car2){
    return $car1->getBrand() <=> $car2->getBrand();
});

usort($catalogue->trucks, function(Truck $truck1, Truck $truck2){
    return $truck1->getBrand() <=> $truck2->getBrand();
});

if($catalogue->cars > 0){
    echo 'Cars: '.PHP_EOL;
    foreach ($catalogue->cars as $car){
        echo "{$car->getBrand()}: {$car->getModel()} - {$car->getHorsePower()}hp".PHP_EOL;
    }
}
if($catalogue->trucks > 0){
    echo 'Trucks: '.PHP_EOL;
    foreach ($catalogue->trucks as $truck){
        echo "{$truck->getBrand()}: {$truck->getModel()} - {$truck->getWeight()}kg".PHP_EOL;
    }
}
