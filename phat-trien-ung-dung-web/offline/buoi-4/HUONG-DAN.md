# Hướng dẫn chi tiết Buổi 4 - Quản lý Trạng thái với Session và Cookie trong PHP

## 1. Chuẩn bị môi trường
- Đảm bảo máy chủ Apache trên XAMPP / Laragon đang chạy (`Start` Apache).
- Copy thư mục `buoi-4` vào thư mục gốc của Web Server:
  - Trên Windows XAMPP: `C:\xampp\htdocs\buoi-4\`
  - Trên macOS XAMPP: `/Applications/XAMPP/xamppfiles/htdocs/buoi-4/`
  - Hoặc chạy trực tiếp với PHP Built-in Server:
    ```bash
    cd phat-trien-ung-dung-web/offline/buoi-4
    php -S localhost:8000
    ```

## 2. Tóm tắt lý thuyết cốt lõi

### 2.1. So sánh Session và Cookie

| Tiêu chí | Session | Cookie |
| :--- | :--- | :--- |
| **Vị trí lưu trữ** | Phía máy chủ (Server). Phía Client chỉ giữ mã định danh session (`PHPSESSID`). | Phía trình duyệt người dùng (Client). |
| **Thời gian tồn tại** | Mặc định kết thúc khi người dùng đóng trình duyệt hoặc gọi hàm `session_destroy()`. | Được ấn định thời gian sống cụ thể thông qua tham số `expire` (ví dụ: `time() + 86400*10`). |
| **Dung lượng lưu trữ** | Không giới hạn cứng, phụ thuộc vào bộ nhớ máy chủ. | Bị giới hạn tiêu chuẩn tối đa khoảng **4KB** cho mỗi cookie. |
| **Mức độ an toàn** | Rất an toàn do dữ liệu nhạy cảm được xử lý và lưu ở Server. | Kém an toàn hơn vì người dùng có thể xem hoặc chỉnh sửa trực tiếp trên trình duyệt. |
| **Mục đích chính** | Lưu thông tin đăng nhập, giỏ hàng, quyền hạn tài khoản. | Ghi nhớ tùy chọn giao diện, checkbox "Ghi nhớ mật khẩu", tracking, theme. |

---

### 2.2. Các hàm và cú pháp quan trọng

#### Thao tác với Session:
- `session_start();`: Bắt buộc gọi ở **dòng đầu tiên** của file PHP trước khi có bất kỳ dòng HTML hoặc khoảng trắng nào được xuất ra trình duyệt.
- `$_SESSION['key'] = $value;`: Gán giá trị vào biến session.
- `unset($_SESSION['key']);`: Xóa một biến session cụ thể.
- `session_destroy();`: Hủy toàn bộ phiên làm việc của session hiện tại.

#### Thao tác với Cookie:
- `setcookie($name, $value, $expire, $path);`: Tạo hoặc cập nhật cookie.
  - Ví dụ tồn tại trong 10 ngày: `setcookie("bgcolor", "bg_green", time() + 86400 * 10, "/");`
  - Ví dụ xóa cookie: `setcookie("bgcolor", "", time() - 3600, "/");`
- `$_COOKIE['name']`: Đọc giá trị cookie gửi từ client lên.

#### Hàm điều hướng trang:
- `header("Location: trangchu.php"); exit();`: Điều hướng ngay lập tức sang trang khác.
- `header("refresh: 5; url=trangchu.php");`: Điều hướng sau 5 giây.

---

## 3. Phân tích và hướng dẫn chi tiết từng bài tập

### 📝 Bài 4.1: Phân tích & hoàn thiện chức năng Session

#### a) Điểm lỗi cú pháp & chưa chính xác trong mã nguồn đề bài:
1. **Thiếu `session_start()` ở `dangxuat.php`**: Không thể đọc hay hủy mảng `$_SESSION` nếu chưa khởi tạo session.
2. **Kiểm tra `if($_SESSION["ThongTin"])` chưa an toàn**: Khi biến chưa được gán, PHP sẽ quăng cảnh báo `Notice: Undefined index / Undefined array key`. Cần dùng `if(isset($_SESSION["ThongTin"]) && $_SESSION["ThongTin"] != "")`.
3. **Lỗi `Headers already sent` trong `dangxuat.php`**: Thẻ HTML `<html><head>...` xuất hiện trước khi gọi hàm `header("Location: session.php")`. Theo nguyên lý HTTP, header phải được gửi trước payload HTML.
4. **Sai tên file trong liên kết**: `session.php` ghi `<a href='logout.php'>` trong khi file xử lý là `dangxuat.php`.

#### b) Mô tả kết quả thực thi:
- **`session.php`**: Người dùng nhập text và nhấn "Gán" -> Dữ liệu lưu vào session và hiển thị: `Giá trị biến session là: ... Đăng xuất`. Nếu chưa nhập và bấm gán, báo: `Giá trị biến session chưa được gán`.
- **`dangxuat.php`**: Bị lỗi do thiếu `session_start()` và thẻ HTML xuất trước lệnh `header()`, session không được xóa thành công hoặc bị kẹt thông báo lỗi Warning.

#### c) Hướng hoàn thiện:
- Bổ sung trang `ketqua.php` hiển thị bài phân tích rõ ràng dạng bảng.
- Viết lại chuẩn `session.php` và `dangxuat.php` (sử dụng `session_unset()`, `session_destroy()`, `header()` trước output).

---

### 📝 Bài 4.2: Đăng ký - Đăng nhập - Đăng xuất & Điều hướng trạng thái

Hệ thống gồm 4 trang liên kết chặt chẽ:
1. **`dangky.php`**: Nhận thông tin người dùng. Khi đăng ký thành công, lưu thông tin vào `$_SESSION['registered_user']` và chuyển hướng sang `dangnhap.php`.
2. **`dangnhap.php`**: 
   - Kiểm tra nếu `isset($_SESSION['user'])` (đã đăng nhập) thì chuyển hướng ngay về `trangchu.php`.
   - Nếu đăng nhập đúng thông tin, lưu thông tin vào `$_SESSION['user']` và chuyển hướng về `trangchu.php`.
   - Hỗ trợ checkbox "Nhớ thông tin đăng nhập" bằng Cookie `saved_email`.
3. **`trangchu.php`**: 
   - Header hiển thị menu động:
     - Chưa đăng nhập: Hiện `Trang chủ`, `Đăng ký`, `Đăng nhập`.
     - Đã đăng nhập: Hiện `Trang chủ`, `Đăng xuất` (ẩn Đăng ký và Đăng nhập).
4. **`dangxuat.php`**: Hủy `$_SESSION['user']`, gọi `session_destroy()` và chuyển về `trangchu.php`.

---

### 📝 Bài 4.3: Cá nhân hóa giao diện (Màu Header) duy trì 10 ngày bằng Cookie

1. **Khởi tạo class CSS**:
   - `header.bg_green { background-color: #2e7d32 !important; color: #fff; }`
   - `header.bg_red { background-color: #c62828 !important; color: #fff; }`
2. **Form Đăng ký**:
   - Gán `value="bg_green"` cho Màu xanh và `value="bg_red"` cho Màu đỏ.
   - Khi đăng ký, dùng `setcookie("remember", "dkemail=...&dksothich=...", time() + 86400 * 100, "/");`.
3. **Form Đăng nhập**:
   - Đọc `$_COOKIE["remember"]`, dùng hàm `parse_str()` trích xuất `dksothich`.
   - Lưu cookie màu giao diện: `setcookie("bgcolor", $result["dksothich"], time() + 86400 * 10, "/");` (tồn tại 10 ngày).
4. **Áp dụng giao diện**:
   - Tại `<header class="<?php echo $_COOKIE['bgcolor'] ?? ''; ?>">`, header sẽ tự động đổi màu xanh hoặc đỏ và giữ nguyên 10 ngày dù người dùng tắt mở lại trình duyệt.
