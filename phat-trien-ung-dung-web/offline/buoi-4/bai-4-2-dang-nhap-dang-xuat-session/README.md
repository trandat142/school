# Bài 4.2 - Đăng ký, Đăng nhập và Đăng xuất với Session

## Yêu cầu

Sử dụng form đăng ký và đăng nhập ở chương 2, thực hiện các yêu cầu sau:

- **a)** Khi người dùng vào menu "Đăng nhập" nếu đã đăng nhập thì hệ thống điều hướng về trang chủ.
- **b)** Khi người dùng đăng ký thành công thì điều hướng về trang đăng nhập để đăng nhập với thông tin vừa đăng ký.
- **c)** Khi người dùng đăng nhập thành công thì xuất hiện thêm menu "Đăng xuất" và mất đi menu "Đăng nhập".
- **d)** Khi vào menu "Đăng xuất" hệ thống sẽ thực hiện đăng xuất và chuyển về trang chủ (lúc này menu "Đăng xuất" cũng mất đi).

## Các file trong bài

- `trangchu.php`: Trang chủ hiển thị menu động theo trạng thái đăng nhập.
- `dangky.php`: Form thông tin đăng ký (Email, Password, Nhập lại password, Họ tên, Quê quán, Điện thoại, Giới tính, Sở thích).
- `dangnhap.php`: Form thông tin đăng nhập (Email, Password, checkbox Nhớ thông tin đăng nhập).
- `dangxuat.php`: Xóa session và chuyển hướng về trang chủ.
- `style.css`: File định dạng layout CSS.

## Cách chạy

Truy cập:
```text
http://localhost/buoi-4/bai-4-2-dang-nhap-dang-xuat-session/trangchu.php
```
