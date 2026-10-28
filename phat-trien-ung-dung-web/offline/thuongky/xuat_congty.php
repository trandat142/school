<?php

include 'config.php';

// Câu lệnh SQL lấy dữ liệu công ty
$sql = "SELECT idcty, tencty, diachi, dienthoai, fax FROM CONGTY";
$result = $conn->query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh Sách Công Ty</title>
</head>

<body>
<p><a href="index.php">&larr; Quay lại Trang Chủ (Menu)</a></p>
<h2>Danh sách các công ty cung cấp sản phẩm</h2>
<table width="100%" border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td align="left" valign="middle"><strong>ID Cty</strong></td>
        <td align="left" valign="middle"><strong>Tên công ty</strong></td>
        <td align="left" valign="middle"><strong>Địa chỉ</strong></td>
        <td align="left" valign="middle"><strong>Điện thoại</strong></td>
        <td align="left" valign="middle"><strong>Fax</strong></td>
    </tr>
    <?php
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["idcty"] . "</td>";
            echo "<td>" . $row["tencty"] . "</td>";
            echo "<td>" . $row["diachi"] . "</td>";
            echo "<td>" . $row["dienthoai"] . "</td>";
            echo "<td>" . $row["fax"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Không có dữ liệu công ty nào.</td></tr>";
    }
    $conn->close();
    ?>
</table>
</body>
</html>
