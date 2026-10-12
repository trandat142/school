# Ôn thi giữa kỳ môn Phát triển ứng dụng WEB (PHP): Đăng nhập, Session, Cookie và Upload file

Tài liệu tổng hợp đầy đủ để ôn thi khi KHÔNG được mang tài liệu. Nội dung gồm lý thuyết, toàn bộ code có chú thích từng dòng, lỗi thường gặp, bài tập, đề giả lập, câu hỏi ôn tập kèm đáp án.

Phạm vi: bài thực hành buổi 2 (form và đăng nhập cơ bản), buổi 3 (upload file), buổi 4 (session, cookie, đăng nhập và đăng xuất).

Mục lục:

1. Nền tảng: form, HTTP, các biến toàn cục
2. Đăng nhập cơ bản (buổi 2)
3. Session và Cookie: lý thuyết
4. Đăng ký, đăng nhập, đăng xuất bằng Session (bài 4.2)
5. Cookie đổi màu header (bài 4.3)
6. Phân tích lỗi session và đăng xuất (bài 4.1)
7. Upload file: lý thuyết
8. Upload file: toàn bộ code (bài 3.1 đến 3.5)
9. Bảo mật khi đăng nhập và upload
10. Đề tổng hợp: đăng nhập kết hợp upload (kèm đáp án)
11. Bài điền chỗ trống (kèm đáp án)
12. Bài tìm lỗi (kèm đáp án)
13. Câu hỏi ôn tập (kèm đáp án)
14. Bảng tra cứu nhanh và thuật ngữ
15. Câu thần chú và kế hoạch ôn 3 buổi tối

---

## 1. Nền tảng: form, HTTP, các biến toàn cục

### 1.1 Hai phương thức GET và POST

| Tiêu chí | GET | POST |
|---|---|---|
| Dữ liệu nằm ở đâu | Trên thanh địa chỉ (URL), ví dụ `trang.php?ten=An&tuoi=20` | Trong phần thân (body) của yêu cầu HTTP, không hiện trên URL |
| Biến PHP nhận | `$_GET` | `$_POST` |
| Dung lượng | Giới hạn nhỏ (độ dài URL) | Lớn hơn nhiều |
| Dùng cho | Tìm kiếm, lọc, truyền tham số qua link | Đăng nhập, đăng ký, upload file, gửi dữ liệu nhạy cảm |
| Upload file | KHÔNG dùng được | BẮT BUỘC dùng POST |

Vì sao đăng nhập phải dùng POST: mật khẩu không được hiện trên URL, không bị lưu lại trong lịch sử trình duyệt.

### 1.2 Các biến toàn cục (superglobals) cần nhớ

| Biến | Chứa gì | Ví dụ |
|---|---|---|
| `$_GET` | Dữ liệu gửi bằng GET | `$_GET["id"]` |
| `$_POST` | Dữ liệu gửi bằng POST. Khóa là thuộc tính `name` của ô input | `$_POST["email"]` |
| `$_FILES` | Thông tin file được upload | `$_FILES["file"]["name"]` |
| `$_SESSION` | Dữ liệu lưu trên server theo từng người dùng | `$_SESSION["user"]` |
| `$_COOKIE` | Cookie do trình duyệt gửi lên | `$_COOKIE["saved_email"]` |

Quy tắc quan trọng: tên khóa của `$_POST` chính là thuộc tính `name` của thẻ input, KHÔNG phải `id`.

### 1.3 Kiểm tra người dùng đã bấm nút hay chưa

Đặt `name` cho nút submit rồi kiểm tra bằng `isset`:

```php
<form method="post" action="">
    <input type="text" name="txtten">
    <input type="submit" name="sbgui" value="Gửi">
</form>
<?php
// Biến $_POST["sbgui"] chỉ tồn tại sau khi người dùng bấm nút có name="sbgui"
if (isset($_POST["sbgui"])) {
    echo "Xin chào " . htmlspecialchars($_POST["txtten"]);
}
?>
```

`action=""` nghĩa là gửi dữ liệu về chính trang hiện tại. Cách này cho phép form và phần xử lý nằm chung một file.

### 1.4 Thứ tự chạy của một trang PHP

PHP chạy từ trên xuống dưới trên server, sinh ra HTML rồi mới gửi cho trình duyệt. Hệ quả quan trọng: mọi lệnh cần thay đổi phần đầu (header) của phản hồi, gồm `header()`, `setcookie()`, `session_start()`, đều phải chạy TRƯỚC khi có bất kỳ ký tự nào được in ra (kể cả khoảng trắng hay dòng trống nằm trước thẻ mở PHP).

Nếu vi phạm, PHP báo lỗi `Warning: Cannot modify header information - headers already sent`.

---

## 2. Đăng nhập cơ bản (buổi 2, file `login.php`)

Đây là bản đơn giản nhất: so sánh trực tiếp với tài khoản cố định, chưa dùng session.

```php
<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo UTF-8 để hiển thị tiếng Việt không lỗi font -->
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>

    <!-- method="post": gửi bằng POST. action="": gửi về chính trang này -->
    <form method="post" action="">
        <label>Email:</label>
        <!-- name="txtemail" là khóa để lấy bằng $_POST["txtemail"] -->
        <input type="text" name="txtemail"><br><br>

        <label>Password:</label>
        <!-- type="password" che ký tự khi nhập -->
        <input type="password" name="txtpassword"><br><br>

        <!-- name="sbdangnhap" để PHP biết nút đã được bấm -->
        <input type="submit" name="sbdangnhap" value="Đăng nhập">
    </form>

    <?php
    // Chỉ xử lý khi nút Đăng nhập đã được bấm
    if (isset($_POST["sbdangnhap"])) {
        // Lấy dữ liệu người dùng nhập
        $email = $_POST["txtemail"];
        $password = $_POST["txtpassword"];

        // && nghĩa là "và": cả email và mật khẩu đều phải đúng
        if ($email == "abc@gmail.com" && $password == "123456") {
            echo "Chúc mừng đăng nhập thành công!";
        } else {
            echo "Đăng nhập thất bại";
        }
    }
    ?>
</body>
</html>
```

Hạn chế của bản này (để trả lời câu hỏi "vì sao cần session"): sau khi đăng nhập, server không "nhớ" người dùng. Chuyển sang trang khác là coi như chưa đăng nhập. Muốn nhớ trạng thái đăng nhập qua nhiều trang phải dùng session.

---

## 3. Session và Cookie: lý thuyết

### 3.1 Vì sao cần session và cookie

HTTP là giao thức "không trạng thái": mỗi yêu cầu độc lập, server không tự nhớ yêu cầu trước. Session và cookie là hai cách để website "nhớ" người dùng giữa các trang.

### 3.2 So sánh Session và Cookie

| Tiêu chí | Session | Cookie |
|---|---|---|
| Dữ liệu lưu ở đâu | Trên server | Trên trình duyệt của người dùng |
| An toàn | An toàn hơn (người dùng không sửa được) | Kém an toàn (người dùng xem và sửa được) |
| Thời gian sống | Mặc định đến khi đóng trình duyệt hoặc hết hạn phía server | Do ta đặt bằng thời điểm hết hạn |
| Dung lượng | Lớn | Nhỏ (khoảng 4KB mỗi cookie) |
| Dùng cho | Trạng thái đăng nhập, giỏ hàng | Nhớ email, nhớ sở thích, ngôn ngữ |
| Đọc ghi | `$_SESSION` | `setcookie()` để ghi, `$_COOKIE` để đọc |

### 3.3 Cơ chế hoạt động của session

1. Gọi `session_start()`: PHP tạo (hoặc tìm lại) một phiên, sinh mã định danh (session id), gửi mã này cho trình duyệt dưới dạng cookie tên `PHPSESSID`.
2. Dữ liệu thật (`$_SESSION`) nằm trên server, gắn với session id đó.
3. Các lần yêu cầu sau, trình duyệt gửi kèm `PHPSESSID`, server tìm lại đúng phiên và nạp vào `$_SESSION`.

Vì vậy mọi file dùng `$_SESSION` đều phải gọi `session_start()` ở đầu file.

### 3.4 Các hàm session cần thuộc

| Hàm | Công dụng |
|---|---|
| `session_start()` | Bắt đầu hoặc khôi phục phiên. Đặt ở dòng đầu file, trước mọi HTML |
| `$_SESSION["k"] = v` | Ghi dữ liệu vào session |
| `isset($_SESSION["k"])` | Kiểm tra biến session đã tồn tại chưa |
| `unset($_SESSION["k"])` | Xóa MỘT biến session |
| `session_unset()` | Xóa TẤT CẢ biến session |
| `session_destroy()` | Hủy toàn bộ phiên |

### 3.5 Cookie: hàm `setcookie`

```php
setcookie(ten, giatri, hethan, duongdan);
//        1    2       3       4
```

- `ten`: tên cookie.
- `giatri`: giá trị lưu.
- `hethan`: thời điểm hết hạn, tính bằng giây theo thời gian Unix. Viết `time() + 3600 * 24 * 30` nghĩa là 30 ngày kể từ bây giờ.
- `duongdan`: `"/"` nghĩa là cookie dùng được trên toàn bộ website.

Ví dụ:

```php
// Tạo cookie 30 ngày
setcookie("saved_email", "abc@gmail.com", time() + 3600 * 24 * 30, "/");

// Xóa cookie: đặt hạn ở quá khứ
setcookie("saved_email", "", time() - 3600, "/");

// Đọc cookie: nhớ kiểm tra tồn tại trước
if (isset($_COOKIE["saved_email"])) {
    echo $_COOKIE["saved_email"];
}
```

Lưu ý quan trọng: cookie vừa được `setcookie()` trong lần yêu cầu hiện tại sẽ KHÔNG xuất hiện ngay trong `$_COOKIE` của chính yêu cầu đó. Nó chỉ có mặt từ lần yêu cầu kế tiếp (khi trình duyệt gửi lại cookie).

### 3.6 Chuyển trang bằng `header`

```php
header("location:trangchu.php");
exit();
```

`exit()` ngay sau `header` để dừng code, tránh các dòng phía dưới vẫn chạy tiếp. Phải đặt trước mọi đầu ra HTML.

---

## 4. Đăng ký, đăng nhập, đăng xuất bằng Session (bài 4.2)

Luồng chương trình:

1. `dangky.php`: lưu thông tin đăng ký vào `$_SESSION["thongtin_dangky"]`, rồi chuyển sang `dangnhap.php`.
2. `dangnhap.php`: so sánh email và mật khẩu với tài khoản đã đăng ký (nếu chưa đăng ký thì dùng tài khoản mặc định `admin@gmail.com` / `123456`). Đúng thì lưu `$_SESSION["user"]`, chuyển sang `trangchu.php`.
3. `trangchu.php`: kiểm tra `isset($_SESSION["user"])` để đổi menu: chưa đăng nhập thì hiện Đăng ký và Đăng nhập, đã đăng nhập thì hiện Đăng xuất và tên người dùng.
4. `dangxuat.php`: xóa session, chuyển về `trangchu.php`.

Yêu cầu đề bài gốc:
- a) Đã đăng nhập mà vào lại trang đăng nhập thì chuyển về trang chủ.
- b) Đăng ký thành công thì chuyển sang trang đăng nhập.
- c) Đăng nhập thành công về trang chủ; trang chủ khi đã đăng nhập có thêm Đăng xuất và mất mục Đăng nhập.
- d) Bấm Đăng xuất thì xóa session.

### 4.1 `dangky.php` (bản đầy đủ theo bài gốc)

```php
<?php
// Bắt đầu session ở dòng đầu tiên
session_start();

// Chỉ xử lý khi đã bấm nút Đăng ký
if (isset($_POST["sbdangky"])) {
    // Lưu toàn bộ thông tin đăng ký vào một mảng kết hợp trong session
    $_SESSION["thongtin_dangky"] = array(
        "email"     => $_POST["email"],
        "password"  => $_POST["password"],
        "hoten"     => $_POST["hoten"],
        "quequan"   => $_POST["quequan"],
        "dienthoai" => $_POST["dienthoai"],
        "gioitinh"  => $_POST["gioitinh"],
        "sothich"   => $_POST["sothich"]   // checkbox name="sothich[]" nên đây là mảng
    );

    // b) Đăng ký thành công thì chuyển về trang đăng nhập
    header("location:dangnhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký thành viên</title>
</head>
<body>
    <h2>Đăng ký thông tin</h2>
    <form method="post" action="">
        <label>Email:</label>
        <!-- type="email" tự kiểm tra định dạng email; required bắt buộc nhập -->
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Nhập lại password:</label>
        <input type="password" name="repassword" required><br>

        <label>Họ tên:</label>
        <input type="text" name="hoten" required><br>

        <label>Quê quán:</label>
        <!-- select: danh sách chọn một. Giá trị gửi đi là value của option được chọn -->
        <select name="quequan">
            <option value="Hà Nội">Hà Nội</option>
            <option value="Đà Nẵng">Đà Nẵng</option>
            <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
            <option value="Cần Thơ">Cần Thơ</option>
        </select><br>

        <label>Điện thoại:</label>
        <input type="text" name="dienthoai" required><br>

        <label>Giới tính:</label>
        <!-- radio cùng name thì chỉ chọn được một. checked là chọn sẵn -->
        <input type="radio" name="gioitinh" value="Nam" checked> Nam
        <input type="radio" name="gioitinh" value="Nữ"> Nữ<br>

        <label>Sở thích:</label>
        <!-- checkbox: name có [] để gom nhiều lựa chọn thành mảng -->
        <input type="checkbox" name="sothich[]" value="Màu xanh"> Màu xanh
        <input type="checkbox" name="sothich[]" value="Màu đỏ"> Màu đỏ
        <input type="checkbox" name="sothich[]" value="Đồng quê"> Đồng quê
        <input type="checkbox" name="sothich[]" value="Cao nguyên"> Cao nguyên<br>

        <input type="submit" name="sbdangky" value="Đăng ký">
        <!-- reset đưa form về trạng thái ban đầu -->
        <input type="reset" value="Làm lại">
    </form>
</body>
</html>
```

Điểm cần nhớ về các loại ô nhập:
- `radio` cùng `name`: chọn một, `$_POST["gioitinh"]` là chuỗi.
- `checkbox` có `name="x[]"`: chọn nhiều, `$_POST["x"]` là mảng. Nếu không tích ô nào thì khóa này KHÔNG tồn tại trong `$_POST` (nên dùng `isset`).
- `select`: chọn một, giá trị là `value` của `option`.

Bản gốc trong bài chưa kiểm tra nhập lại mật khẩu. Nếu đề yêu cầu thì thêm:

```php
// Kiểm tra mật khẩu nhập lại khớp nhau trước khi lưu
if ($_POST["password"] != $_POST["repassword"]) {
    $loi = "Mật khẩu nhập lại không khớp";
} else {
    // ... lưu vào session và chuyển trang như trên
}
```

### 4.2 `dangnhap.php` (có chú thích từng dòng)

```php
<?php
// BẮT: session_start() ở dòng đầu tiên, trước mọi HTML
session_start();

// CHẶN: a) đã đăng nhập thì không cho vào trang đăng nhập, chuyển về trang chủ
if (isset($_SESSION["user"])) {
    header("location:trangchu.php");
    exit(); // dừng code ngay
}

// Biến chứa thông báo lỗi, ban đầu rỗng
$thongbao = "";

// Chỉ xử lý khi đã bấm nút Đăng nhập
if (isset($_POST["sbdangnhap"])) {
    // Lấy dữ liệu người dùng nhập
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Lấy tài khoản đã đăng ký trong session. Nếu chưa đăng ký thì dùng tài khoản mặc định
    $user_dk = isset($_SESSION["thongtin_dangky"])
        ? $_SESSION["thongtin_dangky"]
        : array("email" => "admin@gmail.com", "password" => "123456", "hoten" => "Quản trị viên");

    // SO: cả email và mật khẩu đều khớp
    if ($email == $user_dk["email"] && $password == $user_dk["password"]) {
        // LƯU: ghi vào session để các trang khác biết đã đăng nhập
        $_SESSION["user"] = $user_dk;

        // NHỚ: nếu tích ô "Nhớ thông tin đăng nhập" thì lưu cookie 30 ngày
        if (isset($_POST["chknhothongtin"])) {
            setcookie("saved_email", $email, time() + 3600 * 24 * 30, "/");
        } else {
            // Không tích thì xóa cookie (đặt hạn ở quá khứ)
            setcookie("saved_email", "", time() - 3600, "/");
        }

        // CHUYỂN: c) đăng nhập thành công về trang chủ
        header("location:trangchu.php");
        exit();
    } else {
        $thongbao = "Email hoặc mật khẩu không chính xác!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập thông tin</h2>

    <!-- Có thông báo lỗi thì in ra màu đỏ -->
    <?php if ($thongbao != "") { echo "<p style='color:red;'>$thongbao</p>"; } ?>

    <form method="post" action="">
        <label>Email:</label>
        <!-- Nếu có cookie saved_email thì điền sẵn vào ô email -->
        <input type="email" name="email"
               value="<?php echo isset($_COOKIE['saved_email']) ? htmlspecialchars($_COOKIE['saved_email']) : ''; ?>" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <!-- Có cookie thì tự tích sẵn ô nhớ -->
        <input type="checkbox" name="chknhothongtin"
               <?php echo isset($_COOKIE['saved_email']) ? 'checked' : ''; ?>> Nhớ thông tin đăng nhập<br>

        <input type="submit" name="sbdangnhap" value="Đăng nhập">
        <input type="reset" value="Làm lại">
    </form>
</body>
</html>
```

### 4.3 `trangchu.php`

```php
<?php
// BẮT: trang nào dùng $_SESSION cũng phải session_start()
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
</head>
<body>
    <ul>
        <li><a href="trangchu.php">Trang chủ</a></li>
        <?php if (!isset($_SESSION["user"])) { ?>
            <!-- Chưa đăng nhập: hiện Đăng ký và Đăng nhập -->
            <li><a href="dangky.php">Đăng ký</a></li>
            <li><a href="dangnhap.php">Đăng nhập</a></li>
        <?php } else { ?>
            <!-- c) Đã đăng nhập: hiện Đăng xuất, mất mục Đăng nhập -->
            <li><a href="dangxuat.php">Đăng xuất</a></li>
        <?php } ?>
    </ul>

    <h2>Nội dung trang chủ</h2>
    <?php if (isset($_SESSION["user"])) { ?>
        <!-- Lấy thông tin từ mảng đã lưu trong session -->
        <p>Xin chào: <b><?php echo htmlspecialchars($_SESSION["user"]["hoten"]); ?></b></p>
        <p>Email: <?php echo htmlspecialchars($_SESSION["user"]["email"]); ?></p>
    <?php } else { ?>
        <p>Vui lòng đăng nhập để sử dụng đầy đủ chức năng.</p>
    <?php } ?>
</body>
</html>
```

### 4.4 `dangxuat.php`

File này KHÔNG được chứa HTML, vì `header()` chỉ hoạt động khi chưa có đầu ra.

```php
<?php
// BẮT: không có session_start() thì không thao tác được $_SESSION
session_start();
// BỎ: xóa biến lưu thông tin đăng nhập
unset($_SESSION["user"]);
// HỦY: phá hủy toàn bộ phiên
session_destroy();
// CHUYỂN: d) quay về trang chủ rồi dừng
header("location:trangchu.php");
exit();
?>
```

---

## 5. Cookie đổi màu header (bài 4.3)

Yêu cầu: ở form Đăng ký, nếu người dùng chọn sở thích "màu xanh" hoặc "màu đỏ" thì header của website đổi theo màu đó. Khi đăng nhập lại, màu vẫn được duy trì 10 ngày.

Các bước theo slide:

- Bước 1: tạo 2 class CSS:

```css
header.bg_green { background: green !important; }
header.bg_red   { background: red !important; }
```

- Bước 2: đặt `value` của lựa chọn sở thích tương ứng là `bg_green` và `bg_red`.
- Bước 3: dùng cookie. Khi đăng ký lưu cookie `remember` (100 ngày). Khi đăng nhập đọc `remember`, nếu đúng email thì tạo cookie `bgcolor` (10 ngày).
- Bước 4: gắn class vào header: `<header class="<?php echo isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : ''; ?>">`.

### 5.1 Khi đăng ký: lưu cookie `remember`

```php
// Cookie lưu chuỗi dạng "dkemail=...&dksothich=..." sống 100 ngày
setcookie("remember",
          "dkemail=" . $_POST['email'] . "&dksothich=" . $_POST['sothich'],
          time() + 3600 * 24 * 100,
          "/");
```

### 5.2 Khi đăng nhập: đọc `remember` rồi tạo `bgcolor`

```php
if (isset($_POST["sbdangnhap"])) {
    // Nếu có cookie remember (đã từng đăng ký)
    if (isset($_COOKIE["remember"])) {
        // parse_str tách chuỗi "dkemail=a@b.com&dksothich=bg_red" thành mảng $result
        parse_str($_COOKIE["remember"], $result);

        // Chỉ đổi màu nếu email đăng nhập trùng email đã đăng ký
        if ($_POST["email"] == $result["dkemail"]) {
            // Tạo cookie bgcolor sống 10 ngày
            setcookie("bgcolor", $result["dksothich"], time() + 3600 * 24 * 10, "/");
        }
    }
    // ... phần kiểm tra đăng nhập như bài 4.2
}
```

Ghi nhớ: `parse_str($chuoi, $mang)` biến chuỗi truy vấn `a=1&b=2` thành mảng `["a" => "1", "b" => "2"]`.

Lưu ý: cookie `bgcolor` vừa tạo trong lần yêu cầu đăng nhập sẽ chỉ có trong `$_COOKIE` ở trang kế tiếp. Vì thế sau khi `header("location:trangchu.php")` thì trang chủ mới thấy được màu mới.

---

## 6. Phân tích lỗi session và đăng xuất (bài 4.1)

Đề đưa hai trang `session.php` và `dangxuat.php` bị lỗi. Câu hỏi:

- a) Hai trang sai hoặc chưa chính xác ở đâu về cú pháp PHP?
- b) Mô tả kết quả khi thực thi.
- c) Để hoàn thiện đăng xuất (xóa session) cần làm thế nào?

### 6.1 Code gốc (có lỗi)

`session.php`:

```php
<?php session_start(); ?>
<html>
<body>
<form method="post">
    <input type="text" name="txtthongtin">
    <input type="submit" value="Gán" name="sbgan">
</form>
<?php
if (isset($_POST["sbgan"])) {
    $_SESSION["ThongTin"] = $_POST["txtthongtin"];
}
if ($_SESSION["ThongTin"]) {
    echo "Giá trị biến session là: " . $_SESSION["ThongTin"] . ". <a href='logout.php'>Đăng xuất</a>";
} else {
    echo "Giá trị biến session chưa được gán";
}
?>
</body>
</html>
```

`dangxuat.php`:

```php
<html>
<head><title>Đăng xuất</title></head>
<body>
<?php
if ($_SESSION["ThongTin"]) {
    unset($_SESSION["ThongTin"]);
}
header("Location: session.php");
?>
</body>
</html>
```

### 6.2 Đáp án câu a: 4 lỗi

| # | Trang | Lỗi | Giải thích và cách sửa |
|---|---|---|---|
| 1 | `dangxuat.php` | Thiếu `session_start()` | Muốn dùng `$_SESSION` bắt buộc phải gọi `session_start()` ở đầu file |
| 2 | `dangxuat.php` | Gọi `header()` sau khi đã in HTML | Các thẻ `<html><head>...` đã được xuất ra trước `header()`, gây lỗi *headers already sent* và không chuyển trang được. `header()` phải đặt trước mọi HTML |
| 3 | Cả hai trang | `if ($_SESSION["ThongTin"])` không có `isset` | Khi biến chưa tồn tại sẽ báo *Undefined index*. Sửa: `isset($_SESSION["ThongTin"])` |
| 4 | `session.php` | Link `logout.php` sai tên | File thật tên là `dangxuat.php` nên bấm vào sẽ báo 404 |

### 6.3 Đáp án câu b: kết quả khi chạy

- Mở `session.php` lần đầu: hiện form và dòng "Giá trị biến session chưa được gán".
- Nhập chuỗi, bấm Gán: trang tải lại, lưu vào `$_SESSION["ThongTin"]` và hiện "Giá trị biến session là: [nội dung]" kèm link Đăng xuất.
- Bấm Đăng xuất: do link sai tên nên gặp lỗi 404. Nếu sửa đúng tên file mà chưa sửa các lỗi khác thì `dangxuat.php` không có `session_start()` nên không đọc được session, và HTML đã in trước `header()` nên không chuyển trang được, session không bị xóa.

### 6.4 Đáp án câu c: `dangxuat.php` hoàn chỉnh

```php
<?php
session_start();                // 1. bắt đầu session
unset($_SESSION["ThongTin"]);   // 2. xóa biến (hoặc session_unset() để xóa tất cả)
session_destroy();              // 3. hủy phiên
header("Location: session.php"); // 4. chuyển trang, không in HTML trước đó
exit();                         // 5. dừng
?>
```

Phân biệt: `unset($_SESSION["k"])` xóa một biến; `session_unset()` xóa mọi biến nhưng phiên vẫn còn; `session_destroy()` hủy phiên. Làm đăng xuất chuẩn thường dùng cả `unset` (hoặc `session_unset`) và `session_destroy`.

---

## 7. Upload file: lý thuyết

### 7.1 Hai điều kiện bắt buộc của form upload

```html
<form method="POST" action="" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="sbupload" value="Upload">
</form>
```

1. `method="POST"`: dữ liệu file lớn, không dùng GET được.
2. `enctype="multipart/form-data"`: để trình duyệt đóng gói file nhị phân gửi lên. Thiếu thuộc tính này thì `$_FILES` rỗng hoàn toàn. Đây là lỗi hay mất điểm nhất.

### 7.2 Mảng `$_FILES`

Khóa đầu tiên là thuộc tính `name` của ô input type="file". Với `name="file"`, ta dùng `$_FILES["file"]`. Mảng này có đúng 5 phần tử:

| Khóa | Ý nghĩa | Ví dụ |
|---|---|---|
| `name` | Tên file gốc trên máy người dùng | `anh.jpg` |
| `type` | Loại MIME do trình duyệt báo (có thể bị giả mạo) | `image/jpeg` |
| `tmp_name` | Đường dẫn file tạm trên server | `/tmp/phpAbC123` |
| `size` | Dung lượng, đơn vị byte | `51200` |
| `error` | Mã lỗi, 0 là không lỗi | `0` |

File được upload trước hết nằm ở thư mục tạm. Nếu không dùng `move_uploaded_file` để chuyển đi thì file tạm bị xóa khi trang chạy xong.

### 7.3 Bảng mã lỗi `error`

| Mã | Hằng số | Ý nghĩa |
|---|---|---|
| 0 | `UPLOAD_ERR_OK` | Thành công |
| 1 | `UPLOAD_ERR_INI_SIZE` | Vượt `upload_max_filesize` trong `php.ini` |
| 2 | `UPLOAD_ERR_FORM_SIZE` | Vượt `MAX_FILE_SIZE` khai báo trong form |
| 3 | `UPLOAD_ERR_PARTIAL` | File chỉ tải lên được một phần |
| 4 | `UPLOAD_ERR_NO_FILE` | Không có file nào được chọn |
| 6 | `UPLOAD_ERR_NO_TMP_DIR` | Thiếu thư mục tạm |
| 7 | `UPLOAD_ERR_CANT_WRITE` | Không ghi được file ra đĩa |
| 8 | `UPLOAD_ERR_EXTENSION` | Một extension của PHP chặn upload |

Chỉ cần nhớ: 0 là tốt, lớn hơn 0 là có lỗi; 1 là quá dung lượng cấu hình; 4 là chưa chọn file.

### 7.4 Quy trình xử lý upload 7 bước

1. Kiểm tra đã bấm nút và có `$_FILES["file"]`.
2. Kiểm tra `error`: lớn hơn 0 thì báo lỗi.
3. Kiểm tra dung lượng: `size > 2 * 1024 * 1024` thì quá 2MB.
4. Tách tên và đuôi bằng `pathinfo()`.
5. Tạo tên mới tránh trùng (ví dụ ghép số ngẫu nhiên hoặc `time()`).
6. Tạo thư mục đích nếu chưa có (`is_dir`, `mkdir`).
7. Chuyển file bằng `move_uploaded_file($tmp_name, $duong_dan_dich)`.

### 7.5 Các hàm cần thuộc

| Hàm | Công dụng | Ví dụ |
|---|---|---|
| `pathinfo($ten, PATHINFO_FILENAME)` | Lấy tên không đuôi | `anh.jpg` thì được `anh` |
| `pathinfo($ten, PATHINFO_EXTENSION)` | Lấy đuôi file | `anh.jpg` thì được `jpg` |
| `strtolower($s)` | Đổi chữ thường | `JPG` thì được `jpg` |
| `rand(100, 999)` | Số ngẫu nhiên trong khoảng | `532` |
| `time()` | Thời gian hiện tại tính bằng giây | `1790000000` |
| `is_dir($p)` | Thư mục có tồn tại không | `true` / `false` |
| `mkdir($p, 0777, true)` | Tạo thư mục, `true` cho phép tạo nhiều cấp | |
| `move_uploaded_file($tmp, $dich)` | Chuyển file upload, trả về `true` nếu thành công | |
| `in_array($x, $mang)` | `$x` có nằm trong mảng không | `in_array("jpg", array("jpg","png"))` |
| `basename($p)` | Lấy phần tên file cuối của đường dẫn | `a/b/c.txt` thì được `c.txt` |
| `file_exists($p)` | File có tồn tại không | |
| `unlink($p)` | Xóa file vĩnh viễn | |
| `scandir($dir)` | Liệt kê tên file trong thư mục (kèm `.` và `..`) | |
| `filesize($p)` | Dung lượng file, byte | |
| `count($mang)` | Số phần tử mảng | |
| `htmlspecialchars($s)` | Mã hóa ký tự đặc biệt khi in ra HTML | |

### 7.5.1 Đổi đơn vị

- 1 KB = 1024 byte.
- 1 MB = 1024 KB = `1024 * 1024` byte.
- 2 MB = `2 * 1024 * 1024` = 2.097.152 byte.
- Đổi byte ra KB để in: `round($size / 1024)`.

### 7.6 Cấu hình dung lượng trong `php.ini` (bài 3.5)

PHP có giới hạn mặc định, thường là 2MB cho mỗi file. Muốn upload file lớn hơn (ví dụ 100MB) phải sửa `php.ini`:

```ini
upload_max_filesize = 100M   ; dung lượng tối đa của MỘT file
post_max_size = 100M         ; dung lượng tối đa của TOÀN BỘ dữ liệu POST, phải lớn hơn hoặc bằng upload_max_filesize
max_file_uploads = 20        ; số file tối đa mỗi lần upload
memory_limit = 128M          ; (tham khảo) bộ nhớ tối đa của script
```

Sau khi sửa phải khởi động lại web server (Apache). Kiểm tra bằng file chứa `phpinfo();` rồi tìm `upload_max_filesize`.

---

## 8. Upload file: toàn bộ code (bài 3.1 đến 3.5)

### 8.1 Bài 3.1: upload cơ bản, xem cấu trúc `$_FILES`

```php
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Chọn file từ máy tính:</label>
    <!-- name="file" là khóa dùng trong $_FILES["file"] -->
    <input type="file" name="file" required>
    <input type="submit" name="sbupload" value="Upload file">
</form>
<?php
// Kiểm tra đã bấm nút Upload chưa
if (isset($_POST["sbupload"])) {
    echo "<h3>Kết quả sau khi Upload file:</h3>";
    // <pre> giữ nguyên định dạng xuống dòng khi in mảng
    echo "<pre>";
    // var_dump in chi tiết kiểu dữ liệu và giá trị: name, type, tmp_name, error, size
    var_dump($_FILES["file"]);
    echo "</pre>";
}
?>
```

Bài này chưa lưu file đi đâu, chỉ để quan sát 5 khóa của `$_FILES`.

### 8.2 Bài 3.2: upload ảnh, giới hạn 2MB, đổi tên tự động

Thần chú: **Fo – Lỗi – Cỡ – Tên – Mục – Dời** (Form, kiểm tra lỗi, kiểm tra cỡ, đổi tên, tạo thư mục, dời file).

```php
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Chọn file ảnh (tối đa 2MB):</label>
    <input type="file" name="file" required>
    <input type="submit" name="sbupload" value="Upload file">
</form>
<hr>
<?php
// Bước 1: đã bấm nút và có dữ liệu file
if (isset($_POST["sbupload"]) && isset($_FILES["file"])) {

    // Gán ra biến ngắn cho dễ đọc
    $file = $_FILES["file"];

    // Bước 2 (LỖI): error lớn hơn 0 nghĩa là có sự cố
    if ($file["error"] > 0) {
        echo "<p style='color:red;'>Lỗi trong quá trình upload! Mã lỗi: " . $file["error"] . "</p>";
    } else {

        // Bước 3 (CỠ): 2MB = 2 * 1024 * 1024 byte
        $max_size = 2 * 1024 * 1024;
        if ($file["size"] > $max_size) {
            echo "<p style='color:red;'>Lỗi: Dung lượng file vượt quá giới hạn 2MB!</p>";
        } else {

            // Bước 4 (TÊN): tách tên gốc và đuôi
            $original_name = $file["name"];
            $file_name_only = pathinfo($original_name, PATHINFO_FILENAME);       // "anhtest"
            $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));    // "jpg"

            // Bước 5: tạo tên mới tránh trùng: <tên>_<số ngẫu nhiên 100-999>.<đuôi>
            $new_file_name = $file_name_only . "_" . rand(100, 999) . "." . $ext;

            // Đường dẫn thư mục đích và đường dẫn lưu file hoàn chỉnh
            $target_dir = "upload/";
            $target_path = $target_dir . $new_file_name;

            // Bước 6 (MỤC): tạo thư mục upload/ nếu chưa có
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Bước 7 (DỜI): chuyển file từ thư mục tạm sang thư mục đích
            if (move_uploaded_file($file["tmp_name"], $target_path)) {

                echo "<h3>Kết quả sau khi Upload thành công:</h3>";
                echo "<b>Tên file ban đầu:</b> " . htmlspecialchars($original_name) . "<br>";
                echo "<b>Tên file thay đổi:</b> " . htmlspecialchars($new_file_name) . "<br>";
                echo "<b>Kích thước:</b> " . round($file["size"] / 1024) . " KB<br>";
                echo "<b>Loại file (MIME):</b> " . htmlspecialchars($file["type"]) . "<br>";
                echo "<b>Tên file tạm trên server:</b> " . htmlspecialchars($file["tmp_name"]) . "<br><br>";

                // Nếu là ảnh thì hiển thị xem trước
                $allow_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $allow_ext)) {
                    echo "<b>Hình ảnh sau khi upload:</b><br>";
                    echo "<img src='" . $target_path . "' width='250' style='border:1px solid #ccc; padding:5px;'><br>";
                } else {
                    echo "<i>Không phải file ảnh (không hỗ trợ xem trước).</i>";
                }
            } else {
                echo "<p style='color:red;'>Không thể lưu file vào thư mục đích! Kiểm tra quyền ghi thư mục.</p>";
            }
        }
    }
}
?>
```

### 8.3 Bài 3.3: upload nhiều file cùng lúc

Khác bài 3.2 đúng 3 chỗ:

1. Ô input: `name="file[]"` (có `[]`) và thêm thuộc tính `multiple`.
2. Số file: `count($_FILES["file"]["name"])`.
3. Mọi khóa đều thêm chỉ số `[$i]`.

```php
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Chọn một hoặc nhiều file:</label>
    <!-- [] báo cho PHP gom thành mảng; multiple cho chọn nhiều file (giữ Ctrl/Shift) -->
    <input type="file" name="file[]" multiple required>
    <input type="submit" name="sbupload" value="Upload file">
</form>
<hr>
<?php
if (isset($_POST["sbupload"]) && isset($_FILES["file"])) {
    echo "<h3>Kết quả sau khi Upload:</h3>";

    // Đếm tổng số file người dùng đã chọn
    $total_files = count($_FILES["file"]["name"]);
    $target_dir = "upload/";

    // Tạo thư mục đích nếu chưa có
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Duyệt từng file theo chỉ số $i
    for ($i = 0; $i < $total_files; $i++) {

        // Bỏ qua nếu phần tử không có tên file
        if (empty($_FILES["file"]["name"][$i])) continue;

        // Lấy thông tin file thứ $i. Chú ý [$i] ở cuối mỗi khóa
        $original_name = $_FILES["file"]["name"][$i];
        $tmp_name      = $_FILES["file"]["tmp_name"][$i];
        $file_size     = $_FILES["file"]["size"][$i];
        $file_type     = $_FILES["file"]["type"][$i];
        $file_error    = $_FILES["file"]["error"][$i];

        // Tách tên, đuôi và sinh tên mới
        $name_only = pathinfo($original_name, PATHINFO_FILENAME);
        $ext       = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
        $new_name  = $name_only . "_" . rand(100, 999) . "." . $ext;
        $target_path = $target_dir . $new_name;

        echo "<b>Tên file ban đầu:</b> " . htmlspecialchars($original_name) . "<br>";
        echo "<b>Tên file thay đổi:</b> " . htmlspecialchars($new_name) . "<br>";
        echo "<b>Kích thước:</b> " . round($file_size / 1024) . " KB<br>";
        echo "<b>Loại file:</b> " . htmlspecialchars($file_type) . "<br>";

        // Kiểm tra lỗi và dung lượng của TỪNG file
        if ($file_error > 0) {
            echo "<span style='color:red;'>Lỗi khi upload! (Mã: $file_error)</span>";
        } elseif ($file_size > 2 * 1024 * 1024) {
            echo "<span style='color:red;'>Lỗi: Dung lượng vượt quá 2MB!</span>";
        } else {
            if (move_uploaded_file($tmp_name, $target_path)) {
                $allow_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $allow_ext)) {
                    echo "<img src='" . $target_path . "' width='150'>";
                } else {
                    echo "<i>Không phải file ảnh</i>";
                }
            } else {
                echo "<span style='color:red;'>Lưu file thất bại!</span>";
            }
        }
        echo "<hr>";
    }
}
?>
```

Cấu trúc `$_FILES` khi nhiều file: `$_FILES["file"]["name"]` là một mảng chứa tên của mọi file; `$_FILES["file"]["tmp_name"]` là mảng chứa mọi đường dẫn tạm; tương tự cho `size`, `type`, `error`. Do đó file thứ i có tên ở `["name"][$i]`.

### 8.4 Bài 3.4: upload, liệt kê và xóa file

Thần chú: **Tạo – Upload – Xóa – Liệt kê**.

```php
<form action="quanlyfile.php" method="POST" enctype="multipart/form-data">
    <label>Chọn file cần upload:</label>
    <input type="file" name="file" required>
    <input type="submit" name="sbupload" value="Upload file">
</form>
<hr>
<?php
$upload_dir = "upload/";

// Tạo thư mục nếu chưa có
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// PHẦN 1: tải file lên
if (isset($_POST["sbupload"]) && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    if ($file["error"] == 0) {
        // basename() lấy phần tên file, loại bỏ mọi thư mục đi kèm để ghép đường dẫn an toàn
        $dest = $upload_dir . basename($file["name"]);

        if (move_uploaded_file($file["tmp_name"], $dest)) {
            echo "<p style='color:green;'>Upload thành công: " . htmlspecialchars($file["name"]) . "</p>";
        } else {
            echo "<p style='color:red;'>Lỗi: Không thể lưu file!</p>";
        }
    } else {
        echo "<p style='color:red;'>Lỗi khi tải file lên (Mã lỗi: " . $file["error"] . ")</p>";
    }
}

// PHẦN 2: xóa file khi bấm nút Xóa
if (isset($_POST["btn_delete"])) {
    // Đường dẫn file cần xóa được gửi qua input hidden
    $file_to_delete = $_POST["file_path"];

    // file_exists: kiểm tra file có thật không
    if (file_exists($file_to_delete)) {
        // unlink: xóa vĩnh viễn một file
        if (unlink($file_to_delete)) {
            echo "<p style='color:green;'>Đã xóa file: " . htmlspecialchars(basename($file_to_delete)) . "</p>";
        } else {
            echo "<p style='color:red;'>Lỗi: Không thể xóa file (kiểm tra quyền)!</p>";
        }
    } else {
        echo "<p style='color:red;'>Lỗi: File cần xóa không tồn tại!</p>";
    }
}

// PHẦN 3: liệt kê file hiện có
echo "<h3>Danh sách file hiện có trên Server:</h3>";
if (is_dir($upload_dir)) {
    // scandir trả về mảng tên các file và thư mục con
    $files = scandir($upload_dir);

    echo "<ul>";
    foreach ($files as $f) {
        // Bỏ qua "." (thư mục hiện tại) và ".." (thư mục cha)
        if ($f != "." && $f != "..") {
            $path = $upload_dir . $f;

            echo "<li>";
            // filesize trả về byte, chia 1024 ra KB
            echo "<b>" . htmlspecialchars($f) . "</b> (" . round(filesize($path) / 1024) . " KB) ";

            // Mỗi file có một form nhỏ chứa nút Xóa
            echo "<form action='quanlyfile.php' method='POST' style='display:inline;'>";
            // input hidden: lưu ngầm đường dẫn để gửi sang PHP khi bấm Xóa
            echo "<input type='hidden' name='file_path' value='" . htmlspecialchars($path) . "'>";
            // onclick confirm: hỏi lại trước khi xóa để tránh bấm nhầm
            echo "<input type='submit' name='btn_delete' value='Xóa' onclick=\"return confirm('Bạn có chắc chắn muốn xóa file này không?');\">";
            echo "</form>";
            echo "</li>";
        }
    }
    echo "</ul>";
}
?>
```

Hai điểm yếu của bản gốc (đề nâng cao có thể hỏi), xem mục 9:
- Đường dẫn xóa lấy thẳng từ `$_POST`, người dùng sửa được.
- Upload không kiểm tra đuôi file.

Bản an toàn hơn cho phần xóa:

```php
if (isset($_POST["btn_delete"])) {
    // Chỉ nhận TÊN file, tự nối thư mục để không thoát ra ngoài upload/
    $path = $upload_dir . basename($_POST["file_path"]);
    if (file_exists($path)) {
        unlink($path);
    }
}
```

### 8.5 Bài 3.5: cấu hình dung lượng 100MB

Tạo file `check_info.php`:

```php
<?php
// Hiển thị toàn bộ cấu hình PHP. Tìm upload_max_filesize và post_max_size để kiểm tra
phpinfo();
?>
```

Việc cần làm: mở `php.ini`, đặt `upload_max_filesize = 100M` và `post_max_size = 100M`, khởi động lại Apache (XAMPP), mở lại `check_info.php` để xác nhận giá trị mới.

---

## 9. Bảo mật khi đăng nhập và upload

Phần này hay được hỏi ở dạng câu hỏi nâng cao hoặc "chỉ ra điểm yếu của đoạn code".

### 9.1 Đăng nhập

| Điểm yếu | Vì sao nguy hiểm | Cách khắc phục |
|---|---|---|
| Lưu mật khẩu dạng chữ rõ | Lộ dữ liệu là lộ mật khẩu | Lưu bằng `password_hash($mk, PASSWORD_DEFAULT)`, kiểm tra bằng `password_verify($mk, $hash)` |
| Cứng mật khẩu trong code | Ai đọc code cũng biết | Lưu trong cơ sở dữ liệu |
| In dữ liệu người dùng không mã hóa | Lỗi XSS (chèn mã script) | Dùng `htmlspecialchars()` khi `echo` |
| Không kiểm tra `repassword` khi đăng ký | Người dùng gõ nhầm mật khẩu | So sánh hai ô trước khi lưu |
| Trang cần đăng nhập mà không kiểm tra session | Ai biết URL cũng vào được | Đầu trang: `if (!isset($_SESSION["user"])) { header(...); exit(); }` |
| Quên `exit()` sau `header` | Code bên dưới vẫn chạy | Luôn `exit()` ngay sau `header` |
| Lưu thông tin nhạy cảm trong cookie | Người dùng xem và sửa được cookie | Chỉ lưu thông tin không nhạy cảm; trạng thái đăng nhập để trong session |

### 9.2 Upload

| Điểm yếu | Vì sao nguy hiểm | Cách khắc phục |
|---|---|---|
| Không kiểm tra đuôi file | Có thể up file `.php` rồi chạy trên server | Kiểm tra bằng `in_array($ext, $allow)` |
| Tin vào `$_FILES["file"]["type"]` | Do trình duyệt báo, giả mạo được | Kiểm tra đuôi và nội dung (ví dụ `getimagesize()` cho ảnh) |
| Ghép đường dẫn bằng tên file gốc | Tên như `../x.php` ghi ra ngoài thư mục | Dùng `basename()` hoặc đổi tên hoàn toàn (`time()` + đuôi) |
| Giữ nguyên tên gốc | Trùng tên thì file cũ bị ghi đè | Đổi tên có `time()` hoặc `rand()` |
| Xóa file theo đường dẫn nhận từ form | Bị sửa thành `../index.php` để xóa file khác (path traversal) | Chỉ nhận tên file rồi nối với thư mục cố định: `$dir . basename($_POST["x"])` |
| Không giới hạn dung lượng | Làm đầy ổ đĩa | Kiểm tra `size` và cấu hình `upload_max_filesize` |
| Không kiểm tra `error` | Xử lý file hỏng | `if ($file["error"] > 0)` |
| Dùng `rand()` để đặt tên | Vẫn có khả năng trùng | Dùng `time()` kết hợp chỉ số hoặc `uniqid()` |
| `mkdir(..., 0777)` | Quyền quá rộng | Dùng quyền hẹp hơn khi triển khai thật (trong bài học chấp nhận 0777) |

---

## 10. Đề tổng hợp: đăng nhập kết hợp upload (90 phút, có đáp án)

Hướng dẫn: tự làm trong 90 phút, không mở tài liệu. Hết giờ mới đối chiếu đáp án.

### Đề bài: Quản lý ảnh cá nhân

Xây dựng website gồm 3 trang.

**Câu 1: `dangnhap.php` (3 điểm)**
- Form gồm email, mật khẩu, checkbox "Nhớ email" và nút Đăng nhập.
- Tài khoản cố định: `admin@gmail.com` / `123456`.
- Đúng thì lưu session rồi chuyển sang `upload.php`. Sai thì báo "Sai email hoặc mật khẩu" màu đỏ.
- Đã đăng nhập mà vào lại trang này thì tự chuyển sang `upload.php`.
- Chọn "Nhớ email" thì lưu cookie 7 ngày, lần sau email tự điền sẵn vào ô nhập.

**Câu 2: `upload.php` (5 điểm)**
- Chưa đăng nhập thì chuyển về `dangnhap.php`.
- Hiển thị "Xin chào, [email]" và link Đăng xuất.
- Form upload nhiều ảnh cùng lúc.
- Mỗi file: chỉ nhận `png, jpg, jpeg, gif`; tối đa 1MB; đổi tên thành `time()_chỉ số.đuôi`; lưu vào thư mục `upload/` (tự tạo nếu chưa có).
- Thông báo kết quả từng file (thành công hay lý do lỗi).
- Bên dưới hiển thị danh sách ảnh đã upload (rộng 120px) kèm nút Xóa có hỏi xác nhận.

**Câu 3: `dangxuat.php` (2 điểm)**
- Xóa session rồi chuyển về `dangnhap.php`.

### Đáp án câu 1: `dangnhap.php`

```php
<?php
session_start();

// Đã đăng nhập thì chuyển thẳng sang upload.php
if (isset($_SESSION["user"])) {
    header("location:upload.php");
    exit();
}

$thongbao = "";
if (isset($_POST["sbdangnhap"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == "admin@gmail.com" && $password == "123456") {
        // Lưu session đăng nhập
        $_SESSION["user"] = $email;

        // Nhớ email 7 ngày, hoặc xóa cookie nếu không tích
        if (isset($_POST["chknho"])) {
            setcookie("saved_email", $email, time() + 3600 * 24 * 7, "/");
        } else {
            setcookie("saved_email", "", time() - 3600, "/");
        }

        header("location:upload.php");
        exit();
    } else {
        $thongbao = "Sai email hoặc mật khẩu";
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Đăng nhập</title></head>
<body>
    <h2>Đăng nhập</h2>
    <?php if ($thongbao != "") { echo "<p style='color:red;'>$thongbao</p>"; } ?>
    <form method="post" action="">
        Email: <input type="email" name="email"
               value="<?php echo isset($_COOKIE['saved_email']) ? htmlspecialchars($_COOKIE['saved_email']) : ''; ?>" required><br>
        Mật khẩu: <input type="password" name="password" required><br>
        <input type="checkbox" name="chknho" <?php echo isset($_COOKIE['saved_email']) ? 'checked' : ''; ?>> Nhớ email<br>
        <input type="submit" name="sbdangnhap" value="Đăng nhập">
    </form>
</body>
</html>
```

### Đáp án câu 2: `upload.php`

```php
<?php
session_start();

// Chưa đăng nhập thì chặn và chuyển về trang đăng nhập
if (!isset($_SESSION["user"])) {
    header("location:dangnhap.php");
    exit();
}

$dir = "upload/";
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}
$thongbao = "";

// Xử lý upload nhiều ảnh
if (isset($_POST["sbupload"]) && isset($_FILES["file"])) {
    $allow = array("png", "jpg", "jpeg", "gif");
    $total = count($_FILES["file"]["name"]);

    for ($i = 0; $i < $total; $i++) {
        // Bỏ qua phần tử rỗng
        if (empty($_FILES["file"]["name"][$i])) continue;

        $name = $_FILES["file"]["name"][$i];
        $tmp  = $_FILES["file"]["tmp_name"][$i];
        $size = $_FILES["file"]["size"][$i];
        $err  = $_FILES["file"]["error"][$i];
        $ext  = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        if ($err > 0) {
            $thongbao .= htmlspecialchars($name) . ": lỗi upload<br>";
        } elseif (!in_array($ext, $allow)) {
            $thongbao .= htmlspecialchars($name) . ": sai định dạng<br>";
        } elseif ($size > 1 * 1024 * 1024) {
            $thongbao .= htmlspecialchars($name) . ": vượt quá 1MB<br>";
        } else {
            // Tên mới: time()_chỉ số.đuôi
            $moi = time() . "_" . $i . "." . $ext;
            if (move_uploaded_file($tmp, $dir . $moi)) {
                $thongbao .= htmlspecialchars($name) . ": thành công<br>";
            } else {
                $thongbao .= htmlspecialchars($name) . ": lưu thất bại<br>";
            }
        }
    }
}

// Xóa ảnh: chỉ nhận tên file, tự nối thư mục cố định
if (isset($_POST["btnxoa"])) {
    $path = $dir . basename($_POST["tenfile"]);
    if (file_exists($path)) {
        unlink($path);
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Upload ảnh</title></head>
<body>
    <p>Xin chào, <b><?php echo htmlspecialchars($_SESSION["user"]); ?></b> | <a href="dangxuat.php">Đăng xuất</a></p>

    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="file[]" multiple required>
        <input type="submit" name="sbupload" value="Upload">
    </form>

    <?php echo $thongbao; ?>
    <hr>
    <h3>Ảnh đã upload</h3>
    <?php
    foreach (scandir($dir) as $f) {
        if ($f == "." || $f == "..") continue;
        echo "<div style='float:left; margin:8px; text-align:center;'>";
        echo "<img src='" . $dir . htmlspecialchars($f) . "' width='120'><br>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='tenfile' value='" . htmlspecialchars($f) . "'>";
        echo "<input type='submit' name='btnxoa' value='Xóa' onclick=\"return confirm('Chắc chắn xóa?');\">";
        echo "</form></div>";
    }
    ?>
</body>
</html>
```

### Đáp án câu 3: `dangxuat.php`

```php
<?php
session_start();
unset($_SESSION["user"]);
session_destroy();
header("location:dangnhap.php");
exit();
?>
```

### Danh sách tự chấm

- `session_start()` ở dòng đầu mọi file có dùng session.
- `upload.php` chặn người chưa đăng nhập bằng `header` và `exit()`.
- Form upload có `enctype="multipart/form-data"` và `name="file[]"` kèm `multiple`.
- Dùng `[$i]` cho cả 4 khóa `name`, `tmp_name`, `size`, `error`.
- Kiểm tra đuôi bằng `in_array` và dung lượng bằng `1 * 1024 * 1024`.
- `move_uploaded_file` đúng thứ tự tham số (`tmp_name` trước, đích sau).
- Xóa file bằng `unlink` sau `file_exists`, có `confirm`.
- `dangxuat.php` không có HTML và có `exit()` sau `header`.

---

## 11. Bài điền chỗ trống (có đáp án)

### Bài 1: upload (10 chỗ trống)

```php
<form method="____(1)____" action="" enctype="____(2)____">
    <input type="____(3)____" name="file">
    <input type="submit" name="sbupload" value="Upload">
</form>
<?php
if (isset($_POST["sbupload"])) {
    $file = $____(4)____["file"];
    if ($file["____(5)____"] > 0) {
        echo "Lỗi";
    } elseif ($file["size"] > ____(6)____) {      // giới hạn 2MB
        echo "Quá lớn";
    } else {
        $ext = strtolower(____(7)____($file["name"], PATHINFO_EXTENSION));
        $moi = time() . "." . $ext;
        if (!____(8)____("upload/")) {
            mkdir("upload/", 0777, true);
        }
        if (____(9)____($file["____(10)____"], "upload/" . $moi)) {
            echo "OK";
        }
    }
}
?>
```

Đáp án bài 1: (1) `POST`; (2) `multipart/form-data`; (3) `file`; (4) `_FILES`; (5) `error`; (6) `2 * 1024 * 1024` (hoặc `2097152`); (7) `pathinfo`; (8) `is_dir`; (9) `move_uploaded_file`; (10) `tmp_name`.

### Bài 2: đăng nhập và đăng xuất (10 chỗ trống)

`dangnhap.php`:

```php
<?php
____(1)____();
if (isset($____(2)____["user"])) {
    ____(3)____("location:trangchu.php");
    ____(4)____();
}
if (isset($_POST["sbdangnhap"])) {
    if ($_POST["email"] == "admin@gmail.com" && $_POST["password"] == "123456") {
        $_SESSION["user"] = $_POST["email"];
        ____(5)____("saved_email", $_POST["email"], ____(6)____ + 3600 * 24 * 30, "/");
        header("location:trangchu.php");
        exit();
    }
}
?>
```

`dangxuat.php`:

```php
<?php
____(7)____();
unset($____(8)____["user"]);
____(9)____();
header("location:trangchu.php");
exit();
?>
```

`trangchu.php`:

```php
<?php if (____(10)____($_SESSION["user"])) { ?>
    <a href="dangxuat.php">Đăng xuất</a>
<?php } ?>
```

Đáp án bài 2: (1) `session_start`; (2) `_SESSION`; (3) `header`; (4) `exit`; (5) `setcookie`; (6) `time()`; (7) `session_start`; (8) `_SESSION`; (9) `session_destroy`; (10) `isset`.

### Bài 3: upload nhiều file (6 chỗ trống)

```php
<input type="file" name="file____(1)____" ____(2)____>
<?php
$total = ____(3)____($_FILES["file"]["name"]);
for ($i = 0; $i < $total; $i++) {
    $tmp = $_FILES["file"]["tmp_name"]____(4)____;
    $ten = $_FILES["file"]["name"]____(5)____;
    if (____(6)____($tmp, "upload/" . $ten)) {
        echo "OK: $ten<br>";
    }
}
?>
```

Đáp án bài 3: (1) `[]`; (2) `multiple`; (3) `count`; (4) `[$i]`; (5) `[$i]`; (6) `move_uploaded_file`.

---

## 12. Bài tìm lỗi (có đáp án)

### Bài 1: session và đăng xuất

Xem mục 6 (bài 4.1) với 4 lỗi: thiếu `session_start()`, `header()` sau HTML, thiếu `isset`, sai tên file link.

### Bài 2: upload bị lỗi

```php
<form method="POST" action="upload.php">
    <input type="file" name="file">
    <input type="submit" name="sbupload" value="Upload">
</form>
<?php
if (isset($_POST["sbupload"])) {
    $file = $_FILES["file"];
    if ($file["size"] > 2 * 1024) {
        echo "Quá 2MB";
    } else {
        move_uploaded_file($file["name"], "upload/" . $file["tmp_name"]);
        echo "Xong";
    }
}
?>
```

Đáp án (5 lỗi):

1. Form thiếu `enctype="multipart/form-data"`, nên `$_FILES` rỗng.
2. `2 * 1024` chỉ là 2KB. 2MB phải là `2 * 1024 * 1024`.
3. `move_uploaded_file` bị đảo tham số. Đúng là `move_uploaded_file($file["tmp_name"], "upload/" . $file["name"])`.
4. Không kiểm tra `$file["error"] > 0` trước khi xử lý.
5. Không kiểm tra thư mục `upload/` đã tồn tại chưa (`is_dir`, `mkdir`).

### Bài 3: đăng nhập bị lỗi

```php
<html>
<body>
<?php
session_start();
if ($_POST["sbdangnhap"]) {
    if ($_POST["email"] = "admin@gmail.com" && $_POST["password"] == "123456") {
        $_SESSION["user"] = $_POST["email"];
        header("location:trangchu.php");
    }
}
?>
```

Đáp án (4 lỗi):

1. `session_start()` đặt sau khi đã in HTML (`<html><body>`), gây lỗi headers already sent. Phải ở dòng đầu file.
2. `if ($_POST["sbdangnhap"])` không có `isset`, gây cảnh báo khi chưa bấm nút.
3. `$_POST["email"] = "admin@gmail.com"` dùng một dấu `=` (phép gán) thay vì `==` (phép so sánh).
4. Sau `header(...)` thiếu `exit()`, code phía dưới vẫn chạy tiếp.

### Bài 4: lỗ hổng bảo mật khi xóa file

```php
$file_to_delete = $_POST["file_path"];
if (file_exists($file_to_delete)) {
    unlink($file_to_delete);
}
```

Đáp án: người dùng sửa giá trị hidden thành đường dẫn bất kỳ (ví dụ `../index.php`) để xóa file ngoài thư mục upload (path traversal). Cách sửa:

```php
$path = "upload/" . basename($_POST["file_path"]);
if (file_exists($path)) {
    unlink($path);
}
```

---

## 13. Câu hỏi ôn tập (có đáp án)

### Phần A: Trắc nghiệm

**1.** Thuộc tính bắt buộc để form gửi được file là gì?
A. `method="GET"` B. `enctype="multipart/form-data"` C. `action="upload"` D. `type="submit"`
Đáp án: B (kèm `method="POST"`).

**2.** Hàm nào dùng để chuyển file upload từ thư mục tạm sang thư mục đích?
A. `copy()` B. `rename()` C. `move_uploaded_file()` D. `file_put_contents()`
Đáp án: C.

**3.** `$_FILES["file"]["error"] == 0` nghĩa là gì?
Đáp án: upload không có lỗi.

**4.** Mảng `$_FILES["file"]` có bao nhiêu khóa?
Đáp án: 5 (`name`, `type`, `tmp_name`, `size`, `error`).

**5.** Muốn upload nhiều file thì thuộc tính `name` của input cần viết thế nào?
Đáp án: `name="file[]"` kèm thuộc tính `multiple`.

**6.** Hàm nào phải gọi ở dòng đầu trước khi dùng `$_SESSION`?
Đáp án: `session_start()`.

**7.** Muốn xóa cookie tên `a` thì làm thế nào?
Đáp án: `setcookie("a", "", time() - 3600, "/");` (đặt thời điểm hết hạn ở quá khứ).

**8.** Lệnh nào kiểm tra biến session `user` đã tồn tại chưa?
Đáp án: `isset($_SESSION["user"])`.

**9.** `2MB` tính bằng byte trong PHP viết thế nào?
Đáp án: `2 * 1024 * 1024`.

**10.** Hàm nào trả về phần đuôi của tên file `anh.jpg`?
Đáp án: `pathinfo("anh.jpg", PATHINFO_EXTENSION)` trả về `jpg`.

**11.** Dữ liệu session được lưu ở đâu?
Đáp án: trên server (trình duyệt chỉ giữ session id trong cookie `PHPSESSID`).

**12.** Dữ liệu cookie được lưu ở đâu?
Đáp án: trên trình duyệt của người dùng.

**13.** Cách nào đúng để đọc một cookie tên `saved_email` an toàn?
Đáp án: `isset($_COOKIE["saved_email"]) ? $_COOKIE["saved_email"] : ""`.

**14.** Vì sao `header()` phải đặt trước HTML?
Đáp án: vì `header()` sửa phần đầu của phản hồi HTTP; một khi đã có đầu ra (HTML, khoảng trắng) thì phần đầu đã được gửi đi, không sửa được nữa nên báo *headers already sent*.

**15.** Hàm nào xóa một file khỏi server?
Đáp án: `unlink()`.

### Phần B: Tự luận ngắn

**16. Nêu quy trình xử lý upload một file ảnh, tối đa 2MB, đổi tên tránh trùng.**
Đáp án: (1) kiểm tra đã bấm nút và có `$_FILES`; (2) kiểm tra `error`; (3) kiểm tra `size`; (4) tách tên và đuôi bằng `pathinfo`; (5) ghép tên mới có `rand()` hoặc `time()`; (6) tạo thư mục nếu chưa có; (7) `move_uploaded_file`. Có thể thêm kiểm tra đuôi bằng `in_array`.

**17. Phân biệt `unset($_SESSION["k"])`, `session_unset()` và `session_destroy()`.**
Đáp án: `unset` xóa một biến session; `session_unset()` xóa mọi biến session (phiên vẫn còn); `session_destroy()` hủy toàn bộ phiên.

**18. So sánh session và cookie.**
Đáp án: xem bảng ở mục 3.2 (nơi lưu, độ an toàn, dung lượng, mục đích dùng).

**19. Vì sao đăng nhập nên dùng POST thay vì GET?**
Đáp án: GET để lộ mật khẩu trên URL và lịch sử trình duyệt; POST gửi trong thân yêu cầu.

**20. Nêu các bước làm chức năng "Nhớ thông tin đăng nhập".**
Đáp án: thêm checkbox có `name`; khi đăng nhập đúng, nếu `isset($_POST["chknho"])` thì `setcookie("saved_email", $email, time() + 3600*24*30, "/")`, ngược lại xóa cookie; ở form, điền `value` ô email bằng `$_COOKIE["saved_email"]` nếu có và tích sẵn checkbox.

**21. Làm thế nào để chặn người chưa đăng nhập truy cập một trang?**
Đáp án: đầu trang `session_start();` rồi `if (!isset($_SESSION["user"])) { header("location:dangnhap.php"); exit(); }`.

**22. Vì sao sau `header("location:...")` cần `exit()`?**
Đáp án: `header` chỉ gửi lệnh chuyển hướng, không dừng chương trình; không có `exit()` thì code phía dưới vẫn chạy tiếp (có thể ghi dữ liệu hoặc lộ thông tin).

**23. Hai điểm yếu bảo mật của chức năng xóa file ở bài 3.4 là gì?**
Đáp án: đường dẫn xóa lấy thẳng từ form nên bị sửa (path traversal); upload không kiểm tra đuôi file nên có thể tải lên file `.php`.

**24. Khi upload nhiều file, vì sao phải dùng vòng lặp và `[$i]`?**
Đáp án: với `name="file[]"`, mỗi khóa của `$_FILES["file"]` là một mảng; phần tử thứ i của mỗi mảng thuộc về file thứ i.

**25. Cookie vừa tạo bằng `setcookie()` có đọc được ngay trong `$_COOKIE` ở cùng yêu cầu không?**
Đáp án: không, chỉ đọc được từ yêu cầu kế tiếp khi trình duyệt gửi lại cookie.

**26. `upload_max_filesize` và `post_max_size` khác nhau thế nào?**
Đáp án: `upload_max_filesize` giới hạn dung lượng mỗi file; `post_max_size` giới hạn tổng dữ liệu POST của cả yêu cầu và phải lớn hơn hoặc bằng giá trị trên.

**27. `$_POST["sothich"]` khi dùng checkbox `name="sothich[]"` có kiểu gì? Nếu không tích ô nào thì sao?**
Đáp án: là mảng. Nếu không tích ô nào thì khóa `sothich` không tồn tại, nên cần `isset`.

**28. Viết hàm kiểm tra đuôi ảnh hợp lệ.**
Đáp án:

```php
function laAnh($ten) {
    $ext = strtolower(pathinfo($ten, PATHINFO_EXTENSION));
    return in_array($ext, array("png", "jpg", "jpeg", "gif"));
}
```

---

## 14. Bảng tra cứu nhanh và thuật ngữ

### 14.1 Tra cứu nhanh

| Việc cần làm | Code |
|---|---|
| Form thường | `<form method="post" action="">` |
| Form upload | `<form method="POST" enctype="multipart/form-data">` |
| Ô chọn file | `<input type="file" name="file">` |
| Nhiều file | `<input type="file" name="file[]" multiple>` |
| Biết nút đã bấm | `isset($_POST["tênnút"])` |
| 5 khóa file | `name`, `type`, `tmp_name`, `size`, `error` |
| Lỗi upload | `if ($file["error"] > 0)` |
| Giới hạn 2MB | `$file["size"] > 2 * 1024 * 1024` |
| Tên không đuôi | `pathinfo($n, PATHINFO_FILENAME)` |
| Đuôi chữ thường | `strtolower(pathinfo($n, PATHINFO_EXTENSION))` |
| Tên mới | `$ten . "_" . rand(100, 999) . "." . $ext` |
| Tạo thư mục | `if (!is_dir($d)) mkdir($d, 0777, true);` |
| Lưu file | `move_uploaded_file($file["tmp_name"], $d . $tenmoi)` |
| Kiểm tra ảnh | `in_array($ext, array("png","jpg","jpeg","gif"))` |
| Liệt kê | `scandir($d)`, bỏ `.` và `..` |
| Xóa file | `file_exists($p)` rồi `unlink($p)` |
| Bắt đầu session | `session_start();` ở dòng đầu |
| Lưu session | `$_SESSION["user"] = $v;` |
| Kiểm tra đăng nhập | `isset($_SESSION["user"])` |
| Chuyển trang | `header("location:x.php"); exit();` |
| Đăng xuất | `session_start(); unset(...); session_destroy(); header(...); exit();` |
| Tạo cookie | `setcookie("t", $v, time() + 3600*24*30, "/");` |
| Xóa cookie | `setcookie("t", "", time() - 3600, "/");` |
| Đọc cookie | `$_COOKIE["t"]` (kiểm tra `isset` trước) |
| Tách chuỗi `a=1&b=2` | `parse_str($chuoi, $mang);` |
| In an toàn | `htmlspecialchars($s)` |

### 14.2 Thuật ngữ

- **Superglobal**: biến toàn cục có sẵn trong mọi phạm vi (`$_GET`, `$_POST`, `$_FILES`, `$_SESSION`, `$_COOKIE`).
- **MIME type**: kiểu nội dung của file, ví dụ `image/jpeg`.
- **Thư mục tạm (tmp)**: nơi PHP đặt file vừa upload trước khi ta chuyển đi.
- **Session id**: mã định danh phiên, lưu ở cookie `PHPSESSID`.
- **Header (HTTP)**: phần đầu của phản hồi, chứa thông tin như chuyển hướng, cookie.
- **Headers already sent**: lỗi khi cố sửa header sau khi đã có đầu ra.
- **XSS**: tấn công chèn mã script vào trang; phòng bằng `htmlspecialchars`.
- **Path traversal**: lợi dụng `../` trong đường dẫn để truy cập file ngoài thư mục cho phép.
- **Hash mật khẩu**: biến mật khẩu thành chuỗi không đảo ngược được (`password_hash`).
- **Unix timestamp**: số giây tính từ 1/1/1970, `time()` trả về giá trị hiện tại.

---

## 15. Câu thần chú và kế hoạch ôn 3 buổi tối

### 15.1 Câu thần chú

| Bài | Thần chú | Nghĩa |
|---|---|---|
| Upload | **Fo – Lỗi – Cỡ – Tên – Mục – Dời** | Form, kiểm tra Lỗi, kiểm tra Cỡ, đổi Tên, tạo thư Mục, Dời file |
| Upload nhiều file | **Ngoặc – Đếm – Chỉ số** | `file[]` kèm `multiple`, `count()`, thêm `[$i]` |
| Xóa file | **Tạo – Xóa – Liệt kê** | Tạo thư mục, `unlink`, `scandir` |
| Đăng nhập | **Bắt – Chặn – So – Lưu – Nhớ – Chuyển** | `session_start`, chặn nếu đã đăng nhập, so sánh, lưu session, cookie nhớ email, `header` |
| Trang chủ | **Bắt – Hỏi – Đổi** | `session_start`, hỏi `isset`, đổi menu |
| Đăng xuất | **Bắt – Bỏ – Hủy – Chuyển** | `session_start`, `unset`, `session_destroy`, `header` và `exit` |
| 4 lỗi 4.1 | **Thiếu start – Header muộn – Thiếu isset – Sai tên** | |
| 3 lỗi upload | **Thiếu enctype – Đảo tham số – Quên [$i]** | |

### 15.2 Kế hoạch ôn (mỗi tối 2 giờ)

| Buổi | Việc | Thời lượng |
|---|---|---|
| Thứ Hai: upload | Đọc mục 7 và thuộc thần chú | 20 phút |
| | Gõ lại `upload.php` (mục 8.2) từ trí nhớ, 3 lần | 60 phút |
| | Gõ biến thể nhiều file (8.3) và xóa file (8.4) | 40 phút |
| Thứ Ba: đăng nhập | Đọc mục 3 và thuộc bảng cú pháp | 20 phút |
| | Gõ lại `dangnhap.php`, `trangchu.php`, `dangxuat.php` (mục 4) | 70 phút |
| | Làm bài điền chỗ trống và bài tìm lỗi (mục 11, 12) | 30 phút |
| Thứ Tư: đề thử | Làm đề tổng hợp mục 10, bấm 90 phút, không mở tài liệu | 90 phút |
| | Đối chiếu, sửa lỗi, tự viết tay 1 tờ A4 các hàm hay quên | 30 phút |
| Thứ Năm: thi | Chỉ đọc lại tờ A4. Không học cái mới | 15 phút |

Cách luyện hiệu quả:

1. Đọc code có chú thích một lần.
2. Đóng tài liệu, gõ lại từ trí nhớ. Bí thì xem đúng chỗ đó rồi đóng lại gõ tiếp.
3. Viết ra "khung chú thích" (chỉ các dòng mô tả việc cần làm) rồi tự điền code vào từng dòng.
4. Sau cùng chỉ đọc thần chú trong đầu rồi gõ.

### 15.3 Mẹo khi làm bài thi

- Viết `session_start()` đầu tiên ở mọi file có dùng session, trước cả HTML.
- Sau mỗi `header("location:...")` luôn viết `exit();`.
- Form upload: viết `enctype="multipart/form-data"` ngay khi tạo form, đừng để sau.
- `move_uploaded_file`: nhớ đầu tiên là `tmp_name`.
- Mọi dữ liệu người dùng đưa ra màn hình nên qua `htmlspecialchars()`.
- Trước khi nộp: kiểm tra tên `name` trong form khớp tên khóa trong `$_POST` và `$_FILES`.
- Nếu đề chỉ yêu cầu chức năng, đừng mất thời gian làm CSS đẹp.

---

## 16. Ngày thi: môi trường Windows, WAMP, VS Code không có AI

Máy trường dùng Windows, WAMP và VS Code không có AI hỗ trợ. Code PHP giống hệt khi ôn ở nhà bằng `php -S localhost:8000` trên Mac.

### 16.1 Năm phút đầu giờ thi

1. Bật WAMP, đợi biểu tượng ở khay hệ thống chuyển xanh (cam hoặc đỏ là chưa chạy xong).
2. Mở thư mục `C:\wamp64\www\` (tên ổ đĩa có thể khác) và tạo thư mục bài làm, ví dụ `onthi`.
3. Mở thư mục đó bằng VS Code (File, Open Folder).
4. Tạo `test.php` chứa `<?php echo "ok"; ?>`, mở `http://localhost/onthi/test.php`. Thấy chữ ok là môi trường chạy được.

### 16.2 Khi làm bài

- Luôn chạy qua `http://localhost/...`. Mở thẳng file (đường dẫn bắt đầu bằng `file://`) thì PHP không chạy, trang hiện nguyên mã.
- Bấm Ctrl + S sau mỗi lần sửa. Quên lưu thì F5 vẫn ra bản cũ.
- Gõ `!` rồi bấm Tab trong file HTML để sinh khung trang (Emmet có sẵn trong VS Code).
- Luôn có `<meta charset="UTF-8">` và lưu file UTF-8 (mặc định của VS Code) để tiếng Việt không lỗi font.
- Thư mục `upload/` do code tự tạo bằng `mkdir`, không cần tạo tay.

### 16.3 Sự cố thường gặp

| Triệu chứng | Cách xử lý |
|---|---|
| Biểu tượng WAMP không xanh | Thường do trùng cổng 80 với phần mềm khác. Báo giám thị hoặc đổi máy |
| Trang hiện nguyên mã PHP | Đang mở file trực tiếp. Mở lại qua `http://localhost/...` |
| `$_FILES` rỗng | Form thiếu `enctype="multipart/form-data"` hoặc thiếu `method="POST"` |
| Lỗi *headers already sent* | `session_start()` hoặc `header()` đặt sau HTML. Đưa lên dòng đầu file, không có dòng trống hay khoảng trắng trước `<?php` |
| Tiếng Việt lỗi font | Thiếu `<meta charset="UTF-8">` |
| Đổi `php.ini` không có tác dụng | Phải Restart All Services từ biểu tượng WAMP |

### 16.4 Đổi giới hạn upload trên WAMP (bài 3.5)

Bấm chuột trái vào biểu tượng WAMP, chọn PHP, rồi `php.ini`. Sửa `upload_max_filesize` và `post_max_size`, lưu, sau đó chọn Restart All Services.
