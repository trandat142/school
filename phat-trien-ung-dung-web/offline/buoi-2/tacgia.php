<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo bộ mã UTF-8 để hiển thị tiếng Việt -->
    <meta charset="UTF-8">

    <!-- Tiêu đề hiển thị trên tab trình duyệt -->
    <title>Danh sách tác giả</title>
</head>
<body>
    <!-- Tiêu đề chính của trang -->
    <h2>Danh sách tên tác giả</h2>

    <!-- Danh sách các tác giả -->
    <ul>
        <!--
            Khi bấm vào An, trình duyệt sẽ mở thongtin.php.
            Đồng thời truyền 2 biến qua URL:
            ten=An và tuoi=20.
        -->
        <li><a href="thongtin.php?ten=An&tuoi=20">An</a></li>

        <!-- Truyền biến ten=Tài và tuoi=21 sang trang thongtin.php -->
        <li><a href="thongtin.php?ten=Tài&tuoi=21">Tài</a></li>

        <!-- Truyền biến ten=Hải và tuoi=22 sang trang thongtin.php -->
        <li><a href="thongtin.php?ten=Hải&tuoi=22">Hải</a></li>
    </ul>
</body>
</html>
