# Bài 3.5 - Cấu hình Web Server cho phép Upload file tới 100MB

## Mục tiêu
Theo mặc định, PHP chỉ cho phép tải lên file tối đa 2MB (`upload_max_filesize = 2M`). Bài này hướng dẫn cấu hình lại file `php.ini` để tăng giới hạn lên 100MB.

## Các bước cấu hình

### 1. Mở file php.ini
- **Cách 1 (XAMPP):** Mở **XAMPP Control Panel**, tại dòng **Apache**, nhấn nút **Config** -> chọn **PHP (php.ini)**.
- **Cách 2:** Mở trực tiếp theo đường dẫn: `C:\xampp\php\php.ini`.

### 2. Chỉnh sửa các thông số sau
Nhấn `Ctrl + F` để tìm và sửa các giá trị:

```ini
; Dung lượng tối đa của 1 file upload
upload_max_filesize = 100M

; Dung lượng tối đa của toàn bộ dữ liệu gửi qua POST (phải lớn hơn upload_max_filesize)
post_max_size = 105M

; Bộ nhớ RAM tối đa cấp cho mỗi script PHP (phải lớn hơn post_max_size)
memory_limit = 256M

; Thời gian tối đa để thực thi script (giây) tránh timeout khi mạng chậm
max_execution_time = 300

; Thời gian tối đa để tiếp nhận dữ liệu đầu vào (giây)
max_input_time = 300
```

### 3. Lưu và Khởi động lại Apache
1. Nhấn `Ctrl + S` để lưu file `php.ini`.
2. Mở XAMPP Control Panel, nhấn **Stop** Apache, sau đó nhấn **Start** lại.

### 4. Kiểm tra cấu hình
Mở trình duyệt truy cập:
```text
http://localhost/buoi-3/bai-3-5-cau-hinh-dung-luong-100mb/check_info.php
```
Tìm từ khóa `upload_max_filesize`, nếu thấy giá trị hiển thị là `100M` tức là đã cấu hình thành công.
