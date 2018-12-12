<?php

class Dwarf
{
    private $name;
    private $hatColor;
    private $physics;
    private $count;

    /**
     * Dwarf constructor.
     * @param $name
     * @param $hatColor
     * @param $physics
     * @param $count
     */
    public function __construct(string $name, string $hatColor, int $physics, int $count = 0)
    {
        $this->name = $name;
        $this->hatColor = $hatColor;
        $this->physics = $physics;
        $this->count = 0;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getHatColor(): string
    {
        return $this->hatColor;
    }

    /**
     * @param string $hatColor
     */
    public function setHatColor(string $hatColor): void
    {
        $this->hatColor = $hatColor;
    }

    /**
     * @return int
     */
    public function getPhysics(): int
    {
        return $this->physics;
    }

    /**
     * @param int $physics
     */
    public function setPhysics(int $physics): void
    {
        $this->physics = $physics;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }

}

$dwarfs = [];
while (true) {
    $input = readline();
    if ($input === 'Once upon a time') {
        break;
    }
    $line = explode(' <:> ', $input);
    $name = $line[0];
    $hatColor = $line[1];
    $physics = intval($line[2]);

    if (count(filterByName($dwarfs, $name)) < 1) {
        $dwarf = new Dwarf($name, $hatColor, $physics);
        $dwarfs[] = $dwarf;
    } elseif (count(filterByHatColor($dwarfs, $hatColor)) < 1) {
        $dwarf = new Dwarf($name, $hatColor, $physics);
        $dwarfs[] = $dwarf;
    } else {
        if (count(filterByNameAndHatColor($dwarfs, $hatColor, $name)) > 0) {
            foreach ($dwarfs as $d) {
                if ($d->getName() === $name && $d->getHatColor() === $hatColor && $d->getPhysics() < $physics) {
                    $d->setPhysics($physics);
                }
            }
        }
    }
}

$colors = [];
$dwarfsExtended = [];
foreach ($dwarfs as $dwarf) {
    $colors[$dwarf->getHatColor()][] = $dwarf;
}

foreach ($colors as $color=>$groupDwarfs) {
    $count = count($groupDwarfs);
    foreach ($groupDwarfs as $gd) {
        $gd->setCount($count);
    }
}

usort($dwarfs, function ($d1, $d2) {
    if ($d1->getPhysics() === $d2->getPhysics()) {
        return $d1->getCount() < $d2->getCount();
    }
    return $d2->getPhysics() <=> $d1->getPhysics();
});

foreach ($dwarfs as $d) {
    echo "({$d->getHatColor()}) {$d->getName()} <-> {$d->getPhysics()}".PHP_EOL;
}

function filterByName($dwarfs, $name){
    return array_filter($dwarfs, function ($d) use ($name) {
        return $d->getName() === $name;
    });
}

function filterByHatColor($dwarfs, $hatColor){
    return array_filter($dwarfs, function ($d) use ($hatColor) {
        return $d->getHatColor() === $hatColor;
    });
}

function filterByNameAndHatColor($dwarfs, $hatColor, $name){
    return array_filter($dwarfs, function ($d) use ($hatColor, $name) {
        return $d->getHatColor() === $hatColor && $d->getName() === $name;
    });
}