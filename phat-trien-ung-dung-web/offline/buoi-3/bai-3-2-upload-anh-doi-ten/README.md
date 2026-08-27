# Bài 3.2 - Upload file ảnh, kiểm tra điều kiện & đổi tên tự động

## Mục tiêu
- Kiểm tra kích thước file: <= 2MB (`2 * 1024 * 1024` bytes).
- Lọc file ảnh (`png`, `jpg`, `jpeg`, `gif`). Nếu là ảnh thì hiển thị ra trang web, nếu không phải thì thông báo.
- Đổi tên file ngẫu nhiên theo cấu trúc: `<tên_gốc>_<random_100_999>.<đuôi_file>` để chống trùng lặp.
- Lưu file vào thư mục `upload/`.

## Cách chạy
Mở trình duyệt:
```text
http://localhost/buoi-3/bai-3-2-upload-anh-doi-ten/upload.php
```
