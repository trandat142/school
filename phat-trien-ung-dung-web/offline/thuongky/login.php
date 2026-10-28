<?php
session_start();
include 'config.php';

$thongbao = "";

if (isset($_POST['btnDangNhap'])) {
    $user = trim($_POST['txtuser']);
    $pass = trim($_POST['txtpass']);

    if ($user != '' && $pass != '') {
        $pass_md5 = md5($pass);
        $sql = "SELECT * FROM TAIKHOAN 
                WHERE username = '$user' AND (password = '$pass' OR password = '$pass_md5') 
                LIMIT 1";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['iduser'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['phanquyen'] = $row['phanquyen'];

            header('Location: index.php');
            exit();
        } else {
            $thongbao = "Đăng nhập không thành công! Sai tài khoản hoặc mật khẩu.";
        }
    } else {
        $thongbao = "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập Quản Trị</title>
</head>

<body>
<br /><br />
<form id="form1" name="form1" method="post" action="">
    <table width="400" border="1" align="center" cellpadding="10" cellspacing="0">
        <tr>
            <td colspan="2" align="center" valign="middle"><strong>LOGIN</strong></td>
        </tr>
        <tr>
            <td width="130" align="left" valign="middle"><strong>Nhập username</strong></td>
            <td align="left" valign="middle"><input name="txtuser" type="text" size="30" required /></td>
        </tr>
        <tr>
            <td align="left" valign="middle"><strong>Nhập password</strong></td>
            <td align="left" valign="middle"><input name="txtpass" type="password" size="30" required /></td>
        </tr>
        <tr>
            <td colspan="2" align="center" valign="middle">
                <input type="submit" name="btnDangNhap" value="Đăng nhập" />
            </td>
        </tr>
    </table>
</form>

<?php if ($th_msg = $thongbao): ?>
    <p align="center"><strong><font color="#FF0000"><?php echo $th_msg; ?></font></strong></p>
<?php endif; ?>

<p align="center"><a href="index.php">&larr; Quay về Trang chủ bán hàng</a></p>
</body>
</html>
