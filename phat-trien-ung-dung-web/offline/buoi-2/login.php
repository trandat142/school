<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo bộ mã UTF-8 để hiển thị tiếng Việt không bị lỗi font -->
    <meta charset="UTF-8">

    <!-- Tiêu đề hiển thị trên tab trình duyệt -->
    <title>Đăng nhập</title>
</head>
<body>
    <!-- Tiêu đề chính của trang -->
    <h2>Đăng nhập</h2>

    <!--
        Form đăng nhập.
        method="post": gửi dữ liệu bằng phương thức POST.
        action="": gửi dữ liệu về chính trang login.php hiện tại.
    -->
    <form method="post" action="">
        <!-- Nhãn và ô nhập email -->
        <label>Email:</label>
        <input type="text" name="txtemail"><br><br>

        <!-- Nhãn và ô nhập mật khẩu; type="password" giúp che ký tự khi nhập -->
        <label>Password:</label>
        <input type="password" name="txtpassword"><br><br>

        <!--
            Nút submit để gửi form.
            name="sbdangnhap" dùng để PHP kiểm tra người dùng đã bấm nút hay chưa.
        -->
        <input type="submit" name="sbdangnhap" value="Đăng nhập">
    </form>

    <?php
    /*
        Kiểm tra nút Đăng nhập đã được bấm chưa.
        Nếu đã bấm, biến $_POST["sbdangnhap"] sẽ tồn tại.
    */
    if (isset($_POST["sbdangnhap"])) {
        // Lấy email người dùng nhập từ ô có name="txtemail"
        $email = $_POST["txtemail"];

        // Lấy password người dùng nhập từ ô có name="txtpassword"
        $password = $_POST["txtpassword"];

        /*
            Kiểm tra thông tin đăng nhập.
            && nghĩa là "và", tức là cả email và password đều phải đúng.
        */
        if ($email == "abc@gmail.com" && $password == "123456") {
            // Nếu đúng email và password thì thông báo đăng nhập thành công
            echo "Chúc mừng đăng nhập thành công!";
        } else {
            // Nếu sai email hoặc password thì thông báo đăng nhập thất bại
            echo "Đăng nhập thất bại";
        }
    }
    ?>
</body>
</html>
