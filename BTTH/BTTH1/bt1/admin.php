<?php
// Nạp mảng $flowers từ tệp flowers.php
$flowers = require 'flowers.php'; // Hoặc bạn có thể thay bằng truy vấn từ cơ sở dữ liệu nếu cần
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị danh sách loài hoa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .actions button {
            margin: 0 5px;
            padding: 5px 10px;
        }
        .actions a {
            text-decoration: none;
        }
        img {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Quản trị danh sách các loài hoa</h1>
    <a href="create.php"><button>Thêm mới</button></a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($flowers)): ?>
                <?php foreach ($flowers as $flower): ?>
                    <tr>
                        <td><?php echo $flower['id']; ?></td>
                        <td><?php echo $flower['name']; ?></td>
                        <td><?php echo $flower['description']; ?></td>
                        <td>
                            <!-- Hiển thị một hình ảnh duy nhất -->
                            <img src="images/<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
                        </td>
                        <td class="actions">
                            <a href="read.php?id=<?php echo $flower['id']; ?>"><button>Xem</button></a>
                            <a href="update.php?id=<?php echo $flower['id']; ?>"><button>Sửa</button></a>
                            <a href="delete.php?id=<?php echo $flower['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><button>Xóa</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có dữ liệu để hiển thị.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>