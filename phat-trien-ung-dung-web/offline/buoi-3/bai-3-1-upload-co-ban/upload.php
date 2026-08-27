<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3.1 - Upload cơ bản</title>
</head>
<body>
    <h2>Form Upload File Cơ Bản</h2>

    <!-- 
      LƯU Ý QUAN TRỌNG CHO FORM UPLOAD FILE:
      1. method="POST": Bắt buộc dùng POST vì dữ liệu file lớn, không được dùng GET.
      2. enctype="multipart/form-data": Bắt buộc phải có để trình duyệt đóng gói và gửi file nhị phân lên server.
         Nếu thiếu thuộc tính này, mảng $_FILES phía PHP sẽ bị rỗng hoàn toàn!
    -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <!-- Input chọn file: type="file", name="file" dùng làm khóa truy cập trong PHP: $_FILES['file'] -->
        <label>Chọn file từ máy tính:</label>
        <input type="file" name="file" required>
        
        <!-- Nút submit gửi form lên server -->
        <input type="submit" name="sbupload" value="Upload file">
    </form>

    <?php
    // Kiểm tra xem người dùng đã nhấn nút Submit (name="sbupload") hay chưa
    if (isset($_POST["sbupload"])) {
        echo "<h3>Kết quả sau khi Upload file:</h3>";

        // Thẻ <pre> trong HTML giúp giữ nguyên định dạng xuống dòng và thụt lề khi in mảng
        echo "<pre>";
        
        // var_dump(): Hàm in chi tiết cấu trúc, kiểu dữ liệu và giá trị của biến
        // $_FILES["file"]: Chứa mảng thông tin file vừa tải lên (name, type, tmp_name, size, error)
        var_dump($_FILES["file"]);
        
        echo "</pre>";
    }
    ?>
</body>
</html>
