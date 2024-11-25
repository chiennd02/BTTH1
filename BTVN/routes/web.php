<?php
require_once __DIR__ . '/../app/controllers/ProductController.php';

$basePath = '/NguyenDuyenChien/BTVH/public'; 
$uri = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

// Khởi tạo controller
$controller = new ProductController();

switch ($uri) {
    case '/':
        if ($method === 'GET') {
            $controller->index();
        }
        break;

    case '/create':
        $controller->create();
        break;

    case (preg_match('/^\/edit\/\d+$/', $uri) ? true : false):
        // Lấy ID từ URL
        $id = intval(explode('/', $uri)[2]); // Đảm bảo ID là số nguyên
        if ($method === 'GET') {
            $controller->edit($id); // Hiển thị form chỉnh sửa sản phẩm
        } elseif ($method === 'POST') {
            $controller->edit($id); // Xử lý form chỉnh sửa sản phẩm
        }
        break;

    case (preg_match('/^\/delete\/\d+$/', $uri) ? true : false):
        // Lấy ID từ URL
        $id = intval(explode('/', $uri)[2]); // Đảm bảo ID là số nguyên
        if ($method === 'GET') {
            $controller->delete($id); // Xóa sản phẩm
        }
        break;

    default:
        http_response_code(404);
        echo "Trang không tồn tại!";
        break;
}
?>
