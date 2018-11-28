<?php
class Family
{
    private $people = [];

    public function __construct(array $people)
    {
        $this->people = $people;
    }

    public function addMember($member){
        $this->people[] = $member;
    }

    public function getOldestMember(){
        usort($this->people, function($p1, $p2){
            return $p2->getAge() <=> $p1->getAge();
        });

        return $this->people[0];
    }
}

class Person
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
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
    public function getAge()
    {
        return $this->age;
    }
}

$n = intval(readline());
$people = [];
$family = new Family($people);
for($i = 0; $i < $n; $i++){
    $info = explode(' ', readline());
    $name = $info[0];
    $age = $info[1];
    $person = new Person($name, $age);
    $family->addMember($person);
}

$oldestPerson = $family->getOldestMember();
echo "{$oldestPerson->getName()} {$oldestPerson->getAge()}";