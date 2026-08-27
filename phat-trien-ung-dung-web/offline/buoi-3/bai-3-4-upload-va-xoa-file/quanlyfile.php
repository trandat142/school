<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3.4 - Upload và Xóa file đã tải lên</title>
</head>
<body>
    <h2>Quản Lý Upload và Xóa File trên Máy Chủ</h2>

    <!-- Form 1: Dùng để tải file mới lên máy chủ -->
    <form action="quanlyfile.php" method="POST" enctype="multipart/form-data">
        <label>Chọn file cần upload:</label>
        <input type="file" name="file" required>
        <input type="submit" name="sbupload" value="Upload file">
    </form>
    <hr>

    <?php
    $upload_dir = "upload/";

    // Tự động tạo thư mục upload nếu chưa tồn tại
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // ========================================================
    // PHẦN 1: XỬ LÝ KHI NGƯỜI DÙNG TẢI FILE LÊN SERVER
    // ========================================================
    if (isset($_POST["sbupload"]) && isset($_FILES["file"])) {
        $file = $_FILES["file"];
        
        // Kiểm tra không có lỗi tải lên
        if ($file["error"] == 0) {
            // basename(): Lấy tên file gốc an toàn để nối vào đường dẫn đích
            $dest = $upload_dir . basename($file["name"]);
            
            // Di chuyển file từ thư mục tạm sang thư mục upload
            if (move_uploaded_file($file["tmp_name"], $dest)) {
                echo "<p style='color:green;'>Upload file thành công: " . htmlspecialchars($file["name"]) . "</p>";
            } else {
                echo "<p style='color:red;'>Lỗi: Không thể lưu file vào thư mục upload!</p>";
            }
        } else {
            echo "<p style='color:red;'>Lỗi khi tải file lên (Mã lỗi: " . $file["error"] . ")</p>";
        }
    }

    // ========================================================
    // PHẦN 2: XỬ LÝ KHI NGƯỜI DÙNG NHẤN NÚT XÓA FILE
    // ========================================================
    if (isset($_POST["btn_delete"])) {
        // Lấy đường dẫn file cần xóa từ thẻ <input type="hidden"> gửi qua phương thức POST
        $file_to_delete = $_POST["file_path"];
        
        // file_exists(): Kiểm tra xem file vật lý có thực sự tồn tại trên ổ cứng hay không
        if (file_exists($file_to_delete)) {
            // unlink(): Hàm có sẵn của PHP dùng để xóa vĩnh viễn 1 file khỏi máy chủ
            if (unlink($file_to_delete)) {
                echo "<p style='color:green;'>Đã xóa file thành công: " . htmlspecialchars(basename($file_to_delete)) . "</p>";
            } else {
                echo "<p style='color:red;'>Lỗi: Không thể xóa file (kiểm tra quyền truy cập file)!</p>";
            }
        } else {
            echo "<p style='color:red;'>Lỗi: File cần xóa không tồn tại!</p>";
        }
    }

    // ========================================================
    // PHẦN 3: ĐỌC VÀ HIỂN THỊ DANH SÁCH CÁC FILE TRÊN SERVER
    // ========================================================
    echo "<h3>Danh sách file hiện có trên Server:</h3>";
    if (is_dir($upload_dir)) {
        // scandir(): Quét toàn bộ thư mục và trả về mảng danh sách tên các file/thư mục con
        $files = scandir($upload_dir);
        
        echo "<ul>";
        foreach ($files as $f) {
            // Bỏ qua 2 thư mục đặc biệt của hệ điều hành: "." (thư mục hiện tại) và ".." (thư mục cha)
            if ($f != "." && $f != "..") {
                $path = $upload_dir . $f;
                
                echo "<li style='margin-bottom: 8px;'>";
                // filesize(): Lấy dung lượng file theo Byte, chia 1024 để quy đổi ra KB
                echo "<b>" . htmlspecialchars($f) . "</b> (" . round(filesize($path) / 1024) . " KB) ";
                
                // Form nhỏ chứa nút Xóa riêng cho từng file
                echo "<form action='quanlyfile.php' method='POST' style='display:inline;'>";
                // input type="hidden": Lưu ngầm đường dẫn file để truyền sang PHP khi bấm submit
                echo "<input type='hidden' name='file_path' value='" . htmlspecialchars($path) . "'>";
                // onclick confirm: Tạo hộp thoại xác nhận trước khi xóa để tránh bấm nhầm
                echo "<input type='submit' name='btn_delete' value='Xóa' onclick=\"return confirm('Bạn có chắc chắn muốn xóa file này không?');\">";
                echo "</form>";
                echo "</li>";
            }
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
