<?php
// Nạp định nghĩa class ontap từ thư mục classontap
include_once("classontap/clsontap.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upload File</title>
</head>
<body>
    <p>Upload file lên server:</p>
    
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        Chọn file: 
        <input type="file" name="fileField" id="fileField" />
        <input type="submit" name="nut" id="nut" value="Tải lên" />
    </form>

<?php
if (isset($_POST['nut'])) {
    $name = $_FILES['fileField']['name'];
    $tmp_name = $_FILES['fileField']['tmp_name'];
    $folder = 'dulieu'; // Thư mục lưu trữ theo đúng cấu trúc

    $p = new ontap();
    
    switch ($p->uploadfile($name, $tmp_name, $folder)) {
       case 'Tải lên':
    $name = $_FILES['myfile']['name'];
    $tmp_name = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    // Kiểm tra tên file không rỗng và dung lượng lớn hơn 0
    if ($name != '' && $size > 0) {
        if ($p->uploadfile($name, $tmp_name, "dulieu") == 1) {
            echo 'Upload file thành công.';
        } else {
            echo 'Không thành công.';
        }
    } else {
       echo 'Vui lòng chọn file cần upload.';
    }
    break;
    }
}
?>
</body>
</html>