<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo if/else</title>
</head>
<body>
    <h1>Demo if/else</h1>

    <!-- Form gửi dữ liệu về chính file này bằng method post -->
    <form method="post">
        <button type="submit" name="chon" value="A">Nút A</button>
        <button type="submit" name="chon" value="B">Nút B</button>
    </form>

    <?php
    // Kiểm tra xem người dùng đã bấm nút chưa
    if (isset($_POST['chon'])) {
        // Lấy giá trị nút đã bấm
        $chon = $_POST['chon'];

        // Dùng if/else để xử lý lựa chọn
        if ($chon == 'A') {
            echo '<p>Bạn vừa bấm nút A</p>';
        } else if ($chon == 'B') {
            echo '<p>Bạn vừa bấm nút B</p>';
        } else {
            echo '<p>Lựa chọn không hợp lệ</p>';
        }
    } else {
        // Trường hợp chưa bấm nút nào
        echo '<p>Vui lòng bấm một nút.</p>';
    }
    ?>
</body>
</html>
