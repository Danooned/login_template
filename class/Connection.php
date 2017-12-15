<?php

class db
{

    private $conn;

    function __construct()
    {

    }

    public function setupConnection()
    {

        if (!isset($conn)) {
            $data = parse_ini_file('config.ini');

            $mysql_host = $data['host'];
            $mysql_username = $data['user'];
            $mysql_password = $data['password'];
            $mysql_db = $data['database'];

            try {
                $conn = new PDO("mysql:host=" . $mysql_host . ";dbname=" . $mysql_db . "", $mysql_username, $mysql_password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                echo "Connectie is gefaald!: " . $e->getMessage();
            }

            return $conn;
        }

    }

}

?>
