<?php
include('myclass/clslogin.php');
$p = new login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1" align="center" cellpadding="10" cellspacing="0">
    <tr>
      <td colspan="2" align="center" valign="middle"><strong>ĐĂNG NHẬP</strong></td>
    </tr>
    <tr>
      <td width="217" align="left" valign="middle">Nhập mã sinh viên</td>
      <td width="357" align="left" valign="middle"><label for="txtuser"></label>
      <input name="txtuser" type="text" id="txtuser" size="50" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Nhập mật khẩu</td>
      <td align="left" valign="middle"><label for="txtpass"></label>
      <input name="txtpass" type="password" id="txtpass" size="50" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="nut" id="nut" value="Đăng nhập" />
      <input type="reset" name="Reset" id="button" value="Reset" /></td>
    </tr>
  </table>
<?php
switch ($_POST['nut']) {
    case 'Đăng nhập': {
        $user = $_REQUEST['txtuser'];
        $pass = $_REQUEST['txtpass'];
        if ($user != '' && $pass != '') {
            $p->mylogin($user, $pass);
        } else {
            echo 'Vui lòng nhập đầy đủ masv và mật khẩu.';
        }
        break;
    }
}
?>
</form>
</body>
</html>
