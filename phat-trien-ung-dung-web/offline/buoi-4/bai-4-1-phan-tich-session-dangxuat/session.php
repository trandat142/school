<?php
session_start();
error_reporting(0);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Session trong PHP</title>
</head>
<?php
if (isset($_POST["sbgan"])) {
    $_SESSION["ThongTin"] = $_POST["txtthongtin"];
}
?>
<body>
<form method="post">
<table>
<tr>
   <td>Gán giá trị cho biến session:</td>
   <td><input type="text" name="txtthongtin"></td>
   <td><input type="submit" value="Gán" name="sbgan"></td>
</tr>
</table>
</form>
<h3>
<?php
if ($_SESSION["ThongTin"]) {
    echo "Giá trị biến session là: " . $_SESSION["ThongTin"] . ". <a href='dangxuat.php'>Đăng xuất</a>";
} else {
    echo "Giá trị biến session chưa được gán";
}
?>
</h3>
<hr>
<p><a href="ketqua.php">Xem trang trả lời câu hỏi (ketqua.php)</a></p>
</body>
</html>
