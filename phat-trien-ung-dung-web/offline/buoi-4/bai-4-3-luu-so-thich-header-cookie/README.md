# Bài 4.3 - Lưu Sở thích Đổi Màu Header bằng Cookie

## Yêu cầu

Tiếp tục sử dụng form Đăng ký và Đăng nhập ở chương 2:
- Tại form Đăng ký nếu người dùng chọn sở thích "màu xanh" hoặc "màu đỏ" thì hệ thống sẽ thực hiện đổi màu header của website theo sở thích riêng đã được chọn.
- Khi người dùng đăng nhập trở lại thì trạng thái đổi màu header vẫn được duy trì (thời gian duy trì 10 ngày).

## Các bước thực hiện theo slide

- **Bước 1:** Tạo 2 class css: `header.bg_green { background: green !important; }` và `header.bg_red { background: red !important; }`.
- **Bước 2:** Đặt lại value của checkbox sở thích tương ứng (`bg_green`, `bg_red`).
- **Bước 3:** Sử dụng cookie để ghi nhớ sở thích (`remember` khi đăng ký, `bgcolor` 10 ngày khi đăng nhập).
- **Bước 4:** Thêm class vào thẻ header `<header class="<?=$_COOKIE['bgcolor']?>" />`.

## Cách chạy

Truy cập:
```text
http://localhost/buoi-4/bai-4-3-luu-so-thich-header-cookie/trangchu.php
```
