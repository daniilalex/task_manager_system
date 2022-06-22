<?php

namespace exam;

class Task extends Repository
{
    /* -------------------- Get tasks ----------------------------------- */
    public function getTasks(): array /// posts , articles, tasks
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }

    /* -------------------- Get task by ID ----------------------------------- */
    public function getTaskEmployees($taskId): array /// posts , articles, tasks
    {
        $sql = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks
    t LEFT JOIN exam_2022.tasks2employees t2e on t.id = t2e.tasks_id  WHERE id = '$taskId'");
        return mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }


    /* -------------------- Save tasks ----------------------------------- */
    public function storeTask($title)
    {
        $task_title = $this->testFormInputData($title);
        $tasks = "INSERT INTO exam_2022.tasks (title, created_at, status) VALUES ('$task_title', DEFAULT, DEFAULT)";
        mysqli_query($this->mysql, $tasks);

    }

    /* -------------------- Add task to employees ----------------------------------- */
    public function addTasks2Employee($employeeId, $taskId): bool|string
    {
        $task = $this->getTaskEmployees($taskId);
        if (count($task) > 3) {
            echo 'Employee can not have more than three task';
        } else {
            $sql = "INSERT INTO exam_2022.tasks2employees  (employers_id, tasks_id) VALUES ('$employeeId', '$taskId')";
            mysqli_query($this->mysql, $sql);
        }
        return true;
    }

    public function getAssignments(): array
    {
        $assignments = mysqli_query($this->mysql, "SELECT * FROM exam_2022.tasks2employees
    LEFT JOIN exam_2022.employers e on e.id = tasks2employees.employers_id
    LEFT JOIN exam_2022.tasks t on t.id = tasks2employees.tasks_id");
        return mysqli_fetch_all($assignments, MYSQLI_ASSOC);
    }
}