<?
include '../includes/bootstrap.php';

use exam\Task;

require '../Classes/Task.php';

$obj_admin = new Task();


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $surname = $_POST['lastname'];
    $multiTask = $_POST['multi_task'];
    $errors = [];
    if ($name === '' && $surname === '') {
        $errors[] = '<p style="color: red">The fields are empty</p>';
    }

    if (empty($errors)) {
        $obj_admin->addEmployee($name, $surname, $multiTask);
        // header('Location: main.php');
    }

} ?>

    <div class="container">
        <div class="content">
            <h2 class="h-index">New employee</h2>
            <div class="links">
                <div class="link-a">
                    <a href="assignments.php" class="btn btn-light">Assignments</a>
                </div>
                <div class="link-a">
                    <a href="archive.php" class="btn btn-light">Archive</a>
                </div>
            </div>
            <form action="create_employee.php" method="post">

                <div class="row g-3 align-items-center">

                    <input type="text" class="form-control" name="name" placeholder="First name">

                    <input type="text" class="form-control" name="lastname" placeholder="Last name">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="multi_task">
                    <label class="form-check-label" for="multi_task">
                        Can
                        work on multiple assignments at once
                    </label>
                </div>
                <br>

                <input type="submit" class="btn btn-primary" value="Add employer">

            </form>
            <? if (isset($errors)) {
                foreach ($errors as $error) { ?>

                    <ul>
                        <? echo $error ?>
                    </ul>

                <? }
            } ?>
            <a href="main.php" class="btn btn-light">Go back</a>
        </div>
    </div>

<? include '../includes/footer.php';


