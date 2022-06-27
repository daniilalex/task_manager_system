<?
include '../includes/bootstrap.php';


use exam\Task;
use exam\Employee;

require_once '../Classes/Task.php';
require_once '../Classes/Employee.php';

$objectAdmin = new Employee();
$repo = new Task();

$employees = $objectAdmin->getEmployees();
$tasks = $repo->getTasks();


if (isset($_POST['add'])) {
    $employee = $_POST['employees'];
    $task = $_POST['tasks'];
    $dbEmployees = $objectAdmin->getTaskEmployees($task);
    $errors = [];

    if (count($employee) + count($dbEmployees) > 3) {
        $errors[] = '<p style="color: red">You can not add more than 3 employees to the task</p>';
    } else {
        foreach ($employee as $num) {
            $objectAdmin->addEmployeesToTask($num, $task);
        }
        header("Refresh:10");
    }

}

?>

    <div class="container">
        <div class="content">
            <h2 class="h-index">Add task to employees</h2>
            <div class="links">
                <div class="link-a">
                    <a href="assignments.php" class="btn btn-light">Assignments</a>
                </div>
                <div class="link-a">
                    <a href="archive.php" class="btn btn-light">Archive</a>
                </div>
            </div>
            <form class="form" action="task_to_employee.php" method="post">

                <div class="row g-3 align-items-center">


                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="employees[]"
                            multiple="multiple">
                        <? foreach ($employees as $employee) {
                            ?>
                            <option value="<?= $employee['id'] ?>"><?= $employee['first_name'] ?> <?= $employee['last_name'] ?></option>
                        <? } ?>

                    </select>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tasks">
                        <option>Choose tasks</option>
                        <? foreach ($tasks as $task) {
                            ?>
                            <option value="<?= $task['id'] ?>"><?= $task['title'] ?></option>
                        <? } ?>

                    </select>
                </div>

                <br>
                <input type="submit" name="add" class="btn btn-primary" value="Add">
                <? if (isset($errors)) {
                    foreach ($errors as $error) { ?>
                        <ul>
                            <?= $error ?>
                        </ul>
                    <? }
                } ?>

            </form>
            <a href="main.php" class="btn btn-light">Go back</a>
        </div>
    </div>

<? include '../includes/footer.php';

