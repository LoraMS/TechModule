<?php

class Item {
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

}

class Box{
    private $serialNumber;
    private $item;
    private $quantity;
    private $price;

    public function __construct($serialNumber, Item $item, $quantity, $price)
    {
        $this->serialNumber = $serialNumber;
        $this->item = $item;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function __toString()
    {
        return $this->getSerialNumber().PHP_EOL.
            "-- {$this->getItem()->getName()} - \$".
            sprintf('%0.2f', $this->getItem()->getPrice()).
            ": {$this->getQuantity()}".PHP_EOL.
            '-- $'.sprintf('%0.2f', $this->getPrice());
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
}

$data = [];
while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }

    $line = explode(' ', $input);
    $serialNumber = $line[0];
    $name = $line[1];
    $quantity = $line[2];
    $price = floatval($line[3]);

    $item = new Item($name, $price);
    $box = new Box($serialNumber, $item, $quantity, $item->getPrice() * $quantity);
    $data[] = $box;
}

usort($data, function (Box $box1, Box $box2){
    return $box2->getPrice() <=> $box1->getPrice();
});

foreach ($data as $box){
    echo $box.PHP_EOL;
}
