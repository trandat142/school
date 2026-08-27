# Bài 3.1 - Form upload cơ bản & xem cấu trúc mảng $_FILES

## Mục tiêu
Tạo trang `upload.php` cho phép chọn file từ máy tính, gửi lên server và in toàn bộ mảng `$_FILES` để hiểu cấu trúc dữ liệu mà PHP tiếp nhận.

## Cách chạy
Mở trình duyệt:
```text
http://localhost/buoi-3/bai-3-1-upload-co-ban/upload.php
```

## Các bước thực hiện
1. Người dùng chọn 1 file bất kỳ.
2. Nhấn nút **Upload file**.
3. PHP nhận dữ liệu và dùng `var_dump($_FILES['file'])` trong thẻ `<pre>` để in ra màn hình.
