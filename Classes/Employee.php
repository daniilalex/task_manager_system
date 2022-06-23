<?php

namespace exam\Model;

use exam\Repository;

//require '../Classes/Repository.php';

class Employee extends Repository
{
    /* -------------------- Add Employee to database ----------------------------------- */
    public function addEmployee($name, $surname, $multiTask)
    {
        $firstName = $this->testFormInputData($name);
        $lastName = $this->testFormInputData($surname);
        $sql = "INSERT INTO exam_2022.employers (first_name,last_name, multiply_tasks) VALUES ('$firstName', '$lastName', '$multiTask')";
        mysqli_query($this->mysql, $sql);
        header('Location: ../../main.php');
    }

    /* -------------------- Get employees ----------------------------------- */
    public function getEmployees(): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.employers");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);

    }

    /* -------------------- Get Employees task by ID ----------------------------------- */
    public function getTaskEmployees($taskId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks2employees
    WHERE tasks_id ='$taskId'");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }


    /* -------------------- Add Employees to the task ----------------------------------- */
    public function addEmployeesToTask($employeeId, $taskId): bool|string
    {
        $sql = "INSERT INTO exam_2022.tasks2employees  (employers_id, tasks_id) VALUES ('$employeeId', '$taskId')";
        mysqli_query($this->mysql, $sql);
        echo 'Employees successfully added';

        return true;
    }
}