<?

namespace exam;
//Represents a connection between PHP and a database server.

use mysqli;

class Repository
{
    public mysqli|null|false $mysql;
    private $dbname = 'task_manager';

    public function __construct()
    {
        $dbname = $this->dbname;
        $this->mysql = mysqli_connect('localhost', 'root', '', 'task_manager');
        mysqli_select_db($this->mysql, $dbname);

        if ($this->mysql->connect_error) {
            echo 'Error number: ' . $this->mysql->connect_errno;
            echo 'Error: ' . $this->mysql->connect_error;
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

    public function createCSV(array &$files): bool|string|null
    {
        if (count($files) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array(reset($files)));
        foreach ($files as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    public function put2Achieve($array, $filename = 'file.csv', $delimiter = ';'): int
    {
        $f = fopen('php://memory', 'w');
        foreach ($array as $line) {
            fputcsv($f, $line, $delimiter);
        }
        fseek($f, 0);
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=completed"' . $filename . '";');
        return fpassthru($f);

    }

}








