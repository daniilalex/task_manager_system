<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

$mysql = new mysqli();

$mysql = mysqli_connect($servername, $username, $password, $dbname);
mysqli_select_db($mysql, $dbname);

$sqlAdmin = "INSERT INTO `manager` (`id`, `first_name`, `last_name`, `email`, `password`)
VALUES (1, 'Tom', 'Green', 'manager@user.com', 'cao123')";

$sqlEmployee = "INSERT INTO `employees` (`id`, `first_name`, `last_name`, `multiply_tasks`)
VALUES (1, 'Nina', 'Kratzer', 'on'),
       (2, 'Bob', 'Dylan', ''),
       (3, 'Gregor', 'Jozef', 'on'),
       (4, 'Nick', 'Warren', ''),
       (5, 'Anna', 'Brandon', 'on'),
       (6, 'Steve', 'Johnson', 'on'),
       (7, 'Margarite', 'Teacher', ''),
       (8, 'Maria', 'Gonzales', ''),
       (9, 'Amanda', 'Taylor', 'on'),
       (10, 'Tom', 'Green Jr.', ''),
       (11, 'Ozzy', 'Bold', 'on'),
       (12, 'Christopher', 'Lambert', ''),
       (13, 'Nicolas', 'Turret', '')";


$sqlTasks = "INSERT INTO `tasks` (`id`, `title`, `created_at`, `status`, `completed_at`)
VALUES (1, 'Data entry', '2022-06-19 20:32:08', 0, '2022-06-27 15:08:35'),
       (2, 'Virtual meeting', '2022-06-19 20:32:21', 0, '2022-06-27 15:08:35'),
       (3, 'Filing', '2022-06-19 20:32:33', 0, '2022-06-27 15:08:36'),
       (4, 'Communications', '2022-06-19 20:32:49', 0, '2022-06-27 15:08:36'),
       (5, 'Get a drink', '2022-06-19 20:34:03', 0, '2022-06-27 15:08:37'),
       (6, 'Make a code debugging', '2022-06-19 20:34:49', 0, '2022-06-27 15:08:37'),
       (7, 'Create new form for visitors', '2022-06-19 20:35:11', 0, '2022-06-27 15:08:38'),
       (8, 'Create a new modal for tasks', '2022-06-19 20:35:48', 0, '2022-06-27 15:08:38'),
       (9, 'Check profit sum', '2022-06-27 11:22:35', 0, '2022-06-27 20:04:46'),
       (10, 'Collect money for the b-day', '2022-06-27 12:18:18', 0, '2022-06-27 20:04:44'),
       (11, 'Make a presentation', '2022-06-27 17:05:41', 1, '2022-06-27 20:05:51'),
       (12, 'Make excel table', '2022-06-27 17:07:52', 1, '2022-06-27 20:08:06')";


if ($mysql->query($sqlEmployee) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlEmployee . "<br>" . $mysql->error;
}
if ($mysql->query($sqlTasks) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlTasks . "<br>" . $mysql->error;
}
if ($mysql->query($sqlAdmin) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlAdmin . "<br>" . $mysql->error;
}

$mysql->close();
?>
