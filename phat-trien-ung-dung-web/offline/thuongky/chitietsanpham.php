<?php
include 'config.php';

$idsp = isset($_GET['id']) ? $_GET['id'] : 0;

// Truy vấn chi tiết sản phẩm kèm tên công ty
$sql = "SELECT sp.*, c.tencty 
        FROM SANPHAM sp 
        LEFT JOIN CONGTY c ON sp.idcty = c.idcty 
        WHERE sp.idsp = '$idsp' LIMIT 1";
$result = $conn->query($sql);
$sp = $result->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chi Tiết Sản Phẩm</title>
</head>

<body>
<?php if ($sp): ?>
    <form id="form1" name="form1" method="post" action="dathang.php">
        <input type="hidden" name="idsp" value="<?php echo $sp['idsp']; ?>" />
        <table width="550" border="1" align="center" cellpadding="10" cellspacing="0">
            <tr>
                <td colspan="2" align="center" valign="middle"><strong>CHI TIẾT SẢN PHẨM</strong></td>
            </tr>
            <tr>
                <td width="215" rowspan="5" align="center" valign="middle">
                    <img src="<?php echo !empty($sp['hinh']) ? 'images/' . $sp['hinh'] : 'images/default.jpg'; ?>" alt="Hình" width="180" />
                </td>
                <td align="left" valign="middle"><strong>Tên SP:</strong> <?php echo $sp['tensp']; ?></td>
            </tr>
            <tr>
                <td align="left" valign="middle"><strong>Công ty:</strong> <?php echo $sp['tencty']; ?></td>
            </tr>
            <tr>
                <td align="left" valign="middle"><strong>Mô tả:</strong> <?php echo $sp['mota']; ?></td>
            </tr>
            <tr>
                <td align="left" valign="middle"><strong>Giá:</strong> <strong><font color="#FF0000"><?php echo number_format($sp['gia'], 0, ',', '.'); ?> USD</font></strong></td>
            </tr>
            <tr>
                <td align="left" valign="middle">
                    <strong>Số lượng:</strong>
                    <input name="txtsoluong" type="number" value="1" min="1" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" valign="middle">
                    <input type="submit" name="sbDathang" value="Thêm Vào Giỏ Hàng" />
                    <br /><br />
                    <a href="index.php">&larr; Quay lại trang chủ</a>
                </td>
            </tr>
        </table>
    </form>
<?php else: ?>
    <p align="center">Sản phẩm không tồn tại! <a href="index.php">Quay lại trang chủ</a></p>
<?php endif; ?>
</body>
</html>
