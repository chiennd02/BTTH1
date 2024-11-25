
<?php
// Nạp mảng $flowers từ tệp flowers.php
$flowers = require 'flowers.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <style>
        .flower { margin: 20px; padding: 10px; border: 1px solid #ccc; }
        .flower img { width: 150px; height: auto; }
    </style>
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <?php foreach ($flowers as $flower): ?>
        <div class="flower">
            <h2><?php echo $flower['name']; ?></h2>
            <p><?php echo $flower['description']; ?></p>
            <img src="images/<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
        </div>
    <?php endforeach; ?>
</body>
</html>
