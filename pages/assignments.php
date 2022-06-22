<?php
include '../includes/bootstrap.php';

use exam\Task;

require '../Classes/Task.php';

$objectAdmin = new Task();

$action = $_GET['action'] ?? null;
if ($action === 'complete') {
    $id = $_GET['id'];
    $complete = $objectAdmin->completed($id);
} else if ($action === 'delete') {
    $id = $_GET['id'];
    $delete = $objectAdmin->deleted($id);
}
$assignments = $objectAdmin->getAssignments();
//var_dump($assignments);
$result = array();
foreach ($assignments as $element) {
    $result[$element['id']][] = $element;
}
//var_dump($result);

?>

<div class="container">
    <div class="content">
        <div class="links">
            <div class="link-a">
                <a href="assignments.php" class="btn btn-light">Assignments</a>
            </div>
            <div class="link-a">
                <a href="archive.php" class="btn btn-light">Archive</a>
            </div>
            <div class="link-a">
                <a href="main.php" class="btn btn-light">To the main page</a>
            </div>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Employees</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>

                <? foreach ($result as $item) {
                    var_dump($item); ?>

                    <? foreach ($item as $i) {
                        ?>
                        <tr>
                            <td><?= $i['title'] ?></td>
                            <td><?= $i['first_name'] ?><?= $i['last_name'] ?></td>
                            <td><?= $i['created_at'] ?></td>
                            <td><a href="assignments.php?action=complete&id=<?= $i['id'] ?>">Completed</a></td>
                            <td><a href="assignments.php?action=delete&id=<?= $i['id'] ?>">Delete</a></td>
                        </tr>
                    <? }
                } ?>

            </table>
        </div>
    </div>
</div>

