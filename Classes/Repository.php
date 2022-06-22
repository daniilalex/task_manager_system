<?

namespace exam;
//Represents a connection between PHP and a database server.

use mysqli;

class Repository
{
    public mysqli|null|false $mysql;

    public function __construct()
    {
        $this->mysql = mysqli_connect('localhost', 'root', '', 'exam_2022');

        if ($this->mysql->connect_error) {
            echo 'Error number: ' . $this->mysql->connect_errno;
            echo 'Error: ' . $this->mysql->connect_error;
        } else {
            echo 'Host info: ' . $this->mysql->host_info;
        }

    }

    /* ---------------------- testFormInputData ----------------------------------- */

    public function testFormInputData($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /* -------------------- Admin Logout ----------------------------------- */
    public function adminLogout()
    {
        session_start();
        unset($_SESSION['email']);
        header('Location: index.php');
    }


}








