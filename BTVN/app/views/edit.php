<?php
include 'Database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name = '$name', price = $price WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
</head>
<body>
    <h2>Sửa sản phẩm</h2>
    <form method="post">
        <label for="name">Tên sản phẩm:</label><br>
        <input type="text" id="name" name="name" value="<?= $product['name'] ?>" required><br><br>
        <label for="price">Giá thành:</label><br>
        <input type="number" id="price" name="price" value="<?= $product['price'] ?>" required><br><br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
