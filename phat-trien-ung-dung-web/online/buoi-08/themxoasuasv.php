<?php
session_start();

// Chưa đăng nhập (thiếu session) thì chuyển về trang login.php
if (
    isset($_SESSION['id']) &&
    isset($_SESSION['user']) &&
    isset($_SESSION['pass']) &&
    isset($_SESSION['phanquyen'])
) {
    include('myclass/clslogin.php');
    $q = new login();
    $q->confirmlogin(
        $_SESSION['id'],
        $_SESSION['user'],
        $_SESSION['pass'],
        $_SESSION['phanquyen']
    );
} else {
    header('location:login.php');
    exit();
}

// Nạp file chứa class csdl để sử dụng các hàm kết nối và truy vấn CSDL
include('myclass/clscsdl.php');

// Tạo đối tượng $p từ class csdl để gọi các hàm bên trong
$p = new csdl();

// Giá trị hiển thị sẵn trong form (mặc định rỗng khi chưa chọn sinh viên)
$layid = '';
$lay_masv = '';
$lay_hodem = '';
$lay_ten = '';
$lay_lop = '';

// Khi bấm vào một sinh viên trong bảng (?id=...), lấy dữ liệu của sinh viên đó để đổ vào form
if (isset($_REQUEST['id'])) {
    $layid = $_REQUEST['id'];
    $lay_masv = $p->laycot("select masv from sinhvien where id='$layid' limit 1");
    $lay_hodem = $p->laycot("select hodem from sinhvien where id='$layid' limit 1");
    $lay_ten = $p->laycot("select ten from sinhvien where id='$layid' limit 1");
    $lay_lop = $p->laycot("select lop from sinhvien where id='$layid' limit 1");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Khai báo bảng mã UTF-8 để hiển thị tiếng Việt -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản Lý Sinh Viên</title>
</head>

<body>

<!-- Form nhập thông tin sinh viên, gửi dữ liệu bằng phương thức POST -->
<form id="form1" name="form1" method="post" action="">

<!-- Bảng chứa các ô nhập liệu -->
<table width="1000" border="1" align="center" cellpadding="5" cellspacing="0">

<!-- Dòng tiêu đề -->
<tr>
    <td colspan="2" align="center" valign="middle"><strong>QUẢN LÝ SINH VIÊN</strong>
    <label for="txtid"></label>
    <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" /></td>
</tr>

<!-- Ô nhập Mã sinh viên -->
<tr>
    <td width="333" align="left" valign="middle">Nhập mã sinh viên</td>
    <td width="641" align="left" valign="middle"><label for="txtmasv"></label>
    <input name="txtmasv" type="text" id="txtmasv" value="<?php echo $lay_masv; ?>" size="50" /></td>
</tr>

<!-- Ô nhập Họ đệm -->
<tr>
    <td align="left" valign="middle">Nhập họ đệm</td>
    <td align="left" valign="middle"><label for="txthodem"></label>
    <input name="txthodem" type="text" id="txthodem" value="<?php echo $lay_hodem; ?>" size="100" /></td>
</tr>

<!-- Ô nhập Tên -->
<tr>
    <td align="left" valign="middle">Nhập tên</td>
    <td align="left" valign="middle"><label for="txtten"></label>
    <input name="txtten" type="text" id="txtten" value="<?php echo $lay_ten; ?>" size="100" /></td>
</tr>

<!-- Ô nhập Lớp -->
<tr>
    <td align="left" valign="middle">Nhập lớp</td>
    <td align="left" valign="middle"><label for="txtlop"></label>
    <input name="txtlop" type="text" id="txtlop" value="<?php echo $lay_lop; ?>" size="50" /></td>
</tr>

<!-- Nút bấm Thêm sinh viên: name="nut" dùng để nhận biết nút nào được nhấn -->
<tr>
    <td colspan="2" align="center" valign="middle">
    <input type="submit" name="nut" id="nut" value="Thêm sinh viên" />
    <input type="submit" name="nut" value="Sửa sinh viên" />
    <input type="submit" name="nut" value="Xóa sinh viên" />
    </td>
</tr>

</table>

<hr />

<!-- Phần xử lý khi người dùng nhấn nút submit -->
<div align="center">
<?php
// Kiểm tra xem nút nào đã được nhấn (chỉ xử lý khi form đã được gửi)
if (isset($_POST['nut'])) {

    // Dùng switch để xử lý tùy theo giá trị nút nhấn
    switch ($_POST['nut']) {

        case 'Thêm sinh viên':
            // Lấy dữ liệu người dùng nhập từ form
            $masv = $_REQUEST['txtmasv'];       // Mã sinh viên
            $hodem = $_REQUEST['txthodem'];     // Họ đệm
            $ten = $_REQUEST['txtten'];         // Tên
            $lop = $_REQUEST['txtlop'];         // Lớp
            // Mật khẩu mặc định 123456 (đã băm) cho sinh viên mới
            $pass = $q->bammatkhau('123456');

            // Kiểm tra tất cả các ô đều không được để trống
            if ($masv != '' && $hodem != '' && $ten != '' && $lop != '') {

                // Gọi hàm themxoasua() để chèn dữ liệu vào bảng sinhvien
                // Nếu trả về 1 = thành công
                if ($p->themxoasua("INSERT INTO sinhvien (masv, password, hodem, ten, lop) VALUES ('$masv', '$pass', '$hodem', '$ten', '$lop')") == 1) {
                    // Hiện hộp thoại thông báo bằng JavaScript
                    echo '<script language="javascript">
                    alert("Thêm thành công");
                  </script>';
                } else {
                    echo 'Không thành công.';
                }
            } else {
                // Trường hợp có ô bị bỏ trống
                echo 'Vui lòng nhập đầy đủ thông tin.';
            }
            break;

        case 'Sửa sinh viên':
            $myid = $_REQUEST['txtid'];
            if ($myid > 0) {
                $masv = $_REQUEST['txtmasv'];
                $hodem = $_REQUEST['txthodem'];
                $ten = $_REQUEST['txtten'];
                $lop = $_REQUEST['txtlop'];

                if ($masv != '' && $hodem != '' && $ten != '' && $lop != '') {
                    if ($p->themxoasua("UPDATE sinhvien SET masv='$masv', hodem='$hodem', ten='$ten', lop='$lop' WHERE id='$myid' LIMIT 1") == 1) {
                        echo '<script language="javascript">
                        alert("Sửa thành công.");
                        window.location="themxoasuasv.php";
                      </script>';
                    } else {
                        echo 'Sửa không thành công.';
                    }
                } else {
                    echo 'Vui lòng nhập đầy đủ thông tin.';
                }
            } else {
                echo 'Vui lòng chọn sinh viên cần sửa.';
            }
            break;

        case 'Xóa sinh viên':
            $myid = $_REQUEST['txtid'];
            if ($myid > 0) {
                if ($p->themxoasua("delete from sinhvien where id='$myid' limit 1") == 1) {
                    echo '<script language="javascript">
                    alert("Xóa thành công.");
                  </script>';
                    echo '<script language="javascript">
                    window.location="themxoasuasv.php";
                  </script>';
                } else {
                    echo 'Không thành công.';
                }
            } else {
                echo 'Vui lòng chọn sinh viên cần xóa.';
            }
            break;
    }
}
?>
</div>

<hr />

<!-- Hiển thị bảng danh sách sinh viên, sắp xếp theo ID giảm dần (mới nhất lên đầu) -->
<?php
$p->xuatbangsinhvien("select * from sinhvien order by id desc");
?>
</form>

</body>
</html>
