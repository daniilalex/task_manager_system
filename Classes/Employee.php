<?php

namespace exam;


//require '../Classes/Repository.php';

class Employee extends Repository
{

    /* -------------------- Get employees ----------------------------------- */
    public function getEmployees(): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM employees");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);

    }

    /* -------------------- Get Employees task by ID ----------------------------------- */
    public function getTaskEmployees($taskId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM tasks2employees
    WHERE tasks_id ='$taskId'");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    public function getEmployeeOnTask($employeeId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM tasks2employees
    WHERE employee_id ='$employeeId'");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    public function getEmployeeMultiTask($employeeId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM tasks2employees t2e 
    LEFT JOIN employees e on e.id = t2e.employee_id
    WHERE e.multiply_tasks = 'on'
    AND employee_id = $employeeId");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }


    /* -------------------- Add Employees to the task ----------------------------------- */
    public function addEmployeesToTask($employeeId, $taskId, $date): bool|string
    {
        $sql = "INSERT INTO tasks2employees  (employee_id, tasks_id, created_at) VALUES ('$employeeId', '$taskId', '$date')";
        mysqli_query($this->mysql, $sql);
        echo 'Employees successfully added';

        return true;
    }


}