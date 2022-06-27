<?

require '../includes/bootstrap.php';

?>

<div class="container">
    <div class="content">
        <h3 class="h-index">Your Work Area</h3>
        <div class="links">
            <div class="link-a">
                <a href="create_employee.php" class="btn btn-light">Create Employee</a>
            </div>
            <div class="link-a">
                <a href="create_task.php" class="btn btn-light">Create Task</a>
            </div>
            <div class="link-a">
                <a href="task_to_employee.php" class="btn btn-light">Give Task</a>
            </div>
            <div class="link-a">
                <a href="assignments.php" class="btn btn-light">Assignments</a>
            </div>
            <div class="link-a">
                <a href="archive.php" class="btn btn-light">Archive</a>
            </div>
            <div class="link-a">
                <a href="logout.php" class="btn btn-light">Log Out</a>
            </div>
        </div>
    </div>
</div>

<?php


include '../includes/footer.php'
?>




