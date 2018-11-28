<?php

$songsNumber = intval(readline());

class Song
{
    private $type;
    private $name;
    private $time;

    public function __construct($type, $name, $time)
    {
        $this->type = $type;
        $this->name = $name;
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}

$songs = [];
for ($i = 0; $i < $songsNumber; $i++) {
    $line = explode('_', readline());
    $type = $line[0];
    $name = $line[1];
    $time = $line[2];
    $song = new Song($type, $name, $time);
    $songs[] = $song;
}

$filterType = readline();
if ($filterType === 'all') {
    foreach ($songs as $song) {
        echo $song->getName() . PHP_EOL;
    }
} else {
    foreach ($songs as $song) {
        if ($song->getType() === $filterType) {
            echo $song->getName() . PHP_EOL;
        }
    }
}


