<?php
session_start();

if (isset($_SESSION["user"])) {
    header("location:trangchu.php");
    exit();
}

$thongbao = "";

// Bước 3: Xử lý phần đăng nhập
if (isset($_POST["sbdangnhap"])) {
    // Nếu đăng nhập thành công
    if (isset($_COOKIE["remember"])) {
        parse_str($_COOKIE["remember"], $result);
        if ($_POST["email"] == $result["dkemail"]) {
            setcookie("bgcolor", $result["dksothich"], time() + 3600 * 24 * 10, "/");
            // Sinh viên sử dụng biến cookie bgcolor này
            // để xử lý tiếp với phần css..
        }
    }

    $user_dk = isset($_SESSION["thongtin_dangky"]) ? $_SESSION["thongtin_dangky"] : array("email" => "admin@gmail.com", "password" => "123456", "hoten" => "Quản trị viên");

    if ($_POST["email"] == $user_dk["email"] && $_POST["password"] == $user_dk["password"]) {
        $_SESSION["user"] = $user_dk;
        header("location:trangchu.php");
        exit();
    } else {
        $thongbao = "Email hoặc mật khẩu không chính xác!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
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
                <h2>Đăng nhập thông tin</h2>

                <?php if ($thongbao != "") { echo "<p style='color:red;'>$thongbao</p>"; } ?>

                <form method="post" action="">
                    <label>Email:</label>
                    <input type="email" name="email" required><br>

                    <label>Password:</label>
                    <input type="password" name="password" required><br>

                    <label></label>
                    <input type="checkbox" name="chknhothongtin"> Nhớ thông tin đăng nhập<br>

                    <label></label>
                    <input type="submit" name="sbdangnhap" value="Đăng nhập">
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
