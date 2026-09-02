<?php
session_start();

// Gán giá trị biến session nếu submit form
if (isset($_POST["sbgan"])) {
    $_SESSION["ThongTin"] = trim($_POST["txtthongtin"]);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Session trong PHP - Bài 4.1</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f8; }
        .box { background: white; padding: 25px; border-radius: 8px; max-width: 550px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        table td { padding: 8px; }
        input[type="text"] { width: 220px; padding: 6px; }
        input[type="submit"] { padding: 6px 15px; cursor: pointer; }
        .msg { margin-top: 20px; padding: 12px; border-radius: 5px; background: #e8f4fd; color: #0c5460; }
        .nav-link { margin-top: 15px; display: inline-block; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
<div class="box">
    <h2>Demo Session trong PHP</h2>
    <form method="post" action="">
        <table>
            <tr>
                <td><strong>Gán giá trị biến session:</strong></td>
                <td><input type="text" name="txtthongtin" placeholder="Nhập chuỗi thông tin..." required></td>
                <td><input type="submit" value="Gán" name="sbgan"></td>
            </tr>
        </table>
    </form>

    <div class="msg">
        <h3>
            <?php
            if (isset($_SESSION["ThongTin"]) && $_SESSION["ThongTin"] !== "") {
                echo "Giá trị biến session là: <strong>" . htmlspecialchars($_SESSION["ThongTin"]) . "</strong>. <a href='dangxuat.php'>Đăng xuất</a>";
            } else {
                echo "Giá trị biến session chưa được gán";
            }
            ?>
        </h3>
    </div>

    <hr>
    <p><a class="nav-link" href="ketqua.php">👉 Xem trang Trả lời câu hỏi phân tích (ketqua.php)</a></p>
</div>
</body>
</html>
