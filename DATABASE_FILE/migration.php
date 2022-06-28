<?php
$mysql = mysqli_connect('localhost', 'root', '', 'Myexam');

mysqli_query($mysql, "DROP TABLE IF EXISTS exam_2022.employees");
mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `employees` (
`id` int(11) NOT NULL,
`first_name` varchar(25) NOT NULL,
`last_name` varchar(25) NOT NULL,
`multiply_tasks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");


//-- Table structure for table `manager`
//--
mysqli_query($mysql, "DROP TABLE IF EXISTS exam_2022.manager");
mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `manager` (
`id` int(11) NOT NULL,
`first_name` varchar(25) DEFAULT NULL,
`last_name` varchar(25) DEFAULT NULL,
`email` varchar(50) DEFAULT NULL,
`password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");


////-- Table structure for table `tasks`

mysqli_query($mysql, "DROP TABLE IF EXISTS exam_2022.tasks");
mysqli_query($mysql, "CREATE TABLE `tasks` (
    `id` int(11)  NOT NULL,
    `title` varchar(225) NOT NULL,
    `created_at`timestamp NOT NULL DEFAULT current_timestamp(),
    `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = in process,\r\n1 = completed,\r\n2 = deleted',
    `completed_at` datetime DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4");


mysqli_query($mysql, "DROP TABLE IF EXISTS exam_2022.tasks2employees");
mysqli_query($mysql, "CREATE TABLE `tasks2employees` (
`tasks_id` int(11) UNSIGNED NOT NULL,
`employee_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");


mysqli_query($mysql, "ALTER TABLE exam_2022.employees
ADD PRIMARY KEY (`id`)");

mysqli_query($mysql, "ALTER TABLE exam_2022.manager
ADD PRIMARY KEY  (`id`)");

mysqli_query($mysql, "ALTER TABLE exam_2022.tasks
ADD PRIMARY KEY  (`id`)");

mysqli_query($mysql, "ALTER TABLE exam_2022.tasks2employees
ADD PRIMARY KEY (`tasks_id`,`employee_id`)");

mysqli_query($mysql, "ALTER TABLE exam_2022.employees
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33");

mysqli_query($mysql, "ALTER TABLE exam_2022.manager
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");

mysqli_query($mysql, "ALTER TABLE exam_2022.tasks
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36");


