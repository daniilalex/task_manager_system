<?php

namespace exam;

require '../Classes/Repository.php';

class Task extends Repository
{


    /* -------------------- Get tasks ----------------------------------- */

    public function getTasks(): array 
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM tasks");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    /* -------------------- Get task by ID ----------------------------------- */
    public function getTaskById($taskId): array 
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM tasks2employees
    WHERE tasks_id = '$taskId'");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }


    /* -------------------- Save tasks ----------------------------------- */
    public function storeTask($title)
    {
        $task_title = $this->testFormInputData($title);
        $tasks = "INSERT INTO tasks (title, created_at, status) VALUES ('$task_title', DEFAULT, DEFAULT)";
        mysqli_query($this->mysql, $tasks);

    }

    /* -------------------- Complete task ----------------------------------- */
    public function completed($taskId, $date): bool
    {
        $sql = "UPDATE tasks SET tasks.status = 1, tasks.completed_at = '$date'
WHERE id = $taskId";
        mysqli_query($this->mysql, $sql);
        return true;
    }

    /* -------------------- Delete task ----------------------------------- */
    public function deleted($taskId, $date): bool
    {
        $sql = "UPDATE tasks SET tasks.status = 2, tasks.completed_at = '$date'
WHERE id = $taskId";
        mysqli_query($this->mysql, $sql);
        return true;
    }

    /* -------------------- Get completed values ----------------------------------- */
    public function getValuesToArchive(): array
    {
        $sql = mysqli_query($this->mysql, "SELECT t.*, GROUP_CONCAT(e.first_name, ' ', e.last_name) AS all_employees, created_at
        FROM tasks2employees t2e
        LEFT JOIN employees e on e.id = t2e.employee_id 
        LEFT JOIN tasks t on t.id = t2e.tasks_id
        WHERE status = 1
        GROUP BY t.id");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }
/* ------------------------- add employee ----------------------------------- */
    public function addEmployee($name, $surname, $multiTask)
    {
        $firstName = $this->testFormInputData($name);
        $lastName = $this->testFormInputData($surname);
        $sql = "INSERT INTO employees (first_name,last_name, multiply_tasks) VALUES ('$firstName', '$lastName', '$multiTask')";
        mysqli_query($this->mysql, $sql);
        
    }

    /* -------------------- Get assignments values ----------------------------------- */
    public function displayTask(): array
    {
        $sql = mysqli_query($this->mysql, "SELECT t.*,GROUP_CONCAT(e.first_name, ' ', e.last_name) as all_employees, created_at
        FROM tasks2employees t2e
        LEFT JOIN employees e on t2e.employee_id = e.id
        LEFT JOIN tasks t on t2e.tasks_id = t.id
        GROUP BY created_at");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

}