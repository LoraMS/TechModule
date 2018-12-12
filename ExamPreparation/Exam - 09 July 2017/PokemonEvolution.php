<?php

class Evaluation
{
    private $type;
    private $index;

    /**
     * Evaluation constructor.
     * @param $type
     * @param $index
     */
    public function __construct(string $type, int $index)
    {
        $this->type = $type;
        $this->index = $index;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

}

$pokemons = [];
while (true) {
    $input = readline();
    if ($input === 'wubbalubbadubdub') {
        break;
    }
    if (strpos($input, '->') !== false) {
        $line = explode(' -> ', $input);
        $pokemonName = $line[0];
        $evolutionType = $line[1];
        $evolutionIndex = intval($line[2]);
        $evaluation = new Evaluation($evolutionType, $evolutionIndex);
        $pokemons[$pokemonName][] = $evaluation;
    } else {
        foreach ($pokemons as $pokemonName => $info) {
            if($pokemonName === $input){
                echo '# ' . $pokemonName . PHP_EOL;
                foreach ($info as $object) {
                    echo $object->getType().' <-> ' . $object->getIndex() . PHP_EOL;
                }
            }
        }
    }
}

foreach ($pokemons as $pokemonName=>$info) {
    echo '# ' . $pokemonName . PHP_EOL;
    usort($info, function ($obj1, $obj2){
        return $obj2->getIndex() <=> $obj1->getIndex();
    });
    foreach ($info as $object) {
        echo $object->getType().' <-> ' . $object->getIndex() . PHP_EOL;
    }
}