<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ví dụ PHP cơ bản</title>
</head>
<body>
    <h1>Ví dụ PHP cơ bản</h1>

    <?php
    // echo dùng để xuất dữ liệu ra màn hình
    echo '<p>Hello World!</p>';

    // Biến trong PHP bắt đầu bằng dấu $
    // PHP tự nhận kiểu dữ liệu khi gán giá trị
    $txt = 'Hello World!';
    $x = 16;
    $myCar = 'Volvo';

    // Nối chuỗi trong PHP dùng dấu chấm .
    echo '<p>Chuoi txt: ' . $txt . '</p>';
    echo '<p>Gia tri x: ' . $x . '</p>';
    echo '<p>Xe cua toi: ' . $myCar . '</p>';

    // PHP phân biệt chữ hoa và chữ thường
    $y = 10;
    $Y = 20;
    echo '<p>$y = ' . $y . '</p>';
    echo '<p>$Y = ' . $Y . '</p>';
    ?>
</body>
</html>
