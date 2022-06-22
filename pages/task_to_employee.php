<?
include '../includes/bootstrap.php';

use exam\Task;
use exam\Employee;

require '../Classes/Task.php';
require '../Classes/Employee.php';

$eRepo = new Employee();
$repo = new Task();
$employees = $eRepo->getEmployees();
$tasks = $repo->getTasks();
//var_dump($employees, $tasks);

if (isset($_POST['employees'])) {
    $employee = $_POST['employees'];
    $task = $_POST['tasks'];

    foreach ($employee as $num) {
        $eRepo->addEmployeesToTask($num, $task);
    }
    header("Refresh:10");

}

?>

    <div class="container">
        <div class="content">
            <h1 class="h-index">Add task to employees</h1>
            <form class="form" action="add_task.php" method="post">

                <div class="row g-3 align-items-center">


                    <select class="form-select" name="employees[]" multiple="multiple">
                        <option>Choose Employee</option>
                        <? foreach ($employees as $employee) {
                            ?>
                            <option value="<?= $employee['id'] ?>"><?= $employee['first_name'] ?> <?= $employee['last_name'] ?></option>
                        <? } ?>

                    </select>
                    <select class="form-select" name="tasks">
                        <option>Choose tasks</option>
                        <? foreach ($tasks as $task) {
                            ?>
                            <option value="<?= $task['id'] ?>"><?= $task['title'] ?></option>
                        <? } ?>

                    </select>
                </div>

                <br>
                <input type="submit" class="btn btn-primary" value="Create task">
                <? if (isset($errors)) {
                    foreach ($errors as $error) { ?>
                        <ul>
                            <? echo $error ?>
                        </ul>
                    <? }
                } ?>

            </form>
            <a href="main.php" class="btn btn-light">Go back</a>
        </div>
    </div>

<? include '../includes/footer.php';


