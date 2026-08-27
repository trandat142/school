# Hướng dẫn chi tiết Buổi 2 - Các phương pháp truyền biến

## 1. Chuẩn bị

Cần có:

- XAMPP để chạy PHP.
- VS Code hoặc Notepad++ để viết code.
- Trình duyệt web như Chrome, Edge, Firefox.

## 2. Mở XAMPP

1. Mở XAMPP Control Panel.
2. Bấm Start ở dòng Apache.
3. Nếu Apache chuyển màu xanh là chạy thành công.

Buổi này chưa cần MySQL, chỉ cần Apache.

## 3. Copy thư mục bài học

Copy thư mục `buoi-2` vào:

```text
C:\xampp\htdocs\
```

Sau đó đường dẫn sẽ là:

```text
C:\xampp\htdocs\buoi-2\
```

## 4. Cách chạy từng bài

Mỗi bài nằm trong một thư mục riêng. Công thức chạy là:

```text
http://localhost/buoi-2/tên_thư_mục_bài/tên_file.php
```

Ví dụ Bài 2.1:

```text
http://localhost/buoi-2/bai-2-1-truyen-bien-post/truyenbien.php
```

Ví dụ Bài 2.2:

```text
http://localhost/buoi-2/bai-2-2-dang-nhap/login.php
```

## 5. Kiến thức cần nhớ

### POST

POST dùng để gửi dữ liệu từ form nhưng không hiển thị dữ liệu trên thanh địa chỉ.

File gửi có dạng:

```php
<form method="post" action="nhanbien.php">
    <input type="text" name="txtten">
    <input type="submit" value="Gửi">
</form>
```

File nhận dùng:

```php
$_POST["txtten"]
```

### GET

GET dùng để truyền dữ liệu qua URL hoặc form. Dữ liệu sẽ hiển thị trên thanh địa chỉ.

Ví dụ:

```text
thongtin.php?ten=An&tuoi=20
```

File nhận dùng:

```php
$_GET["ten"]
$_GET["tuoi"]
```

### name trong input

Input có `name` gì thì PHP nhận bằng đúng tên đó.

Ví dụ:

```php
<input type="text" name="txtten">
```

PHP nhận bằng:

```php
$_POST["txtten"]
```

## 6. Lỗi thường gặp

### Không chạy được file PHP

Kiểm tra:

- Apache đã Start chưa.
- File có nằm trong `htdocs` chưa.
- Đường dẫn trên trình duyệt có đúng không.
- File có đúng đuôi `.php` không.

### Không nhận được dữ liệu

Kiểm tra:

- Nếu form dùng `method="post"` thì PHP phải dùng `$_POST`.
- Nếu truyền qua URL thì PHP phải dùng `$_GET`.
- Tên trong `name="..."` phải giống tên trong `$_POST["..."]` hoặc `$_GET["..."]`.

### Tiếng Việt bị lỗi font

Trong thẻ `<head>` cần có:

```php
<meta charset="UTF-8">
```
