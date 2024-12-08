<?php
class User {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'tintuc';
        $username = 'root';
        $password = '';
        $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    }

    public function findAdmin($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username AND role = 1");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
