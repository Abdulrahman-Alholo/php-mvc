<?php
require_once __DIR__ . '/../../app/models/User.php';
class UserController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function index() {

        $result = mysqli_query($this->conn, 'SELECT * FROM users');
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setEmail($row['email']);
            $users[] = $user;
        }
        require 'views/user/index.php';
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $name = $user->getName();
            $email = $user->getEmail();
            $sql = "INSERT INTO users (name,email) VALUES (
                '$name',
                '$email'
                ) ";
            $stmt = mysqli_query($this->conn, $sql);
            header('Location: /darrebni/crud/');
            exit;
        } else {
            require 'views/user/create.php';
        }
    }
    public function edit($id) {
        $res = $this->conn->query("SELECT * FROM users WHERE id = '$id'");
        $result = mysqli_fetch_assoc($res);
        $user = new User();
        $user->setName($result['name']);
        $user->setEmail($result['email']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $name = $user->getName();
            $email = $user->getEmail();
            $stmt = $this->conn->query("UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'");
            header('Location: /darrebni/crud/');
            exit;
        } else {
            require __DIR__ . '/../../views/user/edit.php';
        }
    }
    public function delete($id)
    {
       $d = $this->conn->query("DELETE FROM users WHERE id = '$id' ");
       header('Location: /darrebni/crud/');

    }
    
}
