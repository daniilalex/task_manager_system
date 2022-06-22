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
}