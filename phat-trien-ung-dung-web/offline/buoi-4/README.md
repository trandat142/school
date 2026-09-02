# Buổi 4 - Session và Cookie trong PHP

Tài liệu và bài tập thực hành bám sát theo slide bài giảng Buổi 4.

## 4.1. Mục tiêu

- So sánh được cách thức hoạt động giữa biến session và cookie;
- Vận dụng biến session, cookie thực hiện một số bài tập theo yêu cầu.

## 4.2. Tóm tắt nội dung lý thuyết

### 4.2.1. Giống nhau

- Được dùng để lưu trữ thông tin (giá trị, trạng thái,...);
- Phạm vi tác động trên toàn website.

### 4.2.2. Khác nhau

| Tiêu chí | Session | Cookie |
| :--- | :--- | :--- |
| **Nơi lưu trữ** | Được khởi tạo và lưu trữ ở phía server. | Được khởi tạo và lưu trữ ở phía client. |
| **Thời gian sống** | Người dùng không thể quy định được thời gian tồn tại. | Có thể quy định được thời gian tồn tại. |
| **Kích thước** | Không quy định về giới hạn kích thước. | Theo tiêu chuẩn quy định không quá 4KB. |
| **Bảo mật** | An toàn và bảo mật hơn vì dữ liệu được lưu trữ dạng mã hóa và được giải mã phía server. | Dữ liệu được lưu trữ phía client của trình duyệt và không được mã hóa. |
| **Tính độc lập** | Session hoạt động độc lập cho mọi client. | Cookie có thể hoặc không thể độc lập trên mọi client (nếu client không cho phép). |

---

## 4.3. Cấu trúc thư mục bài tập thực hành

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
│   ├── style.css
│   ├── trangchu.php
│   ├── dangky.php
│   ├── dangnhap.php
│   └── dangxuat.php
└── bai-4-3-luu-so-thich-header-cookie/
    ├── README.md
    ├── style.css
    ├── trangchu.php
    ├── dangky.php
    ├── dangnhap.php
    └── dangxuat.php
```

## 4.4. Danh sách bài thực hành

1. **Bài 4.1:** Phân tích mã nguồn `session.php`, `dangxuat.php` và xuất câu trả lời ra giao diện web `ketqua.php`.
2. **Bài 4.2:** Tích hợp form đăng ký, đăng nhập từ chương 2 với Session để xử lý điều hướng trang và trạng thái hiển thị menu.
3. **Bài 4.3:** Sử dụng Cookie ghi nhớ sở thích đổi màu header của website (duy trì 10 ngày).
