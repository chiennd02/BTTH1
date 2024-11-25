<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="/BTTH/create">Thêm mới sản phẩm</a>
    <table border="1">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá thành</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><a href="/BTTH/edit/<?= $product['id'] ?>">Sửa</a></td>
            <td><a href="/BTTH/delete/<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
