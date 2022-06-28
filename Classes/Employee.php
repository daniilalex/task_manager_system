<?php

namespace exam;


//require '../Classes/Repository.php';

class Employee extends Repository
{

    /* -------------------- Get employees ----------------------------------- */
    public function getEmployees(): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.employees");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);

    }

    /* -------------------- Get Employees task by ID ----------------------------------- */
    public function getTaskEmployees($taskId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks2employees
    WHERE tasks_id ='$taskId'");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    /* -------------------- Get Employee with active task ----------------------------------- */
    public function getEmployeeActiveTask($employeeId): array
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks2employees t2e 
    LEFT join exam_2022.tasks t on t2e.tasks_id = t.id
    WHERE employee_id ='$employeeId' AND status=0");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    /* -------------------- Get employee by id ----------------------------------- */
    public function getEmployee($employeeId): bool|array|null
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.employees WHERE id ='$employeeId'");
        return mysqli_fetch_row($sql);
    }


    /* -------------------- Add Employees to the task ----------------------------------- */
    public function addEmployeesToTask($employeeId, $taskId): bool|string
    {
        $sql = "INSERT INTO exam_2022.tasks2employees  (employee_id, tasks_id) VALUES ('$employeeId', '$taskId')";
        mysqli_query($this->mysql, $sql);
        echo 'Employees successfully added';

        return true;
    }
}