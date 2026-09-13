<?php
// Khai báo các biến lưu thông báo kết quả
$thongBao = '';
$loi = '';
$anhVuaUpload = '';

// Kiểm tra xem người dùng đã nhấn nút Upload chưa
if (isset($_POST['btnUpload'])) {
    // 1. Kiểm tra xem có file nào được gửi lên không
    if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['hinhAnh'];

        // Kiểm tra lỗi hệ thống khi upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $loi = 'Có lỗi xảy ra trong quá trình upload! Mã lỗi: ' . $file['error'];
        } else {
            // 2. Kiểm tra định dạng phần mở rộng của file
            $danhSachDuoiChoPhep = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $duoiFile = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($duoiFile, $danhSachDuoiChoPhep)) {
                $loi = 'Chỉ chấp nhận các định dạng ảnh: JPG, JPEG, PNG, GIF, WEBP!';
            }

            // 3. Kiểm tra kích thước file (giới hạn 2MB = 2 * 1024 * 1024 bytes)
            $kichThuocToiDa = 2 * 1024 * 1024;
            if ($file['size'] > $kichThuocToiDa) {
                $loi = 'Kích thước file quá lớn (' . round($file['size'] / 1024 / 1024, 2) . ' MB)! Tối đa cho phép 2MB.';
            }

            // Nếu không có lỗi nào, tiến hành lưu file
            if (empty($loi)) {
                // Đường dẫn thư mục lưu trữ file
                $thuMucUpload = __DIR__ . '/uploads/';

                // Tạo thư mục nếu chưa tồn tại
                if (!file_exists($thuMucUpload)) {
                    mkdir($thuMucUpload, 0777, true);
                }

                // 4. Đổi tên file ngẫu nhiên để tránh trùng tên và ghi đè
                $tenFileMoi = 'img_' . time() . '_' . rand(1000, 9999) . '.' . $duoiFile;
                $duongDanDich = $thuMucUpload . $tenFileMoi;

                // 5. Di chuyển file từ thư mục tạm thời sang thư mục chính thức
                if (move_uploaded_file($file['tmp_name'], $duongDanDich)) {
                    $thongBao = 'Upload file thành công!';
                    $anhVuaUpload = 'uploads/' . $tenFileMoi;
                } else {
                    $loi = 'Không thể di chuyển file từ thư mục tạm sang thư mục lưu trữ!';
                }
            }
        }
    } else {
        $loi = 'Vui lòng chọn một tập tin trước khi nhấn Upload!';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo Upload File trong PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 650px;
            margin: 0 auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="file"] {
            display: block;
            margin-top: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 18px;
            font-size: 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 16px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .preview-img {
            max-width: 300px;
            max-height: 300px;
            border-radius: 4px;
            margin-top: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Demo Kỹ Thuật Upload File trong PHP</h1>

    <?php if (!empty($thongBao)): ?>
        <div class="alert-success"><?php echo $thongBao; ?></div>
    <?php endif; ?>

    <?php if (!empty($loi)): ?>
        <div class="alert-danger"><?php echo $loi; ?></div>
    <?php endif; ?>

    <!-- Form upload bắt buộc phải có enctype="multipart/form-data" và method="post" -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="hinhAnh">Chọn file ảnh (JPG, PNG, GIF, WEBP &le; 2MB):</label>
            <input type="file" name="hinhAnh" id="hinhAnh" required>
        </div>
        <button type="submit" name="btnUpload">Upload File</button>
    </form>

    <?php if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] !== UPLOAD_ERR_NO_FILE): ?>
        <h2>Thông tin mảng $_FILES['hinhAnh']:</h2>
        <table>
            <thead>
                <tr>
                    <th>Khóa</th>
                    <th>Ý nghĩa</th>
                    <th>Giá trị thực tế</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>name</code></td>
                    <td>Tên gốc file ở client</td>
                    <td><?php echo htmlspecialchars($_FILES['hinhAnh']['name']); ?></td>
                </tr>
                <tr>
                    <td><code>type</code></td>
                    <td>Định dạng MIME</td>
                    <td><?php echo htmlspecialchars($_FILES['hinhAnh']['type']); ?></td>
                </tr>
                <tr>
                    <td><code>tmp_name</code></td>
                    <td>Đường dẫn lưu tạm trên server</td>
                    <td><?php echo htmlspecialchars($_FILES['hinhAnh']['tmp_name']); ?></td>
                </tr>
                <tr>
                    <td><code>size</code></td>
                    <td>Kích thước file (bytes)</td>
                    <td><?php echo number_format($_FILES['hinhAnh']['size']); ?> bytes (~<?php echo round($_FILES['hinhAnh']['size'] / 1024, 2); ?> KB)</td>
                </tr>
                <tr>
                    <td><code>error</code></td>
                    <td>Mã lỗi upload</td>
                    <td><?php echo $_FILES['hinhAnh']['error']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if (!empty($anhVuaUpload)): ?>
        <h2>Ảnh vừa upload thành công:</h2>
        <img src="<?php echo htmlspecialchars($anhVuaUpload); ?>" alt="Ảnh đã upload" class="preview-img">
        <p><small>Đường dẫn: <code><?php echo htmlspecialchars($anhVuaUpload); ?></code></small></p>
    <?php endif; ?>
</div>

</body>
</html>
