<? 

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];
    
    if (empty($email) || empty($password)) {
        $errors[] = '<p style="color: red">There are empty spaces</p>';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = '<p style="color: red">Wrong password</p>';
    }
    if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[] = '<p style="color: red">Must be letters and numbers</p>';
    }
    
    if (empty($errors)) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: /pages/main.php');
    }
}
include 'includes/bootstrap.php';
?>



    <div class="container">
        <div class="content">
            <h2 class="h-log">Employee Task Manager System </h2>
            <form class="form" action="index.php" method="post">

                <div class="row g-3 align-items-center">

                    <input type="email" class="form-control" name="email" placeholder="Email">

                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <br>
                <input type="submit" class="btn btn-primary" value="Log in">
                <? if (isset($errors)) {

                    foreach ($errors as $error) { ?>
                        <div>
                            <?php echo $error ?>
                        </div>
                    <? }
                } ?>
            </form>
        </div>
    </div>

<?php include 'includes/footer.php';

