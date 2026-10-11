<?php
// Nạp file định nghĩa class csdl từ thư mục con myclass/
// Lệnh include giúp chèn toàn bộ nội dung file myclass/clscsdl.php vào đây để sử dụng
include('myclass/clscsdl.php');

// Khởi tạo một đối tượng (object) mới từ class csdl bằng từ khóa new
// Biến $p đại diện cho class csdl, dùng để gọi các hàm bên trong class đó
$p = new csdl();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Khai báo bảng mã UTF-8 để hiển thị tiếng Việt có dấu chuẩn, không bị lỗi font -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh Sách Sinh Viên</title>
</head>

<body>
<?php
/*
 * Gọi hàm xuatbangsinhvien() thông qua đối tượng $p (dùng toán tử ->)
 * Truyền vào câu lệnh truy vấn SQL:
 * - "select * from sinhvien": lấy tất cả các cột dữ liệu từ bảng sinhvien
 * - "order by ten asc": sắp xếp kết quả theo cột "ten" theo thứ tự tăng dần (A -> Z)
 */
$p->xuatbangsinhvien("select * from sinhvien order by ten asc");
?>

<!-- Thẻ <hr /> tạo một đường kẻ ngang để ngăn cách giữa phần Bảng và phần Combobox -->
<hr />

<?php
/*
 * Gọi hàm xuatcomboboxsv() thông qua đối tượng $p (dùng toán tử ->)
 * Truyền vào câu lệnh truy vấn SQL:
 * - Chỉ lấy 4 cột cần thiết: id, masv, hodem, ten từ bảng sinhvien
 * - Sắp xếp theo tên tăng dần từ A -> Z
 */
$p->xuatcomboboxsv("select id, masv, hodem, ten from sinhvien order by ten asc");
?>
</body>
</html>
