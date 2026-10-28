<?php
session_start();
include 'config.php';

// Lấy idcty nếu người dùng bấm chọn công ty ở menu bên trái
$idcty = isset($_GET['idcty']) ? $_GET['idcty'] : '';

// 1. Lấy danh sách công ty để làm menu
$sql_cty = "SELECT * FROM CONGTY ORDER BY tencty ASC";
$res_cty = $conn->query($sql_cty);

// 2. Lấy danh sách sản phẩm (nếu chọn công ty nào thì lọc theo công ty đó)
if (!empty($idcty)) {
    $sql_sp = "SELECT * FROM SANPHAM WHERE idcty = '$idcty' ORDER BY gia ASC";
} else {
    $sql_sp = "SELECT * FROM SANPHAM ORDER BY gia ASC";
}
$res_sp = $conn->query($sql_sp);

// Kiểm tra xem đã đăng nhập chưa và có phải là Admin (phanquyen == 1) không
$is_admin = (isset($_SESSION['phanquyen']) && $_SESSION['phanquyen'] == 1);
$is_logged = isset($_SESSION['user']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang Chủ - Cửa Hàng Smartphone</title>
<script>
    function checkAdmin(isAdmin) {
        if (!isAdmin) {
            alert("Bạn là tài khoản thường, không có quyền truy cập trang quản lý sản phẩm!");
            return false; // Chặn không cho chuyển trang, giữ nguyên ở trang index
        }
        return true; // Cho phép Admin vào quantri.php
    }
</script>
</head>

<body>
<table width="1000" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="2" align="center" valign="middle"><h2>BANNER WEBSITE - CỬA HÀNG SMARTPHONE</h2></td>
    </tr>
    <tr>
        <!-- Menu danh mục công ty & Quản trị (Bên trái) -->
        <td width="220" align="left" valign="top">
            <!-- Hiển thị trạng thái đăng nhập -->
            <?php if ($is_logged): ?>
                Xin chào: <strong><?php echo $_SESSION['user']; ?></strong><br />
                (Quyền: <?php echo $_SESSION['phanquyen'] == 1 ? 'Admin' : 'Khách hàng'; ?>)<br />
                <a href="dangxuat.php">Đăng xuất</a>
            <?php else: ?>
                Bạn chưa đăng nhập.<br />
                <a href="login.php">Đăng nhập</a>
            <?php endif; ?>
            <hr />

            <strong>MENU</strong>
            <ul>
                <li><a href="index.php">Tất cả sản phẩm</a></li>
                <?php
                if ($res_cty && $res_cty->num_rows > 0) {
                    while ($cty = $res_cty->fetch_assoc()) {
                        echo "<li><a href='index.php?idcty=" . $cty['idcty'] . "'>" . $cty['tencty'] . "</a></li>";
                    }
                }
                ?>
            </ul>
            <hr />

            <strong>QUẢN TRỊ (CHƯƠNG 7)</strong>
            <ul>
                <!-- Kiểm tra phân quyền trực tiếp khi bấm nút -->
                <li><a href="quantri.php" onclick="return checkAdmin(<?php echo $is_admin ? 'true' : 'false'; ?>);">Quản lý sản phẩm</a></li>
            </ul>
        </td>

        <!-- Danh sách sản phẩm (Bên phải), mỗi dòng 4 sản phẩm -->
        <td align="left" valign="top">
            <?php
            if ($res_sp && $res_sp->num_rows > 0) {
                $dem = 0;
                echo '<table width="100%" border="0" cellpadding="5" cellspacing="0">';
                while ($sp = $res_sp->fetch_assoc()) {
                    $hinh = !empty($sp['hinh']) ? "images/" . $sp['hinh'] : 'images/default.jpg';
                    if ($dem % 4 == 0) {
                        echo '<tr>';
                    }
                    ?>
                    <td width="25%" align="center" valign="top">
                        <a href="chitietsanpham.php?id=<?php echo $sp['idsp']; ?>">
                            <img src="<?php echo $hinh; ?>" alt="<?php echo $sp['tensp']; ?>" width="120" border="0" />
                        </a><br />
                        <a href="chitietsanpham.php?id=<?php echo $sp['idsp']; ?>"><strong><?php echo $sp['tensp']; ?></strong></a><br />
                        <em><font color="#FF0000">Giá: <?php echo number_format($sp['gia'], 0, ',', '.'); ?> USD</font></em>
                    </td>
                    <?php
                    $dem++;
                    if ($dem % 4 == 0) {
                        echo '</tr>';
                    }
                }
                // Bù các ô trống để dòng cuối đủ 4 cột
                if ($dem % 4 != 0) {
                    while ($dem % 4 != 0) {
                        echo '<td width="25%">&nbsp;</td>';
                        $dem++;
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "<p>Không có sản phẩm nào thuộc công ty này!</p>";
            }
            ?>
        </td>
    </tr>
</table>
</body>
</html>
