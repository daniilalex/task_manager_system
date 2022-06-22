<?php

namespace exam;

class Employee extends Repository
{
    public function addEmployee($name, $surname, $multiTask)
    {
        $firstName = $this->testFormInputData($name);
        $lastName = $this->testFormInputData($surname);
        $sql = "INSERT INTO exam_2022.employers (first_name,last_name, multiply_tasks) VALUES ('$firstName', '$lastName', '$multiTask')";
        mysqli_query($this->mysql, $sql);
        header('Location: ../../main.php');
    }
}