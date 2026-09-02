# Bài 4.3 - Lưu Sở thích Đổi Màu Header bằng Cookie trong 10 ngày

## Mục tiêu
- Kế thừa form Đăng ký và Đăng nhập từ chương trước.
- Khi đăng ký, nếu người dùng chọn sở thích **"Màu xanh"** (`bg_green`) hoặc **"Màu đỏ"** (`bg_red`), hệ thống lưu tùy chọn vào Cookie.
- Khi người dùng đăng nhập trở lại, màu nền của thẻ `<header>` sẽ tự động chuyển theo sở thích đã chọn và **duy trì trong 10 ngày** nhờ Cookie `bgcolor`.

## Cách chạy
1. Mở trang chủ:
   ```text
   http://localhost/buoi-4/bai-4-3-luu-so-thich-header-cookie/trangchu.php
   ```
2. Thử nghiệm:
   - Vào mục **Đăng ký** -> Nhập thông tin và chọn sở thích **Màu xanh** (hoặc **Màu đỏ**) -> Bấm Đăng ký.
   - Chuyển sang trang **Đăng nhập** -> Nhập email vừa đăng ký -> Bấm Đăng nhập.
   - Header lập tức đổi sang màu xanh/đỏ tương ứng.
   - Tắt trình duyệt hoặc mở lại `trangchu.php`, màu header vẫn được duy trì trong vòng 10 ngày.
