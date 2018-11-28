<?php

class Person
{
    private $name;
    private $id;
    private $age;

    public function __construct($name, $id, $age)
    {
        $this->name = $name;
        $this->id = $id;
        $this->age = $age;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }
}

$people = [];
while(true){
    $input = readline();
    if($input === 'End'){
        break;
    }
    $info = explode(' ', $input);
    $name= $info[0];
    $id = $info[1];
    $age = $info[2];
    $person = new Person($name, $id, $age);
    $people[] = $person;
}

usort($people, function(Person $person1, Person $person2){
    return $person1->getAge() <=> $person2->getAge();
});

foreach ($people as $person){
    echo "{$person->getName()} with ID: {$person->getId()} is {$person->getAge()} years old.\n";
}