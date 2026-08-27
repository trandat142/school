# Bài 2.4 - Truyền biến qua đường liên kết

## Mục tiêu

Tạo 2 file:

- `tacgia.php`: hiển thị danh sách tác giả.
- `thongtin.php`: nhận tên và tuổi tác giả từ URL.

## Cách chạy

```text
http://localhost/buoi-2/bai-2-4-truyen-bien-link/tacgia.php
```

## Luồng hoạt động

1. Người dùng mở `tacgia.php`.
2. Bấm vào tên tác giả.
3. Link truyền dữ liệu qua URL, ví dụ: `thongtin.php?ten=An&tuoi=20`.
4. `thongtin.php` nhận dữ liệu bằng `$_GET`.

## File cần xem

- `tacgia.php`
- `thongtin.php`

Trong code đã có comment giải thích từng dòng quan trọng.
