<?php
// Đọc tệp CSV
$filename = "customers.csv";
$customers = [];

// Mở tệp CSV và đọc nội dung
if (($handle = fopen($filename, "r")) !== false) {
    // Đọc dòng tiêu đề và bỏ qua
    $headers = fgetcsv($handle);

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle)) !== false) {
        // Lưu dữ liệu vào mảng
        $customers[] = $data;
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dữ liệu khách hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Dữ liệu khách hàng</h1>
    <table>
        <thead>
            <tr>
                <?php
                // Hiển thị tiêu đề bảng từ header của tệp CSV
                foreach ($headers as $header) {
                    echo "<th>" . htmlspecialchars($header) . "</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị dữ liệu khách hàng trong bảng
            foreach ($customers as $customer) {
                echo "<tr>";
                foreach ($customer as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
