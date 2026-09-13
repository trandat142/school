<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo Mảng trong PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .box {
            background: #fff;
            padding: 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        pre {
            background: #272822;
            color: #f8f8f2;
            padding: 12px;
            border-radius: 4px;
            overflow-x: auto;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            background: #17a2b8;
            color: #fff;
            border-radius: 4px;
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <h1>Demo Các Loại Mảng và Hàm Xử Lý Mảng trong PHP</h1>

    <!-- 1. MẢNG CHỈ SỐ (INDEXED ARRAY) -->
    <div class="box">
        <h2>1. Mảng chỉ số (Indexed Array)</h2>
        <?php
        // Khai báo mảng môn học bằng cú pháp []
        $monHoc = ['HTML & CSS', 'JavaScript', 'PHP & MySQL', 'Java Core'];

        // Thêm phần tử mới vào cuối mảng
        $monHoc[] = 'Python';
        array_push($monHoc, 'ReactJS');

        echo '<p>Tổng số môn học: <strong>' . count($monHoc) . ' môn</strong></p>';
        echo '<p>Các môn học hiện có: </p>';
        foreach ($monHoc as $index => $mon) {
            echo '<span class="badge">' . $index . ': ' . $mon . '</span>';
        }
        ?>
    </div>

    <!-- 2. MẢNG KẾT HỢP (ASSOCIATIVE ARRAY) -->
    <div class="box">
        <h2>2. Mảng kết hợp (Associative Array)</h2>
        <?php
        // Mảng kết hợp lưu trữ thông tin sinh viên theo cặp key => value
        $sinhVien = [
            'mssv'     => '20210123',
            'hoTen'    => 'Trần Nguyễn Hoàng Nam',
            'ngaySinh' => '15/08/2003',
            'chuyenNganh' => 'Công nghệ Thông tin',
            'diemTB'   => 8.6
        ];

        echo '<ul>';
        foreach ($sinhVien as $key => $value) {
            echo '<li><strong>' . htmlspecialchars($key) . ':</strong> ' . htmlspecialchars($value) . '</li>';
        }
        echo '</ul>';

        // Kiểm tra xem key có tồn tại trong mảng không
        if (array_key_exists('diemTB', $sinhVien)) {
            $xepLoai = ($sinhVien['diemTB'] >= 8.0) ? 'Giỏi' : 'Khá';
            echo '<p>Xếp loại học lực: <strong>' . $xepLoai . '</strong></p>';
        }
        ?>
    </div>

    <!-- 3. CÁC HÀM XỬ LÝ MẢNG VÀ DEBUG -->
    <div class="box">
        <h2>3. Các hàm xử lý mảng và debug với print_r</h2>
        <?php
        $danhSachQuyen = ['user', 'editor', 'moderator', 'admin'];

        // Kiểm tra quyền tồn tại bằng in_array
        $quyenCanKiemTra = 'admin';
        if (in_array($quyenCanKiemTra, $danhSachQuyen)) {
            echo '<p style="color: green;">Tài khoản có quyền: <strong>' . $quyenCanKiemTra . '</strong></p>';
        } else {
            echo '<p style="color: red;">Không tìm thấy quyền: <strong>' . $quyenCanKiemTra . '</strong></p>';
        }

        echo '<p>Cấu trúc mảng sinh viên khi debug bằng <code>print_r()</code>:</p>';
        echo '<pre>';
        print_r($sinhVien);
        echo '</pre>';
        ?>
    </div>

</body>
</html>
