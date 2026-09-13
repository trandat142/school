<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo Vòng Lặp trong PHP</title>
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
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Demo Các Loại Vòng Lặp trong PHP</h1>

    <!-- 1. VÒNG LẶP FOR -->
    <div class="box">
        <h2>1. Vòng lặp for: Bảng cửu chương 5</h2>
        <?php
        $so = 5;
        echo '<ul>';
        for ($i = 1; $i <= 10; $i++) {
            $ketQua = $so * $i;
            echo '<li>' . $so . ' x ' . $i . ' = ' . $ketQua . '</li>';
        }
        echo '</ul>';
        ?>
    </div>

    <!-- 2. VÒNG LẶP WHILE -->
    <div class="box">
        <h2>2. Vòng lặp while: Đếm số chẵn từ 2 đến 10</h2>
        <?php
        $dem = 2;
        echo '<p>';
        while ($dem <= 10) {
            echo $dem . ' ';
            $dem += 2; // Tăng bước nhảy để tránh vòng lặp vô tận
        }
        echo '</p>';
        ?>
    </div>

    <!-- 3. VÒNG LẶP DO...WHILE -->
    <div class="box">
        <h2>3. Vòng lặp do...while: Chạy ít nhất 1 lần</h2>
        <?php
        $k = 100;
        echo '<p>';
        do {
            // Khối lệnh này sẽ chạy 1 lần dù điều kiện sai ngay từ đầu ($k <= 5)
            echo 'Giá trị k hiện tại: ' . $k . ' (được in ít nhất 1 lần)';
            $k++;
        } while ($k <= 5);
        echo '</p>';
        ?>
    </div>

    <!-- 4. VÒNG LẶP FOREACH -->
    <div class="box">
        <h2>4. Vòng lặp foreach: Xuất bảng danh sách sản phẩm</h2>
        <?php
        // Khai báo mảng sản phẩm
        $danhSachSanPham = [
            ['ma' => 'SP01', 'ten' => 'Bàn phím cơ AKKO', 'gia' => 1250000, 'soLuong' => 15],
            ['ma' => 'SP02', 'ten' => 'Chuột Logitech G102', 'gia' => 450000, 'soLuong' => 30],
            ['ma' => 'SP03', 'ten' => 'Tai nghe Kingston HyperX', 'gia' => 990000, 'soLuong' => 8],
            ['ma' => 'SP04', 'ten' => 'Lót chuột cỡ lớn', 'gia' => 120000, 'soLuong' => 50],
        ];
        ?>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã SP</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá (VNĐ)</th>
                    <th>Số lượng tồn</th>
                    <th>Thành tiền (VNĐ)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                $tongTien = 0;

                // Dùng foreach duyệt qua từng sản phẩm trong mảng
                foreach ($danhSachSanPham as $sp) {
                    $thanhTien = $sp['gia'] * $sp['soLuong'];
                    $tongTien += $thanhTien;

                    echo '<tr>';
                    echo '<td>' . $stt++ . '</td>';
                    echo '<td>' . $sp['ma'] . '</td>';
                    echo '<td>' . $sp['ten'] . '</td>';
                    echo '<td>' . number_format($sp['gia'], 0, ',', '.') . '</td>';
                    echo '<td>' . $sp['soLuong'] . '</td>';
                    echo '<td>' . number_format($thanhTien, 0, ',', '.') . '</td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                    <td colspan="5" style="text-align: right; font-weight: bold;">Tổng giá trị kho hàng:</td>
                    <td style="font-weight: bold; color: #d9534f;">
                        <?php echo number_format($tongTien, 0, ',', '.') . ' VNĐ'; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
