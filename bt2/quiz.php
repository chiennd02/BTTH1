<?php
// Đọc tệp câu hỏi từ file .txt
$questions = file_get_contents("questions.txt");

// Tách câu hỏi bằng dấu phân cách "---"
$questionsArray = explode("---", $questions);

// Hiển thị bài thi trắc nghiệm
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
</head>
<body>
    <h1>Bài thi trắc nghiệm</h1>
    <form action="submit.php" method="POST">
        <?php
        foreach ($questionsArray as $index => $question) {
            // Tách câu hỏi thành các dòng
            $lines = explode("\n", trim($question));
            
            // Lấy câu hỏi (dòng đầu tiên)
            $questionText = array_shift($lines);
            
            // Hiển thị câu hỏi
            echo "<p><strong>" . ($index + 1) . ". " . $questionText . "</strong></p>";

            // Hiển thị các lựa chọn (A, B, C, D)
            foreach ($lines as $line) {
                if (trim($line)) {
                    echo "<input type='radio' name='question-$index' value='" . trim($line) . "'> " . trim($line) . "<br>";
                }
            }
        }
        ?>
        <br>
        <input type="submit" value="Nộp bài">
    </form>
</body>
</html>
