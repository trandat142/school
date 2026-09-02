# Buổi 4 - Session và Cookie trong PHP

Nội dung buổi 4 tập trung vào cơ chế quản trị phiên làm việc (Session) và lưu trữ trạng thái người dùng tại trình duyệt (Cookie), kỹ thuật chuyển hướng trang, quản lý trạng thái đăng nhập/đăng xuất và cá nhân hóa giao diện website.

## Cấu trúc thư mục

```text
buoi-4/
├── README.md
├── HUONG-DAN.md
├── bai-4-1-phan-tich-session-dangxuat/
│   ├── README.md
│   ├── session.php
│   ├── dangxuat.php
│   └── ketqua.php
├── bai-4-2-dang-nhap-dang-xuat-session/
│   ├── README.md
│   ├── trangchu.php
│   ├── dangky.php
│   ├── dangnhap.php
│   ├── dangxuat.php
│   └── style.css
└── bai-4-3-luu-so-thich-header-cookie/
    ├── README.md
    ├── trangchu.php
    ├── dangky.php
    ├── dangnhap.php
    ├── dangxuat.php
    └── style.css
```

## Danh sách bài thực hành

1. **Bài 4.1:** Phân tích cú pháp, lỗi thực thi và hoàn thiện chức năng gán/hủy biến Session (`session.php`, `dangxuat.php`, `ketqua.php`)
2. **Bài 4.2:** Xây dựng hệ thống Đăng ký - Đăng nhập - Đăng xuất hoàn chỉnh, kiểm soát menu động theo trạng thái Session và điều hướng bằng `header()`
3. **Bài 4.3:** Ứng dụng Cookie lưu trữ sở thích người dùng (đổi màu theme header) duy trì trong 10 ngày sau khi đăng nhập lại

> Xem file `HUONG-DAN.md` để đọc hướng dẫn chi tiết lý thuyết, quy trình chạy thử và bài tập giải thích cặn kẽ.
