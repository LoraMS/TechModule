<?php

class Student
{
    private $name;
    private $grades = [];
    private $averageGrade;

    public function __construct($name, $grades)
    {
        $this->name = $name;
        $this->grades = $grades;
        $this->averageGrade = array_sum($grades)/ count($grades);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getGrades(): array
    {
        return $this->grades;
    }

    /**
     * @return mixed
     */
    public function getAverageGrade()
    {
        return $this->averageGrade;
    }
}

$n = intval(readline());
$students = [];
while($n > 0){
    $info = explode(' ', readline());
    $name = array_shift($info);
    $grades = array_map('floatval', $info);
    $students[] = new Student($name, $grades);
    $n--;
}

usort($students, function (Student $student1, Student $student2){
    $name1 = $student1->getName();
    $name2 = $student2->getName();
    if($name1 === $name2){
        return $student2->getAverageGrade() <=> $student1->getAverageGrade();
    }
    return $name1 <=> $name2;
});

foreach ($students as $student){
    if($student->getAverageGrade() >= 5){
        echo "{$student->getName()} -> ".sprintf('%0.2f', $student->getAverageGrade()).PHP_EOL;
    }

}