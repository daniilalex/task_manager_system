<?php
include '../includes/bootstrap.php';

use exam\Task;

require '../Classes/Task.php';

$repo = new Task();
$assignments = $repo->getValuesToArchive();


if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
$total_records_per_page = 10;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query($repo->mysql, "SELECT COUNT(*) AS total_records
        FROM exam_2022.tasks2employees");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];

$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;
$results = mysqli_query(
    $repo->mysql,
    "SELECT t.*, GROUP_CONCAT(e.first_name, ' ', e.last_name) AS all_employees, created_at
        FROM exam_2022.tasks2employees t2e
        LEFT JOIN exam_2022.employees e on e.id = t2e.employee_id 
        LEFT JOIN exam_2022.tasks t on t.id = t2e.tasks_id
        WHERE status = '1'
        GROUP BY t.id LIMIT $offset, $total_records_per_page"
);
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

                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['all_employees'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['completed_at'] ?></td>
                        </tr>
                    <? } ?>
                </table>
            </div>
            <nav>
                <ul class="pagination justify-content-center">
                    <?php
                    if ($total_no_of_pages <= 10) {
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

<? include '../includes/footer.php';
