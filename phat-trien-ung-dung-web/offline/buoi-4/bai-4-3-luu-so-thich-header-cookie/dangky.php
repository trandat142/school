<?php
session_start();

// Bước 3: Xử lý phần đăng ký
if (isset($_POST["sbdangky"])) {
    // Nếu đăng ký thành công
    setcookie("remember", "dkemail=" . $_POST['email'] . "&dksothich=" . $_POST['sothich'], time() + 3600 * 24 * 100, "/");

    // Lưu thông tin đăng ký vào session
    $_SESSION["thongtin_dangky"] = array(
        "email"      => $_POST["email"],
        "password"   => $_POST["password"],
        "hoten"      => $_POST["hoten"],
        "quequan"    => $_POST["quequan"],
        "dienthoai"  => $_POST["dienthoai"],
        "gioitinh"   => $_POST["gioitinh"],
        "sothich"    => $_POST["sothich"]
    );

    header("location:dangnhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký thành viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="<?php echo isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : ''; ?>">
            <h1>Website của tôi</h1>
        </header>

        <div class="main">
            <nav>
                <h3>Menu</h3>
                <ul>
                    <li><a href="trangchu.php">Trang chủ</a></li>
                    <li><a href="dangky.php">Đăng ký</a></li>
                    <li><a href="dangnhap.php">Đăng nhập</a></li>
                </ul>
            </nav>

            <div class="content">
                <h2>Đăng ký thông tin</h2>

                <form method="post" action="">
                    <label>Email:</label>
                    <input type="email" name="email" required><br>

                    <label>Password:</label>
                    <input type="password" name="password" required><br>

                    <label>Nhập lại password:</label>
                    <input type="password" name="repassword" required><br>

                    <label>Họ tên:</label>
                    <input type="text" name="hoten" required><br>

                    <label>Quê quán:</label>
                    <select name="quequan">
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                        <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                        <option value="Cần Thơ">Cần Thơ</option>
                    </select><br>

                    <label>Điện thoại:</label>
                    <input type="text" name="dienthoai" required><br>

                    <label>Giới tính:</label>
                    <input type="radio" name="gioitinh" value="Nam" checked> Nam
                    <input type="radio" name="gioitinh" value="Nữ"> Nữ<br>

                    <!-- Bước 2: Đặt lại value của checkbox sở thích tương ứng 2 class css -->
                    <label>Sở thích:</label>
                    Màu xanh <input type="checkbox" name="sothich" value="bg_green" />
                    Màu đỏ <input type="checkbox" name="sothich" value="bg_red" /><br>

                    <label></label>
                    <input type="submit" name="sbdangky" value="Đăng ký">
                    <input type="reset" value="Làm lại">
                </form>
            </div>
        </div>

        <footer>
            Footer
        </footer>
    </div>
</body>
</html>
