# Bài 2.1 - Truyền biến qua form bằng POST

## Mục tiêu

Tạo 2 trang:

- `truyenbien.php`: cho người dùng nhập thông tin.
- `nhanbien.php`: nhận và hiển thị thông tin vừa nhập.

## Cách chạy

Mở trình duyệt:

```text
http://localhost/buoi-2/bai-2-1-truyen-bien-post/truyenbien.php
```

## Luồng hoạt động

1. Người dùng nhập tên ở `truyenbien.php`.
2. Bấm nút Gửi.
3. Form gửi dữ liệu bằng POST sang `nhanbien.php`.
4. `nhanbien.php` dùng `$_POST["txtten"]` để nhận dữ liệu.

## File cần xem

- `truyenbien.php`
- `nhanbien.php`

Trong code đã có comment giải thích từng dòng quan trọng.
