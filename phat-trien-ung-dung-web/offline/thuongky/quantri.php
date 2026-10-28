<?php
session_start();
include 'config.php';

// KIỂM TRA PHÂN QUYỀN BẢO MẬT TUYỆT ĐỐI:
// Bắt buộc phải đăng nhập VÀ phanquyen phải bằng 1 (Admin) mới được vào
if (!isset($_SESSION['id']) || !isset($_SESSION['phanquyen']) || $_SESSION['phanquyen'] != 1) {
    echo '<script>alert("Cảnh báo: Bạn không có quyền truy cập trang quản trị này!"); window.location="login.php";</script>';
    exit();
}

$thongbao = "";

// 1. XỬ LÝ XÓA SẢN PHẨM (Bài 7.2b)
if (isset($_GET['xoa'])) {
    $id_xoa = (int)$_GET['xoa'];
    $res_hinh = $conn->query("SELECT hinh FROM SANPHAM WHERE idsp = '$id_xoa' LIMIT 1");
    if ($res_hinh && $row_h = $res_hinh->fetch_assoc()) {
        $duongdan_hinh = "images/" . $row_h['hinh'];
        if (!empty($row_h['hinh']) && file_exists($duongdan_hinh)) {
            @unlink($duongdan_hinh);
        }
    }
    if ($conn->query("DELETE FROM SANPHAM WHERE idsp = '$id_xoa' LIMIT 1")) {
        echo '<script>alert("Xóa sản phẩm thành công!"); window.location="quantri.php";</script>';
        exit();
    } else {
        $thongbao = "Xóa sản phẩm không thành công!";
    }
}

// 2. XỬ LÝ THÊM SẢN PHẨM (Bài 7.2a)
if (isset($_POST['btnThem'])) {
    $id_congty = $_POST['congty'];
    $ten = $_POST['txtten'];
    $gia = $_POST['txtgia'];
    $mota = $_POST['txtmota'];
    
    $name = $_FILES['myfile']['name'];
    $tmp_name = $_FILES['myfile']['tmp_name'];

    if ($name != '') {
        move_uploaded_file($tmp_name, "images/" . $name);
    }

    $sql_add = "INSERT INTO SANPHAM (tensp, gia, mota, hinh, giamgia, idcty) 
                VALUES ('$ten', '$gia', '$mota', '$name', 0, '$id_congty')";
    if ($conn->query($sql_add)) {
        $thongbao = "Thêm sản phẩm thành công!";
    } else {
        $thongbao = "Thêm sản phẩm không thành công!";
    }
}

// 3. XỬ LÝ SỬA SẢN PHẨM (Bài 7.2c)
if (isset($_POST['btnSua'])) {
    $idsp = (int)$_POST['txtid'];
    $id_congty = $_POST['congty'];
    $ten = $_POST['txtten'];
    $gia = $_POST['txtgia'];
    $mota = $_POST['txtmota'];

    $name = $_FILES['myfile']['name'];
    $tmp_name = $_FILES['myfile']['tmp_name'];

    if ($idsp > 0) {
        if ($name != '') {
            move_uploaded_file($tmp_name, "images/" . $name);
            $sql_up = "UPDATE SANPHAM SET tensp='$ten', gia='$gia', mota='$mota', hinh='$name', idcty='$id_congty' WHERE idsp='$idsp'";
        } else {
            $sql_up = "UPDATE SANPHAM SET tensp='$ten', gia='$gia', mota='$mota', idcty='$id_congty' WHERE idsp='$idsp'";
        }

        if ($conn->query($sql_up)) {
            echo '<script>alert("Sửa sản phẩm thành công!"); window.location="quantri.php";</script>';
            exit();
        } else {
            $thongbao = "Sửa sản phẩm không thành công!";
        }
    } else {
        $thongbao = "Vui lòng bấm chọn 1 sản phẩm ở bảng bên dưới trước khi sửa!";
    }
}

// Lấy thông tin sản phẩm để đổ lên form khi bấm vào dòng để sửa
$sp_chon = array('idsp' => '', 'idcty' => '', 'tensp' => '', 'gia' => '', 'mota' => '');
if (isset($_GET['id'])) {
    $id_edit = (int)$_GET['id'];
    $res_edit = $conn->query("SELECT * FROM SANPHAM WHERE idsp = '$id_edit' LIMIT 1");
    if ($res_edit && $res_edit->num_rows > 0) {
        $sp_chon = $res_edit->fetch_assoc();
    }
}

// Lấy danh sách công ty cho combobox
$res_cty = $conn->query("SELECT * FROM CONGTY ORDER BY tencty ASC");

// Lấy danh sách toàn bộ sản phẩm hiển thị ra bảng
$res_sp = $conn->query("SELECT * FROM SANPHAM ORDER BY idsp DESC");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản Lý Sản Phẩm</title>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td align="left" valign="middle">Xin chào Admin: <strong><?php echo $_SESSION['user']; ?></strong></td>
        <td align="right" valign="middle">
            <a href="index.php">Trang Chủ</a>
        </td>
    </tr>
</table>

<!-- FORM QUẢN LÝ SẢN PHẨM -->
<form id="form1" name="form1" method="post" action="quantri.php" enctype="multipart/form-data">
    <input type="hidden" name="txtid" value="<?php echo $sp_chon['idsp']; ?>" />
    <table width="700" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
            <td colspan="2" align="center" valign="middle"><strong>QUẢN LÝ SẢN PHẨM</strong></td>
        </tr>
        <tr>
            <td width="160" align="left" valign="middle">Công ty cung cấp</td>
            <td align="left" valign="middle">
                <select name="congty" required>
                    <option value="">-- Chọn công ty --</option>
                    <?php
                    if ($res_cty && $res_cty->num_rows > 0) {
                        while ($cty = $res_cty->fetch_assoc()) {
                            $selected = ($cty['idcty'] == $sp_chon['idcty']) ? "selected" : "";
                            echo "<option value='" . $cty['idcty'] . "' $selected>" . $cty['tencty'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left" valign="middle">Nhập tên sản phẩm</td>
            <td align="left" valign="middle"><input name="txtten" type="text" size="50" value="<?php echo $sp_chon['tensp']; ?>" required /></td>
        </tr>
        <tr>
            <td align="left" valign="middle">Nhập giá</td>
            <td align="left" valign="middle"><input name="txtgia" type="number" size="50" value="<?php echo $sp_chon['gia']; ?>" required /></td>
        </tr>
        <tr>
            <td align="left" valign="middle">Mô tả</td>
            <td align="left" valign="middle"><textarea name="txtmota" cols="50" rows="3"><?php echo $sp_chon['mota']; ?></textarea></td>
        </tr>
        <tr>
            <td align="left" valign="middle">Hình đại diện</td>
            <td align="left" valign="middle"><input type="file" name="myfile" /></td>
        </tr>
        <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">
                <input type="submit" name="btnThem" value="Thêm sản phẩm" />
                <input type="submit" name="btnSua" value="Sửa sản phẩm" />
            </td>
        </tr>
    </table>
</form>

<?php if ($thongbao != ""): ?>
    <p align="center"><strong><font color="#FF0000"><?php echo $thongbao; ?></font></strong></p>
<?php endif; ?>

<!-- BẢNG DANH SÁCH SẢN PHẨM -->
<table width="700" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td width="50" align="center" valign="middle"><strong>STT</strong></td>
        <td width="200" align="center" valign="middle"><strong>Tên SP</strong></td>
        <td width="80" align="center" valign="middle"><strong>Giá</strong></td>
        <td align="center" valign="middle"><strong>Mô tả</strong></td>
        <td width="70" align="center" valign="middle"><strong>Thao tác</strong></td>
    </tr>
    <?php
    if ($res_sp && $res_sp->num_rows > 0) {
        $stt = 1;
        while ($row = $res_sp->fetch_assoc()) {
            ?>
            <tr>
                <td align="center" valign="middle"><a href="?id=<?php echo $row['idsp']; ?>"><?php echo $stt++; ?></a></td>
                <td align="left" valign="middle"><a href="?id=<?php echo $row['idsp']; ?>"><?php echo $row['tensp']; ?></a></td>
                <td align="center" valign="middle"><a href="?id=<?php echo $row['idsp']; ?>"><?php echo number_format($row['gia'], 0, ',', '.'); ?></a></td>
                <td align="left" valign="middle"><a href="?id=<?php echo $row['idsp']; ?>"><?php echo $row['mota']; ?></a></td>
                <td align="center" valign="middle">
                    <a href="?xoa=<?php echo $row['idsp']; ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">Xóa</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='5' align='center'>Chưa có sản phẩm nào.</td></tr>";
    }
    ?>
</table>
</body>
</html>
