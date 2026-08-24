# Buổi 02 - PHP, MySQL và cấu trúc điều kiện

## 1. Hành động cần thực hiện

- [ ] Hoàn thành bài demo 2 cấu trúc điều kiện `switch` và `if/else` trong vòng 30 phút.
- [ ] Xem lại video demo giảng viên gửi vào group để luyện tập.
- [ ] Sinh viên học lại nhiều lần hoặc cần hỗ trợ thực hành cần liên hệ giảng viên.
- [ ] Sinh viên IT cần tự build server khi lên báo cáo.
- [ ] Sinh viên công tin có thể thuê host.
- [ ] Cân nhắc thuê host và tên miền nếu muốn triển khai web thực tế.

Chi phí tham khảo giảng viên nhắc:

```text
Host: khoảng 400k/năm
Tên miền: khoảng 200k
```

---

## 2. Điểm danh và lưu ý đầu buổi

Buổi học có điểm danh 2 lớp:

- Công nghệ Thông tin
- Hệ thống Thông tin

Lưu ý quan trọng:

- Những buổi sau có thể không điểm danh thêm sau khi bắt đầu bài học.
- Sinh viên vào trễ nên chủ động nhắn giảng viên nếu cần xác nhận.
- Tài liệu học tập gồm slide bài giảng và quyển bài tập thực hành.
- Quyển bài tập thực hành là tài liệu bắt buộc phải có.

---

## 3. Giới thiệu PHP và MySQL

### Web tĩnh

Web tĩnh thường là trang web chỉ hiển thị nội dung cố định.

Ví dụ:

- HTML
- CSS
- Một ít JavaScript phía trình duyệt

Nội dung không thay đổi theo dữ liệu trong cơ sở dữ liệu.

### Web động

Web động là web có xử lý phía server và thường có kết nối cơ sở dữ liệu.

Giảng viên nhắc cách hiểu đơn giản:

```text
Web động là web có kết nối đến cơ sở dữ liệu.
```

Ví dụ:

- Trang đăng nhập
- Trang sản phẩm lấy từ database
- Trang đặt hàng
- Trang quản lý đơn hàng

### PHP

PHP là ngôn ngữ lập trình phía server.

Đặc điểm:

- Miễn phí.
- Phổ biến trong lập trình web.
- Cạnh tranh với ASP/ASP.NET.
- Chạy được trên Windows và Linux.
- Hỗ trợ Apache, IIS.
- Phù hợp làm website động.

Ưu điểm lớn được nhắc trong buổi học:

```text
Không tốn phí bản quyền
```

### MySQL

MySQL là hệ quản trị cơ sở dữ liệu miễn phí.

Đặc điểm:

- Hỗ trợ câu truy vấn SQL tiêu chuẩn.
- Phù hợp từ dự án nhỏ đến hệ thống lớn.
- Thường dùng chung với PHP.

---

## 4. Môi trường học và triển khai

### WAMP Server

WAMP Server dùng để giả lập server trên máy tính cá nhân.

Trong môn này, WAMP được dùng để học và thi.

### XAMPP

XAMPP có thể dùng khi làm đề tài vì hỗ trợ nhiều và dễ triển khai hơn.

### Host và tên miền

Khi triển khai web thực tế, cần:

- Host
- Tên miền

Sinh viên IT cần biết tự build server khi báo cáo.

---

## 5. Cú pháp PHP cơ bản

Một khối lệnh PHP bắt đầu bằng:

```php
<?php
```

và có thể kết thúc bằng:

```php
?>
```

Ví dụ:

```php
<?php
echo 'hello';
?>
```

Trong file PHP có thể chứa:

- HTML
- PHP script
- JavaScript

Ví dụ:

```php
<html>
<body>
    <?php
    echo 'hello';
    ?>
</body>
</html>
```

---

## 6. Xuất dữ liệu trong PHP

Có thể dùng:

- `echo`
- `print`

Nên ưu tiên dùng `echo`.

Ví dụ:

```php
<?php
echo 'Hello World!';
?>
```

Mỗi câu lệnh PHP thường kết thúc bằng dấu chấm phẩy:

```php
;
```

---

## 7. Comment trong PHP

Comment giúp ghi chú code để sau này đọc lại dễ hiểu.

Comment một dòng:

```php
// Đây là comment một dòng
```

Comment nhiều dòng:

```php
/*
Đây là comment nhiều dòng
Dùng để giải thích đoạn code dài
*/
```

Comment rất quan trọng vì sau vài ngày nhìn lại code có thể quên lý do mình viết dòng đó.

---

## 8. Kinh nghiệm dùng dấu nháy

Giảng viên gợi ý:

- Trong PHP nên dùng dấu nháy đơn `'` khi có thể.
- Dấu nháy đôi `"` thường nhường cho HTML.

Ví dụ:

```php
<?php
echo '<h1>Hello</h1>';
?>
```

Cách này giúp đỡ rối khi PHP in ra HTML.

---

## 9. Biến trong PHP

Biến trong PHP bắt đầu bằng dấu `$`.

Ví dụ:

```php
$myCar = 'Volvo';
$txt = 'Hello World!';
$x = 16;
```

PHP không cần khai báo kiểu dữ liệu trước.

Kiểu dữ liệu được tự nhận khi gán giá trị.

Ví dụ:

```php
$x = 16;          // số nguyên
$txt = 'Hello';   // chuỗi
```

PHP phân biệt chữ hoa và chữ thường:

```php
$y
$Y
```

Hai biến trên là 2 biến khác nhau.

---

## 10. Các loại biến trong PHP

### Local variable

Biến local được khai báo trong hàm.

Chỉ dùng được bên trong hàm đó.

Khi hàm chạy xong, biến local thường được giải phóng.

### Global variable

Biến global được khai báo bên ngoài hàm.

Tồn tại trong quá trình thực thi file.

Nếu dùng không cẩn thận có thể làm code khó kiểm soát.

### Static variable

Biến static khai báo trong hàm nhưng không mất giá trị sau khi hàm chạy xong.

Nó giống local ở chỗ chỉ dùng trong hàm, nhưng khác ở chỗ còn giữ lại giá trị cho lần gọi sau.

### Parameter

Parameter là tham số truyền vào hàm.

Bản chất nó cũng là biến local của hàm.

---

## 11. Xử lý chuỗi trong PHP

### Nối chuỗi

PHP dùng dấu chấm `.` để nối chuỗi.

Ví dụ:

```php
$ho = 'Nguyen';
$ten = 'An';
echo $ho . ' ' . $ten;
```

Khác với JavaScript hoặc ASP thường dùng dấu `+` để nối chuỗi.

### strlen

`strlen()` trả về độ dài chuỗi.

```php
$txt = 'Hello';
echo strlen($txt); // 5
```

### strpos

`strpos()` tìm chuỗi con trong chuỗi cha.

Nếu tìm thấy, trả về vị trí đầu tiên.

Nếu không tìm thấy, trả về `false`.

```php
$txt = 'Hello World';
echo strpos($txt, 'World');
```

### strtolower và strtoupper

Dùng để chuyển chữ hoa/thường.

```php
strtolower('ABC'); // abc
strtoupper('abc'); // ABC
```

Ứng dụng thực tế:

- Mã xác nhận không phân biệt hoa thường.
- Chuyển input về chữ thường trước khi so sánh.

---

## 12. Cấu trúc điều kiện

### if/else

Nên luôn dùng dấu ngoặc móc `{}` dù chỉ có một lệnh.

Ví dụ:

```php
if ($chon == 'A') {
    echo 'Ban chon A';
} else {
    echo 'Ban khong chon A';
}
```

Lý do:

- Code rõ ràng hơn.
- Tránh lỗi logic khi thêm dòng mới.

### switch

Mỗi `case` nên có `break`.

Ví dụ:

```php
switch ($chon) {
    case 'A':
        echo 'Ban chon A';
        break;
    case 'B':
        echo 'Ban chon B';
        break;
    default:
        echo 'Lua chon khac';
        break;
}
```

Nếu quên `break`, PHP có thể chạy tiếp xuống case bên dưới, gây lỗi logic khó tìm.

---

## 13. Demo thực hành

Bài demo yêu cầu phân biệt nút bấm:

- Nút A
- Nút B

Cần làm bằng 2 cách:

- `if/else`
- `switch`

Triển khai trên localhost bằng WAMP/XAMPP.

---

## 14. Lưu ý quan trọng từ giảng viên

### Về AI

Không nên dùng AI để thay thế việc tự suy nghĩ.

Nên dùng AI để:

- Hỏi lại phần chưa hiểu.
- Nhờ giải thích code.
- Tìm lỗi.
- So sánh cách làm.

Không nên chỉ copy code rồi nộp.

### Về thực hành

Môn này yêu cầu cả kiến thức và kỹ năng.

Biết lý thuyết nhưng không thực hành đủ thì vẫn khó làm được bài.

### Về tác phong

Cần rèn:

- Ngồi học nghiêm túc.
- Gõ phím đúng tư thế.
- Viết code cẩn thận.
- Chú thích code khi cần.

---

## 15. Ghi nhớ nhanh

- PHP là ngôn ngữ server-side.
- MySQL là database miễn phí, thường dùng với PHP.
- Web động thường có kết nối cơ sở dữ liệu.
- PHP code nằm trong `<?php ... ?>`.
- Nên dùng `echo` để xuất dữ liệu.
- Biến PHP bắt đầu bằng `$`.
- PHP phân biệt hoa thường.
- PHP dùng dấu `.` để nối chuỗi.
- `if/else` nên luôn có `{}`.
- `switch` nên có `break` ở mỗi case.
