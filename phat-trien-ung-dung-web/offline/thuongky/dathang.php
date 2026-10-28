<?php
session_start();
include 'config.php';

// Nhận dữ liệu khi bấm Thêm vào giỏ hàng
if (isset($_POST['sbDathang'])) {
    $idsp = $_POST['idsp'];
    $soluong = (int)$_POST['txtsoluong'];

    if (!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = array();
    }

    if (isset($_SESSION['giohang'][$idsp])) {
        $_SESSION['giohang'][$idsp] += $soluong;
    } else {
        $_SESSION['giohang'][$idsp] = $soluong;
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Giỏ Hàng</title>
</head>

<body>
<h2 align="center">GIỎ HÀNG CỦA BẠN</h2>

<?php if (!empty($_SESSION['giohang'])): ?>
    <table width="80%" border="1" align="center" cellpadding="10" cellspacing="0">
        <tr>
            <td align="center" valign="middle"><strong>STT</strong></td>
            <td align="center" valign="middle"><strong>Tên sản phẩm</strong></td>
            <td align="center" valign="middle"><strong>Số lượng</strong></td>
            <td align="center" valign="middle"><strong>Đơn giá</strong></td>
            <td align="center" valign="middle"><strong>Thành tiền</strong></td>
        </tr>
        <?php
        $stt = 1;
        $tongtien = 0;
        foreach ($_SESSION['giohang'] as $id => $sl) {
            $sql = "SELECT * FROM SANPHAM WHERE idsp = '$id'";
            $res = $conn->query($sql);
            if ($row = $res->fetch_assoc()) {
                $thanhtien = $row['gia'] * $sl;
                $tongtien += $thanhtien;
                echo "<tr>";
                echo "<td align='center' valign='middle'>$stt</td>";
                echo "<td align='left' valign='middle'>" . $row['tensp'] . "</td>";
                echo "<td align='center' valign='middle'>$sl</td>";
                echo "<td align='center' valign='middle'>" . number_format($row['gia'], 0, ',', '.') . " USD</td>";
                echo "<td align='center' valign='middle'>" . number_format($thanhtien, 0, ',', '.') . " USD</td>";
                echo "</tr>";
                $stt++;
            }
        }
        ?>
        <tr>
            <td colspan="4" align="right" valign="middle"><strong>Tổng tiền thanh toán:</strong></td>
            <td align="center" valign="middle"><strong><font color="#FF0000"><?php echo number_format($tongtien, 0, ',', '.'); ?> USD</font></strong></td>
        </tr>
    </table>
    <p align="center"><a href="index.php">&larr; Tiếp tục mua sản phẩm khác</a></p>
<?php else: ?>
    <p align="center">Giỏ hàng trống! <a href="index.php">Trở về trang chủ</a></p>
<?php endif; ?>
</body>
</html>
