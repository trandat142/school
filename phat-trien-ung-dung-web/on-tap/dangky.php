<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Đăng ký</title></head>
<body>
<h2>Đăng ký</h2>
<!-- GỬI: action sang xuly.php. BỌC: có file thì BẮT BUỘC enctype -->
<form method="post" action="xuly.php" enctype="multipart/form-data">
    Email: <input type="email" name="email" required><br>
    Mật khẩu: <input type="password" name="password" required><br>
    Nhập lại: <input type="password" name="repassword" required><br>
    Họ tên: <input type="text" name="hoten" required><br>
    Điện thoại: <input type="text" name="dienthoai" required><br>
    Quê quán:
    <select name="quequan">
        <option value="Hà Nội">Hà Nội</option>
        <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
    </select><br>
    Giới tính:
    <input type="radio" name="gioitinh" value="Nam" checked> Nam
    <input type="radio" name="gioitinh" value="Nữ"> Nữ<br>
    <!-- MẢNG: tên có [] thì nhận được NHIỀU giá trị -->
    Sở thích:
    <input type="checkbox" name="sothich[]" value="Đọc sách"> Đọc sách
    <input type="checkbox" name="sothich[]" value="Du lịch"> Du lịch
    <input type="checkbox" name="sothich[]" value="Âm nhạc"> Âm nhạc<br>
    <!-- ẢNH: lấy bằng $_FILES["anhdaidien"] -->
    Ảnh đại diện: <input type="file" name="anhdaidien" required><br>
    <input type="submit" name="sbdangky" value="Đăng ký">
</form>
</body>
</html>