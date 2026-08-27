<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo bộ mã UTF-8 để hiển thị tiếng Việt -->
    <meta charset="UTF-8">

    <!-- Tiêu đề hiển thị trên tab trình duyệt -->
    <title>Nhận biến</title>
</head>
<body>
    <!-- Tiêu đề chính của trang -->
    <h2>Thông tin nhận được</h2>

    <?php
    /*
        isset($_POST["txtten"]) dùng để kiểm tra biến txtten có tồn tại hay chưa.
        Biến txtten được gửi từ file truyenbien.php.
        Nếu người dùng đã nhập và bấm Gửi thì biến này sẽ tồn tại.
    */
    if (isset($_POST["txtten"])) {
        /*
            $_POST["txtten"] dùng để lấy dữ liệu từ ô input có name="txtten".
            echo dùng để in dữ liệu ra màn hình.
        */
        echo "Tên bạn nhập là: " . $_POST["txtten"];
    }
    ?>
</body>
</html>
