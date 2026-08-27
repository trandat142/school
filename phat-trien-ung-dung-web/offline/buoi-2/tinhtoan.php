<?php
// Gọi file clspheptinh.php để sử dụng class pheptinh
include "clspheptinh.php";

// Tạo biến $ketqua ban đầu là rỗng để lát nữa chứa kết quả tính toán
$ketqua = "";

/*
    Kiểm tra người dùng đã bấm nút Tính hay chưa.
    Nút Tính có name="sbTinh", nên PHP kiểm tra bằng $_POST["sbTinh"].
*/
if (isset($_POST["sbTinh"])) {
    // Lấy số thứ nhất từ ô input có name="txtso1"
    $so1 = $_POST["txtso1"];

    // Lấy số thứ hai từ ô input có name="txtso2"
    $so2 = $_POST["txtso2"];

    // Lấy phép tính mà người dùng đã chọn trong thẻ select
    $pheptinhchon = $_POST["pheptinh"];

    // Tạo đối tượng từ class pheptinh để gọi các hàm cộng, trừ, nhân, chia
    $pt = new pheptinh();

    /*
        switch case dùng để kiểm tra người dùng chọn phép tính nào.
        Nếu chọn "cong" thì gọi hàm phepcong.
        Nếu chọn "tru" thì gọi hàm pheptru.
        Nếu chọn "nhan" thì gọi hàm phepnhan.
        Nếu chọn "chia" thì gọi hàm phepchia.
    */
    switch ($pheptinhchon) {
        case "cong":
            $ketqua = $pt->phepcong($so1, $so2);
            break;

        case "tru":
            $ketqua = $pt->pheptru($so1, $so2);
            break;

        case "nhan":
            $ketqua = $pt->phepnhan($so1, $so2);
            break;

        case "chia":
            $ketqua = $pt->phepchia($so1, $so2);
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo bộ mã UTF-8 để hiển thị tiếng Việt -->
    <meta charset="UTF-8">

    <!-- Tiêu đề hiển thị trên tab trình duyệt -->
    <title>Tính toán</title>
</head>
<body>
    <!-- Tiêu đề chính của trang -->
    <h2>Thực hiện phép tính</h2>

    <!--
        Form nhập 2 số và chọn phép tính.
        method="post": gửi dữ liệu bằng POST.
        action="": gửi dữ liệu về chính trang tinhtoan.php.
    -->
    <form method="post" action="">
        <!-- Ô nhập số thứ nhất; required bắt buộc người dùng phải nhập -->
        <label>Số thứ nhất:</label>
        <input type="number" name="txtso1" required><br><br>

        <!-- Ô nhập số thứ hai; required bắt buộc người dùng phải nhập -->
        <label>Số thứ hai:</label>
        <input type="number" name="txtso2" required><br><br>

        <!-- Danh sách chọn phép tính -->
        <label>Chọn phép tính:</label>
        <select name="pheptinh">
            <!-- value="cong" là giá trị sẽ được gửi sang PHP khi chọn Cộng -->
            <option value="cong">Cộng</option>

            <!-- value="tru" là giá trị sẽ được gửi sang PHP khi chọn Trừ -->
            <option value="tru">Trừ</option>

            <!-- value="nhan" là giá trị sẽ được gửi sang PHP khi chọn Nhân -->
            <option value="nhan">Nhân</option>

            <!-- value="chia" là giá trị sẽ được gửi sang PHP khi chọn Chia -->
            <option value="chia">Chia</option>
        </select><br><br>

        <!-- Nút submit để gửi form; PHP kiểm tra nút này bằng $_POST["sbTinh"] -->
        <input type="submit" name="sbTinh" value="Tính">
    </form>

    <!-- Hiển thị kết quả tính toán ra màn hình -->
    <h3>Kết quả: <?php echo $ketqua; ?></h3>
</body>
</html>
