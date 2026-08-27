<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3.2 - Upload và đổi tên file ảnh</title>
</head>
<body>
    <h2>Upload File Ảnh, Giới Hạn Dung Lượng và Đổi Tên Tự Động</h2>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Chọn file ảnh (tối đa 2MB):</label>
        <input type="file" name="file" required>
        <input type="submit" name="sbupload" value="Upload file">
    </form>
    <hr>

    <?php
    // Bước 1: Kiểm tra xem người dùng đã nhấn nút Upload hay chưa
    if (isset($_POST["sbupload"]) && isset($_FILES["file"])) {
        
        // Gán mảng thông tin file vào một biến để code ngắn gọn, dễ đọc
        $file = $_FILES["file"];

        // Bước 2: Kiểm tra mã lỗi upload (error > 0 nghĩa là có sự cố xảy ra)
        if ($file["error"] > 0) {
            echo "<p style='color:red;'>Lỗi trong quá trình upload! Mã lỗi: " . $file["error"] . "</p>";
        } else {
            
            // Bước 3: Kiểm tra dung lượng file (Đơn vị tính: Byte; 2MB = 2 * 1024 * 1024 Bytes)
            $max_size = 2 * 1024 * 1024; // 2.097.152 bytes
            if ($file["size"] > $max_size) {
                echo "<p style='color:red;'>Lỗi: Dung lượng file vượt quá giới hạn 2MB!</p>";
            } else {
                
                // Bước 4: Tách tên gốc và phần mở rộng (đuôi file) bằng hàm pathinfo()
                $original_name = $file["name"];
                // PATHINFO_FILENAME: Lấy tên file không kèm đuôi (Ví dụ: 'anhtest.jpg' -> 'anhtest')
                $file_name_only = pathinfo($original_name, PATHINFO_FILENAME);
                // PATHINFO_EXTENSION: Lấy phần đuôi (Ví dụ: 'jpg'), chuyển thành chữ thường bằng strtolower()
                $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

                // Bước 5: Tạo tên file mới tránh trùng đè: <tên_gốc>_<số_ngẫu_nhiên_100_999>.<đuôi>
                // Hàm rand(100, 999) trả về một số ngẫu nhiên từ 100 đến 999
                $new_file_name = $file_name_only . "_" . rand(100, 999) . "." . $ext;
                
                // Đường dẫn thư mục đích và đường dẫn lưu file hoàn chỉnh
                $target_dir = "upload/";
                $target_path = $target_dir . $new_file_name;

                // Tự động tạo thư mục 'upload/' nếu chưa tồn tại
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Bước 6: Di chuyển file từ thư mục tạm (tmp_name) sang thư mục lưu trữ của website
                // Hàm move_uploaded_file() trả về true nếu thành công, false nếu thất bại
                if (move_uploaded_file($file["tmp_name"], $target_path)) {
                    
                    // Hiển thị các thông tin của file vừa upload
                    echo "<h3>Kết quả sau khi Upload thành công:</h3>";
                    echo "<b>Tên file ban đầu:</b> " . htmlspecialchars($original_name) . "<br>";
                    echo "<b>Tên file thay đổi:</b> " . htmlspecialchars($new_file_name) . "<br>";
                    echo "<b>Kích thước:</b> " . round($file["size"] / 1024) . " KB<br>";
                    echo "<b>Loại file (MIME):</b> " . htmlspecialchars($file["type"]) . "<br>";
                    echo "<b>Tên file tạm trên server:</b> " . htmlspecialchars($file["tmp_name"]) . "<br><br>";

                    // Bước 7: Kiểm tra nếu là file ảnh thì hiển thị thẻ <img> xem trước
                    $allow_ext = array("png", "jpg", "jpeg", "gif");
                    // in_array(): Kiểm tra đuôi $ext có nằm trong danh sách $allow_ext hay không
                    if (in_array($ext, $allow_ext)) {
                        echo "<b>Hình ảnh sau khi upload:</b><br>";
                        echo "<img src='" . $target_path . "' width='250' style='border:1px solid #ccc; padding:5px; margin-top:5px;'><br>";
                    } else {
                        echo "<i>Không phải file ảnh (không hỗ trợ hiển thị xem trước).</i>";
                    }
                } else {
                    echo "<p style='color:red;'>Không thể lưu file vào thư mục đích! Kiểm tra quyền ghi thư mục.</p>";
                }
            }
        }
    }
    ?>
</body>
</html>
