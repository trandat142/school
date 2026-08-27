# Hướng dẫn chi tiết Buổi 3 - Kỹ thuật Upload File trong PHP

## 1. Chuẩn bị

Cần có:
- XAMPP / WampServer / Laragon đã cài đặt trên máy tính.
- Trình soạn thảo mã nguồn (VS Code, Notepad++,...).
- Trình duyệt web (Chrome, Edge, Firefox,...).

## 2. Khởi động Web Server

1. Mở **XAMPP Control Panel**.
2. Nhấn **Start** ở dòng **Apache**.
3. Khi chữ Apache chuyển sang màu xanh lá cây là máy chủ đã sẵn sàng.

## 3. Vị trí đặt thư mục bài học

Copy toàn bộ thư mục `buoi-3` vào thư mục `htdocs` của XAMPP:

```text
C:\xampp\htdocs\buoi-3\
```

## 4. Cách chạy từng bài trên trình duyệt

Công thức truy cập chung:

```text
http://localhost/buoi-3/tên_thư_mục_bài/tên_file.php
```

Ví dụ:
- Bài 3.1: `http://localhost/buoi-3/bai-3-1-upload-co-ban/upload.php`
- Bài 3.2: `http://localhost/buoi-3/bai-3-2-upload-anh-doi-ten/upload.php`
- Bài 3.3: `http://localhost/buoi-3/bai-3-3-upload-nhieu-file/upload.php`
- Bài 3.4: `http://localhost/buoi-3/bai-3-4-upload-va-xoa-file/quanlyfile.php`
- Bài 3.5: `http://localhost/buoi-3/bai-3-5-cau-hinh-dung-luong-100mb/check_info.php`

## 5. Kiến thức trọng tâm cần nhớ

### Cơ chế 3 tiến trình upload
1. **Client:** Gửi form với `method="POST"` và `enctype="multipart/form-data"`.
2. **Server tạm:** Web server nhận file và lưu vào thư mục tạm `tmp_name`.
3. **Lưu trữ chính thức:** Dùng hàm `move_uploaded_file($tmp_name, $destination)` để di chuyển file vào thư mục lưu trữ của website.

### Các thuộc tính của mảng $_FILES['tên_input']
- `name`: Tên gốc của file khi ở máy client (ví dụ: `anhtest.jpg`).
- `type`: Kiểu định dạng MIME (ví dụ: `image/jpeg`).
- `tmp_name`: Đường dẫn file tạm trên server (ví dụ: `C:\xampp\tmp\php812C.tmp`).
- `size`: Kích thước file tính bằng Byte (1 MB = 1024 * 1024 Bytes).
- `error`: Mã lỗi upload (0 là thành công).

## 6. Lỗi thường gặp và cách xử lý

1. **$_FILES bị rỗng:** Do thẻ `<form>` thiếu `enctype="multipart/form-data"` hoặc dùng nhầm `method="GET"`.
2. **Không lưu được file:** Do chưa tạo thư mục `upload/` hoặc không có quyền ghi file.
3. **Trùng tên file bị ghi đè:** Cần dùng `rand(100, 999)` hoặc `time()` để nối vào tên file trước khi lưu.
