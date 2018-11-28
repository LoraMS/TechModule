<?php


class Student{
    private $firstName ;
    private $lastName;
    private $age;
    private $hometown;

    public function __construct($firstName, $lastName, $age, $hometown)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->hometown = $hometown;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getHometown()
    {
        return $this->hometown;
    }

}

$students = [];
while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }
    $currentStudent = explode(' ', $input);
    $firstName = $currentStudent[0];
    $lastName = $currentStudent[1];
    $age = $currentStudent[2];
    $hometown = $currentStudent[3];
    $students[] = new Student($firstName, $lastName, $age, $hometown);
}
$filterTown = readline();

foreach ($students as $student){
    if($filterTown === $student->getHometown()){
        echo "{$student->getFirstName()} {$student->getLastName()} is {$student->getAge()} years old.\n";
    }
}
