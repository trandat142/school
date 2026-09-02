# Bài 4.2 - Hệ thống Đăng ký, Đăng nhập và Đăng xuất với Session

## Mục tiêu
- Xây dựng hệ thống form Đăng ký (`dangky.php`), Đăng nhập (`dangnhap.php`), Trang chủ (`trangchu.php`), và Đăng xuất (`dangxuat.php`).
- Xử lý điều hướng luồng người dùng:
  - Khi đã đăng nhập: Vào trang đăng nhập sẽ tự động chuyển về trang chủ.
  - Khi đăng ký thành công: Điều hướng sang trang đăng nhập để đăng nhập với thông tin vừa tạo.
  - Trạng thái Menu động: Khi đăng nhập thành công xuất hiện menu **"Đăng xuất"** và ẩn đi menu **"Đăng nhập"**; khi đăng xuất thì menu quay về ban đầu.

## Cách chạy
1. Mở trang chủ:
   ```text
   http://localhost/buoi-4/bai-4-2-dang-nhap-dang-xuat-session/trangchu.php
   ```
2. Thử nghiệm luồng:
   - Bấm vào menu **Đăng ký** -> Điền thông tin -> Bấm Đăng ký -> Tự động chuyển qua **Đăng nhập**.
   - Nhập thông tin vừa tạo -> Bấm Đăng nhập -> Tự động vào **Trang chủ**, menu đổi thành **Đăng xuất**.
   - Bấm vào link **Đăng nhập** lại trên trình duyệt -> Hệ thống tự động đẩy về lại **Trang chủ**.
   - Bấm **Đăng xuất** -> Phiên kết thúc, menu trở lại **Đăng ký** và **Đăng nhập**.
