<?php
require_once 'models/User.php';

class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findAdmin($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['admin'] = $user['username'];
                header('Location: /admin/dashboard');
                exit();
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu.";
                require 'views/admin/login.php';
            }
        } else {
            require 'views/admin/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /admin/login');
        exit();
    }

    public function dashboard() {
        if (!isset($_SESSION['admin'])) {
            header('Location: /admin/login');
            exit();
        }

        require 'views/admin/dashboard.php';
    }
}
?>
