<?php
class Car
{
    private $model;
    private $fuelAmount;
    private $fuelConsumption;
    private $traveledDistance;

    public function __construct($model, $fuelAmount, $fuelConsumption, $traveledDistance = 0)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelConsumption = $fuelConsumption;
        $this->traveledDistance = $traveledDistance;
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
    public function getFuelAmount()
    {
        return $this->fuelAmount;
    }

    /**
     * @return mixed
     */
    public function getFuelConsumption()
    {
        return $this->fuelConsumption;
    }

    /**
     * @return mixed
     */
    public function getTraveledDistance()
    {
        return $this->traveledDistance;
    }

    public function drive($distance){
        $fuelNeeded = $distance * $this->fuelConsumption;
        if($this->fuelAmount >= $fuelNeeded){
            $this->fuelAmount -= $fuelNeeded;
            $this->traveledDistance += $distance;
        } else {
            echo 'Insufficient fuel for the drive'.PHP_EOL;
        }
    }

    public function __toString()
    {
        $fuelRest = number_format($this->fuelAmount, 2, '.', '');
        return "{$this->model} $fuelRest {$this->traveledDistance}";
    }
}

$n = intval(readline());
$cars = [];
for($i = 0; $i < $n; $i++){
    $line = explode(' ', readline());
    $model = $line[0];
    $fuelAmount = $line[1];
    $fuelConsumption = $line[2];
    $cars[] = new Car($model, $fuelAmount, $fuelConsumption);
}

while(true){
    $input = readline();
    if($input === 'End'){
        break;
    }
    $line = explode(' ', $input);
    $command = $line[0];
    $carModel = $line[1];
    $amountOfKm = $line[2];
    foreach ($cars as $car){
        if($car->getModel() === $carModel){
            $car->drive($amountOfKm);
        }
    }
}

foreach ($cars as $car){
    echo $car.PHP_EOL;
}