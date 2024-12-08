<?php
// Bắt đầu session
session_start();

// Autoload models và controllers
spl_autoload_register(function ($class) {
    $paths = ['controllers/', 'models/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Lấy URL và gọi controller
$url = isset($_GET['url']) ? explode('/', $_GET['url']) : ['home'];
$controllerName = ucfirst($url[0]) . 'Controller';
$methodName = isset($url[1]) ? $url[1] : 'index';
$params = array_slice($url, 2);

if (file_exists('controllers/' . $controllerName . '.php')) {
    $controller = new $controllerName();
    if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], $params);
    } else {
        echo "Phương thức không tồn tại.";
    }
} else {
    echo "Controller không tồn tại.";
}
?>
