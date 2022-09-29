<?

use exam\Repository;

require '../Classes/Repository.php';

$obj_admin = new Repository();
// $obj_admin->adminLogout();
header('Location: ../index.php');
