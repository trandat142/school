<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo bộ mã UTF-8 để hiển thị tiếng Việt -->
    <meta charset="UTF-8">

    <!-- Tiêu đề hiển thị trên tab trình duyệt -->
    <title>Thông tin tác giả</title>
</head>
<body>
    <!-- Tiêu đề chính của trang -->
    <h2>Thông tin chi tiết tác giả</h2>

    <?php
    /*
        Kiểm tra xem trên URL có đủ 2 biến ten và tuoi hay không.
        Ví dụ URL đúng:
        thongtin.php?ten=An&tuoi=20
    */
    if (isset($_GET["ten"]) && isset($_GET["tuoi"])) {
        // $_GET["ten"] dùng để lấy giá trị của biến ten trên URL
        echo "Tên tác giả: " . $_GET["ten"] . "<br>";

        // $_GET["tuoi"] dùng để lấy giá trị của biến tuoi trên URL
        echo "Tuổi: " . $_GET["tuoi"];
    } else {
        // Nếu URL không có biến ten hoặc tuoi thì hiển thị thông báo này
        echo "Không có thông tin tác giả.";
    }
    ?>
</body>
</html>
