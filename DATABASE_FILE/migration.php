<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_2022";

//-- Create connection
$mysql = new mysqli();

$mysql = mysqli_connect($servername, $username, $password, $dbname);
mysqli_select_db($mysql, $dbname);

//-- Check connection
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
//-- Table structure for table `employees`

mysqli_query($mysql, "DROP TABLE IF EXISTS employees");
mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `employees` (
`id` int(11) AUTO_INCREMENT primary key NOT NULL,
`first_name` varchar(25) NOT NULL,
`last_name` varchar(25) NOT NULL,
`multiply_tasks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

//-- Table structure for table `manager`

mysqli_query($mysql, "DROP TABLE IF EXISTS manager");
mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `manager` (
`id` int(11) AUTO_INCREMENT primary key NOT NULL,
`first_name` varchar(25) DEFAULT NULL,
`last_name` varchar(25) DEFAULT NULL,
`email` varchar(50) DEFAULT NULL,
`password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

////-- Table structure for table `tasks`

mysqli_query($mysql, "DROP TABLE IF EXISTS tasks");
mysqli_query($mysql, "CREATE TABLE `tasks` (
    `id` int(11)  AUTO_INCREMENT primary key NOT NULL,
    `title` varchar(225) NOT NULL,
    `created_at`timestamp NOT NULL DEFAULT current_timestamp(),
    `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = in process, 1 = completed, 2 = deleted',
    `completed_at` datetime DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4");

//-- Table structure for table `tasks2employees`

mysqli_query($mysql, "DROP TABLE IF EXISTS tasks2employees");
mysqli_query($mysql, "CREATE TABLE `tasks2employees` (
`tasks_id` int(11) UNSIGNED NOT NULL,
`employee_id` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`tasks_id`,`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
