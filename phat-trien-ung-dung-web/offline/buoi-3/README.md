# Buổi 3 - Kỹ thuật Upload File trong PHP

Nội dung buổi 3 tập trung vào cơ chế upload file trong PHP, xử lý mảng `$_FILES`, kiểm tra định dạng/kích thước file, đổi tên file ngẫu nhiên, upload nhiều file và quản lý xóa file.

## Cấu trúc thư mục

```text
buoi-3/
├── README.md
├── HUONG-DAN.md
├── bai-3-1-upload-co-ban/
│   ├── README.md
│   └── upload.php
├── bai-3-2-upload-anh-doi-ten/
│   ├── README.md
│   └── upload.php
├── bai-3-3-upload-nhieu-file/
│   ├── README.md
│   └── upload.php
├── bai-3-4-upload-va-xoa-file/
│   ├── README.md
│   └── quanlyfile.php
└── bai-3-5-cau-hinh-dung-luong-100mb/
    ├── README.md
    └── check_info.php
```

## Danh sách bài thực hành

1. **Bài 3.1:** Form upload cơ bản & xem cấu trúc mảng `$_FILES`
2. **Bài 3.2:** Upload file ảnh, giới hạn <= 2MB, đổi tên file ngẫu nhiên
3. **Bài 3.3:** Upload đồng thời nhiều file với thuộc tính `multiple`
4. **Bài 3.4:** Xây dựng trang upload và xóa file trên server bằng `unlink()`
5. **Bài 3.5:** Cấu hình `php.ini` để cho phép upload file lớn lên tới 100MB

> Xem file `HUONG-DAN.md` để đọc hướng dẫn tổng quát và quy trình chạy thử trước khi làm từng bài.
