<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo bộ mã UTF-8 để hiển thị tiếng Việt không bị lỗi font -->
    <meta charset="UTF-8">

    <!-- Tiêu đề hiển thị trên tab trình duyệt -->
    <title>Truyền biến</title>
</head>
<body>
    <!-- Tiêu đề chính của trang -->
    <h2>Nhập thông tin</h2>

    <!--
        Form dùng để gửi dữ liệu sang trang nhanbien.php.
        method="post": gửi dữ liệu bằng phương thức POST, dữ liệu không hiện trên thanh địa chỉ.
        action="nhanbien.php": khi bấm nút Gửi, dữ liệu sẽ được gửi sang file nhanbien.php.
    -->
    <form method="post" action="nhanbien.php">
        <!-- Nhãn mô tả cho ô nhập -->
        <label>Nhập tên:</label>

        <!--
            Ô nhập dữ liệu.
            name="txtten" là tên biến.
            Trang nhanbien.php sẽ dùng $_POST["txtten"] để nhận giá trị này.
        -->
        <input type="text" name="txtten">

        <!-- Nút submit dùng để gửi form -->
        <input type="submit" value="Gửi">
    </form>
</body>
</html>
