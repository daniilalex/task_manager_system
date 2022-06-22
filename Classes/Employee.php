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

    /* -------------------- Get employees ----------------------------------- */
    public function getEmployees(): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.employers");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);

    }


    /* -------------------- Get Employees task by ID ----------------------------------- */
    public function getEmployeesTask($employeeId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.employers
   e LEFT JOIN exam_2022.tasks2employees t2e on t2e.employers_id= e.id  WHERE t2e.tasks_id ='$employeeId'");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }


    /* -------------------- Add Employees to the task ----------------------------------- */
    public function addEmployeesToTask($employeeId, $taskId): bool|string
    {
        $employee = $this->getEmployeesTask($employeeId);
        var_dump($employee);

        if (count($employee) > 3) {
            echo 'Task can not have more than three employees';
        } else {
            $sql = "INSERT INTO exam_2022.tasks2employees  (employers_id, tasks_id) VALUES ('$employeeId', '$taskId')";
            mysqli_query($this->mysql, $sql);
            echo 'Employees successfully added';
        }
        return true;
    }
}