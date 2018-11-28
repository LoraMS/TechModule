<?php
class Car
{
    private $model;
    private $engine;
    private $cargo;

    public function __construct(string $model, Engine $engine, Cargo $cargo)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
    }

    public function __toString()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }
}

class Engine
{
    private $speed;
    private $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }
}

class Cargo
{
    private $weight;
    private $type;

    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}

$n = intval(readline());
$cars = [];
for($i = 0; $i < $n; $i++){
    $line = explode(' ', readline());
    $model = $line[0];
    $speed = intval($line[1]);
    $power = intval($line[2]);
    $weight = intval($line[3]);
    $type = $line[4];

    $engine = new Engine($speed, $power);
    $cargo = new Cargo($weight, $type);
    $cars[] = new Car($model, $engine, $cargo);
}

$command = readline();
$filterCars = [];
if($command === 'fragile'){
    $filterCars = array_filter($cars, function($c){
        return $c->getCargo()->getType() === 'fragile' && $c->getCargo()->getWeight() < 1000;
    });
} elseif($command === 'flamable'){
    $filterCars = array_filter($cars, function($c){
        return $c->getCargo()->getType() === 'flamable' && $c->getEngine()->getPower() > 250;
    });
}

foreach ($filterCars as $car){
    echo $car.PHP_EOL;
}