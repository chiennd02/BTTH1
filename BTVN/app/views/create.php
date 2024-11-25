<?php
echo __DIR__ . '/../config/Database.php';  // Output the full path for debugging
include_once realpath(__DIR__ . '/../config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Làm sạch và kiểm tra dữ liệu đầu vào
    $name = htmlspecialchars(trim($_POST['name']));
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);

    if (!$name || !$price) {
        die("Dữ liệu không hợp lệ! Vui lòng kiểm tra lại.");
    }

    // Sử dụng Prepared Statement để thêm sản phẩm
    $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $price);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h2>Thêm sản phẩm mới</h2>
    <form method="post">
        <label for="name">Tên sản phẩm:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="price">Giá thành:</label><br>
        <input type="number" id="price" name="price" required><br><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
