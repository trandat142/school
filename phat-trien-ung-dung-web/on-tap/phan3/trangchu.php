<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
</head>

<body>

<?php
if (!isset($_SESSION["user"])) {
    echo '<a href="dangky.php">Dang ky</a>';
    echo '<a href="dangnhap.php">Dang nhap</a>';
} else {

    $tk = $_SESSION["thongtin_dangky"];

    echo "Xin chao: " . $tk["hoten"];

    echo '<a href="dangxuat.php">Dang xuat</a>';

    if ($tk["anh"] != "") {
        echo '<img src="' . $tk["anh"] . '">';
    }

    echo "So thich: " . implode(",", $tk["sothich"]);
}
?>

</body>
</html>
        
</body>
</html>