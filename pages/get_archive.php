<?php
include '../Classes/Repository.php';


use exam\Repository;

$repo = new Repository();

$sql = mysqli_query($repo->mysql, "SELECT title, GROUP_CONCAT(e.first_name, ' ', e.last_name) AS all_employees, created_at, completed_at
        FROM exam_2022.tasks2employees t2e
        LEFT JOIN exam_2022.employees e on e.id = t2e.employee_id 
        LEFT JOIN exam_2022.tasks t on t.id = t2e.tasks_id
        WHERE status = '1'
        GROUP BY t.id");
mysqli_fetch_all($sql, MYSQLI_ASSOC);

$csv = $repo->put2Achieve($sql, '/file.csv');

$files = (array)$sql;
$result = $repo->createCSV($files);


