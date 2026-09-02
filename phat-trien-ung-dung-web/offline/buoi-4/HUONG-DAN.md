# Hướng dẫn chi tiết Buổi 4 - Session và Cookie trong PHP

Tài liệu hướng dẫn bám sát 100% nội dung Slide bài giảng của giảng viên.

---

## 4.1. Mục tiêu

- So sánh được cách thức hoạt động giữa biến session và cookie;
- Vận dụng biến session, cookie thực hiện một số bài tập theo yêu cầu.

---

## 4.2. Tóm tắt nội dung lý thuyết

### 4.2.1. Giống nhau

- Được dùng để lưu trữ thông tin (giá trị, trạng thái,...);
- Phạm vi tác động trên toàn website.

### 4.2.2. Khác nhau

| Tiêu chí | Session | Cookie |
| :--- | :--- | :--- |
| **Nơi lưu trữ** | Được khởi tạo và lưu trữ ở phía server. | Được khởi tạo và lưu trữ ở phía client. |
| **Thời gian sống** | Người dùng không thể quy định được thời gian tồn tại. | Có thể quy định được thời gian tồn tại. |
| **Giới hạn dung lượng**| Không quy định về giới hạn kích thước. | Theo tiêu chuẩn quy định không quá 4KB. |
| **Bảo mật** | An toàn và bảo mật hơn vì dữ liệu được lưu trữ dạng mã hóa và được giải mã phía server. | Dữ liệu được lưu trữ phía client của trình duyệt và không được mã hóa. |
| **Tính độc lập** | Session hoạt động độc lập cho mọi client. | Cookie có thể hoặc không thể độc lập trên mọi client (nếu client không cho phép). |

---

## 4.3. Hướng dẫn chi tiết và gợi ý cách làm từng bài

### 📌 Bài 4.1: Cho hai trang PHP như hình, hãy trả lời các câu hỏi

#### Đề bài mã nguồn gốc:
- `session.php`: Gán giá trị biến session qua form submit.
- `dangxuat.php`: Kiểm tra session và chuyển hướng.

#### Trả lời các câu hỏi:

**a) Hãy cho biết về cú pháp trong PHP, hai trang trên bị lỗi hoặc chưa chính xác ở điểm nào? Nếu có thì mô tả cụ thể?**
1. **Thiếu `session_start()` ở `dangxuat.php`**: Muốn sử dụng biến `$_SESSION` thì trang bắt buộc phải khởi tạo session bằng hàm `session_start()` ở đầu file.
2. **Lỗi `Headers already sent` ở `dangxuat.php`**: Thẻ HTML `<html><head>...` xuất trước hàm `header("Location:session.php")`. Trong PHP, hàm `header()` phải được gọi trước mọi thẻ HTML hoặc khoảng trắng output.
3. **Kiểm tra `if($_SESSION["ThongTin"])` chưa chặt chẽ**: Khi biến chưa được gán, PHP sẽ quăng cảnh báo Notice nếu không dùng `error_reporting(0)`. Cách viết chuẩn là `isset($_SESSION["ThongTin"])`.
4. **Sai tên file điều hướng link**: Trang `session.php` ghi `<a href='logout.php'>` nhưng file xử lý đăng xuất lại tên là `dangxuat.php`.

**b) Hãy mô tả kết quả khi thực thi hai trang trên?**
- `session.php`: Khi nhập dữ liệu và nhấn "Gán", dữ liệu lưu vào `$_SESSION["ThongTin"]` và in ra `Giá trị biến session là: ... <a href='logout.php'>Đăng xuất</a>`. Khi chưa gán, in ra `Giá trị biến session chưa được gán`.
- `dangxuat.php`: Do thiếu `session_start()`, trang không nhận diện được `$_SESSION["ThongTin"]` nên chạy vào nhánh `else` gọi `header()`. Tuy nhiên do xuất HTML trước nên có thể bị lỗi không chuyển hướng được và chưa thực hiện xóa session.

**c) Để hoàn thiện chức năng đăng xuất (xóa session) ta cần thực hiện như thế nào?**
- Thêm `session_start()` ở đầu trang.
- Xóa biến session bằng `unset($_SESSION["ThongTin"])` hoặc hủy toàn bộ phiên bằng `session_destroy()`.
- Gọi hàm `header("Location:session.php")` trước mọi mã HTML.

---

### 📌 Bài 4.2: Sử dụng form đăng ký và đăng nhập ở chương 2

#### Các yêu cầu xử lý:
- **a)** Khi người dùng vào menu "Đăng nhập" nếu đã đăng nhập thì hệ thống điều hướng về trang chủ:
  ```php
  if (isset($_SESSION["user"])) {
      header("location:trangchu.php");
      exit();
  }
  ```
- **b)** Khi người dùng đăng ký thành công thì điều hướng về trang đăng nhập để đăng nhập với thông tin vừa đăng ký:
  ```php
  header("location:dangnhap.php");
  exit();
  ```
- **c)** Khi người dùng đăng nhập thành công thì xuất hiện thêm menu "Đăng xuất" và mất đi menu "Đăng nhập":
  ```php
  <?php if (!isset($_SESSION["user"])) { ?>
      <li><a href="dangnhap.php">Đăng nhập</a></li>
  <?php } else { ?>
      <li><a href="dangxuat.php">Đăng xuất</a></li>
  <?php } ?>
  ```
- **d)** Khi vào menu "Đăng xuất" hệ thống sẽ thực hiện đăng xuất (xóa session) và chuyển về trang chủ:
  ```php
  session_start();
  session_destroy();
  header("location:trangchu.php");
  exit();
  ```

---

### 📌 Bài 4.3: Lưu sở thích đổi màu header website bằng Cookie (10 ngày)

Bám sát 4 bước gợi ý trong slide:

- **Bước 1:** Tạo 2 class css trong `style.css`:
  ```css
  header.bg_green { background: green !important; }
  header.bg_red { background: red !important; }
  ```

- **Bước 2:** Đặt lại value của checkbox sở thích tương ứng 2 class css:
  ```html
  Màu xanh <input type="checkbox" name="sothich" value="bg_green" />
  Màu đỏ <input type="checkbox" name="sothich" value="bg_red" />
  ```

- **Bước 3:** Sử dụng cookie để ghi nhớ sở thích người dùng đã đăng ký và đăng nhập:
  - *Tại dangky.php:*
    ```php
    if (isset($_POST['sbdangky'])) {
        setcookie("remember", "dkemail=" . $_POST['email'] . "&dksothich=" . $_POST['sothich'], time() + 3600 * 24 * 100, "/");
    }
    ```
  - *Tại dangnhap.php:*
    ```php
    if (isset($_POST['sbdangnhap'])) {
        if ($_COOKIE["remember"]) {
            parse_str($_COOKIE["remember"], $result);
            if ($_POST["email"] == $result["dkemail"]) {
                setcookie("bgcolor", $result["dksothich"], time() + 3600 * 24 * 10, "/");
            }
        }
    }
    ```

- **Bước 4:** Tại phần html của thẻ header khai báo thêm class:
  ```html
  <header class="<?=$_COOKIE['bgcolor']?>" />
  ```
