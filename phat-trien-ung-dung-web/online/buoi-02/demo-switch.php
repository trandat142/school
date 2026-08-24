<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo switch</title>
</head>
<body>
    <h1>Demo switch</h1>

    <!-- Form gửi dữ liệu về chính file này bằng method post -->
    <form method="post">
        <button type="submit" name="chon" value="A">Nút A</button>
        <button type="submit" name="chon" value="B">Nút B</button>
    </form>

    <?php
    // Kiểm tra người dùng đã bấm nút chưa
    if (isset($_POST['chon'])) {
        // Lấy giá trị nút đã bấm
        $chon = $_POST['chon'];

        // Dùng switch để xử lý lựa chọn
        switch ($chon) {
            case 'A':
                echo '<p>Bạn vừa bấm nút A</p>';
                break;

            case 'B':
                echo '<p>Bạn vừa bấm nút B</p>';
                break;

            default:
                echo '<p>Lựa chọn không hợp lệ</p>';
                break;
        }
    } else {
        // Trường hợp chưa bấm nút nào
        echo '<p>Vui lòng bấm một nút.</p>';
    }
    ?>
</body>
</html>
