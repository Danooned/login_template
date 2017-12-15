<?php

require_once dirname(__DIR__) . '/class/Connection.php';
require_once dirname(__DIR__) . '/class/User.php';

class Core
{
    private $conn;
    private $config;

    function __construct()
    {
        $connection = new db();
        $this->conn = $connection->setupConnection();
        $this->config = parse_ini_file('config.ini');
    }

    function getUserById($id)
    {
        $stm = $this->conn->prepare("SELECT * FROM users WHERE id=:id LIMIT 1");
        $stm->bindParam(":id",$id);
        $stm->setFetchMode(PDO::FETCH_CLASS,"User");
        $stm->execute();

        if ($stm->rowCount() > 0) {
            return $stm->fetch();
        }
    }

    function getUserByName($name)
    {
        $stm = $this->conn->prepare("SELECT * FROM users WHERE name=:name LIMIT 1");
        $stm->bindParam(":name",$name);
        $stm->setFetchMode(PDO::FETCH_CLASS,"User");
        $stm->execute();

        if ($stm->rowCount() > 0) {
            return $stm->fetch();
        }
    }

    // function getUsers()
    // {
    //     $stm = $this->conn->prepare("SELECT * FROM users");
    //     $stm->execute();

    //     if ($stm->rowCount() > 0) {
    //         return $stm->fetchAll(PDO::FETCH_CLASS,"User");
    //     }
    // }

    function addUser(User $user) {
        $salt = random_int(111111111, 999999999);
        $password = md5(md5($salt).md5($user->getPassword()));

        $stmt = $this->conn->prepare("INSERT INTO users(name, email, salt, password) VALUES (:name, :email, :salt, :password)");
        $stmt->bindParam(":name",$user->getName());
        $stmt->bindParam(":email",$user->getEmail());
        $stmt->bindParam(":salt",$salt);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
    }

}
