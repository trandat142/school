<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo bộ mã UTF-8 để hiển thị tiếng Việt -->
    <meta charset="UTF-8">

    <!-- Tiêu đề hiển thị trên tab trình duyệt -->
    <title>Đăng ký thông tin</title>

    <!-- Liên kết file CSS để trang có giao diện đẹp hơn -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Khung lớn chứa toàn bộ trang web -->
    <div class="container">
        <!-- Phần đầu trang -->
        <header>
            <h1>Website của tôi</h1>
        </header>

        <!-- Phần chính gồm menu và nội dung -->
        <div class="main">
            <!-- Menu bên trái -->
            <nav>
                <h3>Menu</h3>
                <ul>
                    <li>Trang chủ</li>
                    <li>Đăng ký</li>
                    <li>Đăng nhập</li>
                </ul>
            </nav>

            <!-- Nội dung bên phải -->
            <div class="content">
                <h2>Đăng ký thông tin</h2>

                <!--
                    Form đăng ký.
                    method="post": gửi dữ liệu bằng POST.
                    action="": gửi dữ liệu về chính trang dangky.php.
                -->
                <form method="post" action="">
                    <!-- Ô nhập họ tên; name="txthoten" dùng để PHP nhận dữ liệu -->
                    <label>Họ tên:</label>
                    <input type="text" name="txthoten" required><br>

                    <!-- Ô nhập email; type="email" giúp kiểm tra định dạng email cơ bản -->
                    <label>Email:</label>
                    <input type="email" name="txtemail" required><br>

                    <!-- Ô nhập mật khẩu; type="password" giúp che ký tự khi nhập -->
                    <label>Mật khẩu:</label>
                    <input type="password" name="txtpassword" required><br>

                    <!-- Danh sách chọn giới tính -->
                    <label>Giới tính:</label>
                    <select name="gioitinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select><br>

                    <!-- Ô nhập địa chỉ -->
                    <label>Địa chỉ:</label>
                    <input type="text" name="txtdiachi" required><br>

                    <!-- Nút submit để gửi form; PHP kiểm tra bằng $_POST["sbdangky"] -->
                    <input type="submit" name="sbdangky" value="Đăng ký">
                </form>

                <?php
                /*
                    Kiểm tra người dùng đã bấm nút Đăng ký hay chưa.
                    Nếu đã bấm, biến $_POST["sbdangky"] sẽ tồn tại.
                */
                if (isset($_POST["sbdangky"])) {
                    // In tiêu đề phần thông tin đã đăng ký
                    echo "<h3>Thông tin đã đăng ký</h3>";

                    // Lấy và in họ tên từ ô có name="txthoten"
                    echo "Họ tên: " . $_POST["txthoten"] . "<br>";

                    // Lấy và in email từ ô có name="txtemail"
                    echo "Email: " . $_POST["txtemail"] . "<br>";

                    // Lấy và in mật khẩu từ ô có name="txtpassword"
                    echo "Mật khẩu: " . $_POST["txtpassword"] . "<br>";

                    // Lấy và in giới tính từ select có name="gioitinh"
                    echo "Giới tính: " . $_POST["gioitinh"] . "<br>";

                    // Lấy và in địa chỉ từ ô có name="txtdiachi"
                    echo "Địa chỉ: " . $_POST["txtdiachi"] . "<br>";
                }
                ?>
            </div>
        </div>

        <!-- Phần chân trang -->
        <footer>
            Footer
        </footer>
    </div>
</body>
</html>
