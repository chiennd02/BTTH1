<?php
require_once __DIR__ . '/../models/Product.php';


class ProductController {
    public function index() {
        $product = new Product();
        $products = $product->getAll();
        require_once __DIR__ . '/../views/index.php';
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Làm sạch dữ liệu đầu vào
            $name = htmlspecialchars(trim($_POST['name']));
            $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    
            if (!$name || !$price) {
                die("Dữ liệu không hợp lệ!");
            }
    
            // Tạo sản phẩm mới
            $product = new Product();
            $product->create($name, $price);
    
            // Chuyển hướng về trang danh sách sản phẩm
            header('Location: /BTTH/');
            exit;
        } else {
       
            $viewPath = __DIR__ . '/../views/create.php';
            if (!file_exists($viewPath)) {
                die("Tệp view không tồn tại!");
            }
            require_once $viewPath;
        }
    }
    
    

    public function edit($id) {
        $product = new Product();
        $currentProduct = $product->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $product->update($id, $name, $price);
            header('Location: /');
        } else {
            require_once __DIR__ . '/../views/edit.php';
        }
    }

    public function delete($id) {
        $product = new Product();
        $product->delete($id);
        header('Location: /');
    }
}
?>
