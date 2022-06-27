<?php
include '../includes/bootstrap.php';

use exam\Task;

require '../Classes/Task.php';

$objectAdmin = new Task();

$action = $_GET['action'] ?? null;
if ($action === 'complete') {
    $date = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $complete = $objectAdmin->completed($id, $date);
} else if ($action === 'delete') {
    $date = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $delete = $objectAdmin->deleted($id, $date);
}

$assignments = $objectAdmin->displayTask();

?>

    <div class="container">
        <div class="content">
            <div class="links" style="border: 1px solid black">
                <div class="link-a">
                    <a href="assignments.php" class="btn btn-light">Assignments</a>
                </div>
                <div class="link-a">
                    <a href="archive.php" class="btn btn-light">Archive</a>
                </div>
                <div class="link-a">
                    <a href="main.php" class="btn btn-light">Go back</a>
                </div>
            </div>
            <div class="table table-bordered border-primary table-hover">
                <div class="links">
                    <div class="link-a">
                        <a href="create_employee.php" class="btn btn-light">Add Employee</a>
                    </div>
                    <div class="link-a">
                        <a href="task_to_employee.php" class="btn btn-light">Give a task</a>
                    </div>
                </div>
                <table>
                    <thead class="table-light" style="padding: 5px">
                    <tr>
                        <th>Title</th>
                        <th>Employees</th>
                        <th>Created At</th>
                        <th style="padding-left: 18px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <? foreach ($assignments

                    as $i) {
                    ?>
                    <tr>
                        <td style="padding: 5px"><?= $i['title'] ?></td>
                        <td><?= $i['all_employees'] ?></td>
                        <td><?= $i['created_at'] ?></td>

                        <td><a class="btn btn-outline-primary btn-sm"
                               style="--bs-btn-padding-y: 4px; --bs-btn-padding-x: 4px; --bs-btn-font-size: 8px; width: 50px"
                               href="assignments.php?action=complete&id=<?= $i['id'] ?>">Complete</a>
                        </td>


                        <td><a class="btn btn-outline-danger btn-sm "
                               style="--bs-btn-padding-y: 4px; --bs-btn-padding-x: 4px; --bs-btn-font-size: 8px; width: 50px; margin-right: 5px"

                               href="assignments.php?action=delete&id=<?= $i['id'] ?>">Delete</a>

                        </td>
                        <? } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

<? include '../includes/footer.php';

