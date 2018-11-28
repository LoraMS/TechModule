<?php

class Employee
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $salary;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }
}

class Department
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $employees = [];

    /**
     * Department constructor.
     * @param string $name
     * @param array $employees
     */
    public function __construct(string $name, array $employees)
    {
        $this->name = $name;
        $this->employees = $employees;
    }

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getTotalSalary()
    {
        $sum = 0;
        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary();
        }
        return $sum;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }
}

$n = intval(readline());
$departments = [];
$employees = [];
for ($i = 0; $i < $n; $i++) {
    list($name, $salary, $departmentName) = explode(' ', readline());
    $employee = new Employee($name, $salary);

    $filterObj = array_filter($departments, function ($d) use ($departmentName) {
        return $d->getName() === $departmentName;
    });
    if (count($filterObj) < 1) {
        $department = new Department($departmentName, $employees);
        $department->addEmployee($employee);
        $departments[] = $department;
    } else {
        foreach ($departments as $d) {
            if ($d->getName() === $departmentName) {
                $d->addEmployee($employee);
                break;
            }
        }
    }
}

usort($departments, function ($d1, $d2) {
    return $d2->getTotalSalary() <=> $d1->getTotalSalary();
});

echo "Highest Average Salary: {$departments[0]->getName()}".PHP_EOL;
$employeesHighestSalary = $departments[0]->getEmployees();
usort($employeesHighestSalary , function ($e1, $e2) {
    return $e2->getSalary() <=> $e1->getSalary();
});

foreach($employeesHighestSalary as $employee){
    echo "{$employee->getName()} ".sprintf('%0.2f', $employee->getSalary()).PHP_EOL;
}