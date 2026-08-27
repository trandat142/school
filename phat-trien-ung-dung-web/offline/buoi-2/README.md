# Buổi 2 - Các phương pháp truyền biến

Thư mục này chứa nội dung hướng dẫn và code mẫu cho Chương 2: Các phương pháp truyền biến trong PHP.

## Cách chạy

1. Mở XAMPP Control Panel và Start Apache.
2. Copy thư mục `buoi-2` vào:

```text
C:\xampp\htdocs\
```

3. Mở trình duyệt và chạy các file theo dạng:

```text
http://localhost/buoi-2/tên_file.php
```

Ví dụ:

```text
http://localhost/buoi-2/truyenbien.php
```

## Danh sách file

- `truyenbien.php`: form nhập thông tin và gửi dữ liệu bằng POST.
- `nhanbien.php`: nhận dữ liệu từ `truyenbien.php` bằng `$_POST`.
- `login.php`: form đăng nhập đơn giản.
- `tacgia.php`: danh sách tác giả, truyền dữ liệu qua URL bằng GET.
- `thongtin.php`: nhận thông tin tác giả từ URL bằng `$_GET`.
- `clspheptinh.php`: class chứa các phép tính cộng, trừ, nhân, chia.
- `tinhtoan.php`: form tính toán 2 số.
- `style.css`: file CSS dùng cho trang đăng ký.
- `dangky.php`: trang đăng ký thông tin có layout CSS.

## Thứ tự nên học

1. Bài 2.1: `truyenbien.php` và `nhanbien.php`
2. Bài 2.2: `login.php`
3. Bài 2.4: `tacgia.php` và `thongtin.php`
4. Bài 2.3: `clspheptinh.php` và `tinhtoan.php`
5. Bài 2.5: `style.css` và `dangky.php`

## Ghi nhớ

Input có `name` gì thì PHP nhận bằng đúng tên đó.

Ví dụ:

```php
<input type="text" name="txtten">
```

PHP nhận bằng:

```php
$_POST["txtten"]
```
