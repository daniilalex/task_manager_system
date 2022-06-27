<?php
include '../includes/bootstrap.php';

use exam\Task;

require '../Classes/Task.php';

$repo = new Task();
$assignments = $repo->getValuesToArchive();

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
                    <a href="main.php" class="btn btn-light">Go back</a>
                </div>
                <div class="link-a">
                    <a href="get_archive.php" class="btn btn-light">Download Archive</a>
                </div>
            </div>

            <div class="table table-hover table-bordered border-primary">
                <table class="table table-sm">
                    <tr>
                        <th>Title</th>
                        <th>Employees</th>
                        <th>Created at</th>
                        <th>Completed at</th>

                    </tr>

                    <? foreach ($assignments as $i) {
                        ?>
                        <tr>
                            <td><?= $i['title'] ?></td>
                            <td><?= $i['all_employees'] ?></td>
                            <td><?= $i['created_at'] ?></td>
                            <td><?= $i['completed_at'] ?></td>
                        </tr>
                    <? } ?>
                </table>
            </div>
        </div>
    </div>

<? include '../includes/footer.php';
