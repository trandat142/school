<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3.3 - Upload nhiều file đồng thời</title>
    <style>
        /* CSS tạo layout hiển thị các khung thẻ (card) nằm ngang cạnh nhau */
        .file-card {
            float: left;
            border: 1px solid #c9c9c9;
            padding: 10px;
            width: 220px;
            min-height: 320px;
            margin: 10px 10px 10px 0;
            font-family: Arial, sans-serif;
            font-size: 13px;
            background-color: #fcfcfc;
            border-radius: 4px;
        }
        .file-card img {
            max-width: 200px;
            max-height: 180px;
            display: block;
            margin-top: 10px;
            border: 1px solid #e0e0e0;
        }
        .clear {
            clear: both; /* Xóa float sau danh sách các card */
        }
    </style>
</head>
<body>
    <h2>Upload Cùng Lúc Nhiều File (Multiple Upload)</h2>

    <!-- 
      ĐIỂM KHÁC BIỆT KHI UPLOAD NHIỀU FILE:
      1. name="file[]": Cặp dấu ngoặc vuông [] báo hiệu cho PHP gom dữ liệu thành mảng.
      2. multiple: Thuộc tính cho phép người dùng nhấn giữ Ctrl/Shift để chọn nhiều file.
    -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Chọn một hoặc nhiều file:</label>
        <input type="file" name="file[]" multiple required>
        <input type="submit" name="sbupload" value="Upload file">
    </form>
    <hr>

    <?php
    if (isset($_POST["sbupload"]) && isset($_FILES["file"])) {
        echo "<h3>Kết quả sau khi Upload:</h3>";
        
        // count(): Đếm tổng số lượng file mà người dùng đã gửi lên
        $total_files = count($_FILES["file"]["name"]);
        $target_dir = "upload/";

        // Tự động tạo thư mục upload nếu chưa tồn tại
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Vòng lặp for duyệt qua từng file theo chỉ số $i
        for ($i = 0; $i < $total_files; $i++) {
            
            // Bỏ qua nếu phần tử không có tên file
            if (empty($_FILES["file"]["name"][$i])) continue;

            echo '<div class="file-card">';
            
            // Lấy thông tin của file thứ $i trong mảng đa chiều $_FILES
            $original_name = $_FILES["file"]["name"][$i];      // Tên file gốc
            $tmp_name      = $_FILES["file"]["tmp_name"][$i];  // Đường dẫn file tạm
            $file_size     = $_FILES["file"]["size"][$i];      // Dung lượng (bytes)
            $file_type     = $_FILES["file"]["type"][$i];      // Loại MIME
            $file_error    = $_FILES["file"]["error"][$i];     // Mã lỗi upload

            // Tách tên và phần mở rộng
            $name_only = pathinfo($original_name, PATHINFO_FILENAME);
            $ext       = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

            // Sinh tên mới ngẫu nhiên
            $new_name    = $name_only . "_" . rand(100, 999) . "." . $ext;
            $target_path = $target_dir . $new_name;

            // In thông tin chi tiết vào từng khung card
            echo "<b>Tên file ban đầu:</b> " . htmlspecialchars($original_name) . "<br>";
            echo "<b>Tên file thay đổi:</b> " . htmlspecialchars($new_name) . "<br>";
            echo "<b>Kích thước:</b> " . round($file_size / 1024) . " KB<br>";
            echo "<b>Loại file:</b> " . htmlspecialchars($file_type) . "<br>";
            echo "<b>Tên file tạm:</b> " . htmlspecialchars($tmp_name) . "<br><br>";

            // Kiểm tra lỗi của từng file
            if ($file_error > 0) {
                echo "<span style='color:red;'>Lỗi khi upload! (Mã: $file_error)</span>";
            } elseif ($file_size > 2 * 1024 * 1024) {
                // Kiểm tra giới hạn 2MB cho từng file
                echo "<span style='color:red;'>Lỗi: Dung lượng vượt quá 2MB!</span>";
            } else {
                // Di chuyển file thứ $i vào thư mục upload
                if (move_uploaded_file($tmp_name, $target_path)) {
                    // Kiểm tra định dạng ảnh để hiển thị hình
                    $allow_ext = array("png", "jpg", "jpeg", "gif");
                    if (in_array($ext, $allow_ext)) {
                        echo "<img src='" . $target_path . "'>";
                    } else {
                        echo "<i>Không phải file ảnh</i>";
                    }
                } else {
                    echo "<span style='color:red;'>Lưu file thất bại!</span>";
                }
            }

            echo '</div>'; // Đóng thẻ .file-card
        }
        
        // Clear float để nội dung phía dưới không bị trôi lên
        echo '<div class="clear"></div>';
    }
    ?>
</body>
</html>
