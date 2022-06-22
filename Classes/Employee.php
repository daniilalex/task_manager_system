<?php

namespace exam\Model;

use exam\Repository;

//require '../Classes/Repository.php';

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

    /* -------------------- Get employees ----------------------------------- */
    public function getEmployees(): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.employers");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);

    }

    public function getOneEmployee($employeeId)
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks2employees WHERE employers_id = '$employeeId'");
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

    public function getEmployeeBusy($taskId, $employeeId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks2employees
t2e LEFT JOIN exam_2022.employers e on e.id = t2e.employers_id
LEFT JOIN exam_2022.tasks t on t.id = t2e.tasks_id
WHERE tasks_id = $taskId and employers_id = $employeeId
");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }
}