# Chương 5: Kết nối Cơ sở dữ liệu MySQL và Hiển thị Dữ liệu Sinh viên trong PHP

Tài liệu học tập và hướng dẫn thực hành chi tiết bài học Buổi 5 môn Phát triển ứng dụng Web.

---

## 5.1. Mục tiêu bài học

* **Lập trình hướng đối tượng (OOP) cơ bản trong PHP:** Nắm vững cách xây dựng lớp (`class`), khởi tạo đối tượng (`new`), truy xuất phương thức qua toán tử đối tượng `->` và con trỏ nội tại `$this`.
* **Quy trình kết nối và thao tác CSDL MySQL:** Hiểu rõ chu trình 5 bước kinh điển để kết nối, cấu hình bảng mã UTF-8, thực thi truy vấn SQL và đóng kết nối giải phóng bộ nhớ server.
* **Xử lý hiển thị dữ liệu động:**
  * Kỹ thuật duyệt tập kết quả truy vấn (`result set`) bằng vòng lặp `while` kết hợp `mysql_fetch_array()`.
  * Đổ dữ liệu động vào bảng HTML (`<table>`) có số thứ tự tự tăng.
  * Đổ dữ liệu động vào danh sách chọn thả xuống (`<select>` dropdown combobox) phục vụ biểu mẫu form.

---

## 5.2. Tóm tắt lý thuyết cốt lõi

### 5.2.1. Lập trình hướng đối tượng (OOP) trong tầng xử lý dữ liệu

Thay vì viết mã kết nối cơ sở dữ liệu rải rác trên từng trang giao diện (dễ gây trùng lặp mã nguồn và khó bảo trì khi đổi thông tin kết nối), ta đóng gói toàn bộ thao tác kết nối và xử lý vào một lớp đối tượng (Class).

```text
+-------------------------------------------------------------+
|                         class csdl                          |
+-------------------------------------------------------------+
|  + connect(): Trả về biến kết nối ($con)                    |
|  + xuatbangsinhvien($sql): Xuất bảng HTML danh sách SV      |
|  + xuatcomboboxsv($sql): Xuất thẻ <select> danh sách SV     |
+-------------------------------------------------------------+
```

* **Từ khóa `class`**: Khai báo khuôn mẫu đối tượng.
* **Hàm `public function`**: Phương thức công khai, cho phép gọi từ bên ngoài class.
* **Biến `$this`**: Đại diện cho chính đối tượng hiện tại bên trong class. Ví dụ `$this->connect()` dùng để gọi hàm `connect()` nằm trong cùng class `csdl`.
* **Khởi tạo `$p = new csdl()`**: Tạo ra một thể hiện (instance) cụ thể của lớp `csdl`. Sau đó dùng `$p->xuatbangsinhvien(...)` để gọi hàm.

---

### 5.2.2. Bảng tra cứu các hàm MySQL cốt lõi

| Tên hàm | Cú pháp mẫu | Mục đích & Ý nghĩa |
| :--- | :--- | :--- |
| **`mysql_connect()`** | `$con = mysql_connect("localhost", "root", "");` | Mở kết nối đến máy chủ cơ sở dữ liệu MySQL với địa chỉ host, username và password. |
| **`mysql_select_db()`** | `mysql_select_db("csdl_sinhvien", $con);` | Chọn cơ sở dữ liệu cụ thể để làm việc trên kết nối đang mở. |
| **`mysql_query()`** | `mysql_query("SET NAMES UTF8");`<br>`$kq = mysql_query($sql, $link);` | Gửi câu lệnh SQL lên MySQL server để thực thi (cấu hình bảng mã, SELECT, INSERT, UPDATE, DELETE). |
| **`mysql_num_rows()`** | `$count = mysql_num_rows($ketqua);` | Đếm số lượng dòng dữ liệu trả về từ câu truy vấn `SELECT`. |
| **`mysql_fetch_array()`** | `while ($row = mysql_fetch_array($kq))` | Lấy một dòng dữ liệu từ kết quả truy vấn và chuyển thành mảng (truy xuất theo tên cột như `$row['masv']`). Mỗi lần gọi sẽ tự động trỏ đến dòng tiếp theo. |
| **`mysql_close()`** | `mysql_close($link);` | Đóng kết nối cơ sở dữ liệu để giải phóng bộ nhớ và tài nguyên cho máy chủ. |

---

### 5.2.3. Sơ đồ luồng xử lý dữ liệu (Data Flow Architecture)

```text
[ Trình duyệt (Client) ]
         │
         │ (1) Gửi yêu cầu HTTP GET
         ▼
[ Web Server (Apache / PHP) ]
  ├── sinhvien.php
  │     │ (2) include('myclass/clscsdl.php')
  │     │ (3) $p = new csdl()
  │     │ (4) $p->xuatbangsinhvien("select * from sinhvien...")
  │     ▼
  └── myclass/clscsdl.php
        │ (5) connect() -> mysql_connect(), mysql_select_db(), SET NAMES UTF8
        │ (6) Gửi câu lệnh SQL qua kết nối TCP/Socket
        ▼
[ MySQL Database Server ]
  └── Database: csdl_sinhvien
        └── Table: sinhvien (id, masv, hodem, ten, lop)
        │
        │ (7) Trả về tập dữ liệu kết quả (Result Set)
        ▼
[ myclass/clscsdl.php ]
  │ Duyệt từng dòng bằng while ($row = mysql_fetch_array())
  │ Nối chuỗi tạo cấu trúc thẻ <table>, <tr>, <td> và <select>, <option>
  ▼
[ Trình duyệt (Client) ]
  (8) Nhận mã HTML và hiển thị giao diện bảng sinh viên & dropdown combobox
```

---

## 5.3. Bài tập thực hành & Hướng dẫn chi tiết

### 📌 Cấu trúc thư mục bài học

```text
buoi-05/
├── myclass/
│   └── clscsdl.php        # Lớp đối tượng csdl: quản lý kết nối và xuất dữ liệu
├── sinhvien.php           # File giao diện chính: gọi hàm và hiển thị dữ liệu
└── README.md              # Tài liệu hướng dẫn học tập
```

---

### 📌 Kịch bản tạo Database mẫu (`csdl_sinhvien`)

Trước khi chạy mã nguồn PHP, bạn mở công cụ quản lý cơ sở dữ liệu **phpMyAdmin** (`http://localhost/phpmyadmin`) và thực thi đoạn mã SQL sau để tạo CSDL và bảng mẫu:

```sql
-- 1. Tạo cơ sở dữ liệu với bảng mã tiếng Việt chuẩn UTF-8
CREATE DATABASE IF NOT EXISTS `csdl_sinhvien` 
DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- 2. Chọn cơ sở dữ liệu vừa tạo
USE `csdl_sinhvien`;

-- 3. Tạo bảng sinhvien
CREATE TABLE IF NOT EXISTS `sinhvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `masv` varchar(20) NOT NULL,
  `hodem` varchar(50) NOT NULL,
  `ten` varchar(20) NOT NULL,
  `lop` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 4. Chèn dữ liệu mẫu có tiếng Việt đầy đủ
INSERT INTO `sinhvien` (`id`, `masv`, `hodem`, `ten`, `lop`) VALUES
(1, 'SV01', 'Nguyễn Văn', 'An', '12DHTH01'),
(2, 'SV02', 'Trần Thị', 'Bình', '12DHTH02'),
(3, 'SV03', 'Lê Hoàng', 'Cường', '12DHTH01'),
(4, 'SV04', 'Phạm Minh', 'Đạt', '12DHTH03'),
(5, 'SV05', 'Võ Thị Hồng', 'Duyên', '12DHTH02');
```

---

### 📌 Mã nguồn chi tiết từng file

#### 1. File `myclass/clscsdl.php` (Lớp quản lý cơ sở dữ liệu)

```php
<?php
// Khai báo lớp đối tượng csdl để quản lý toàn bộ thao tác kết nối và truy vấn CSDL
class csdl
{
    /**
     * Hàm kết nối đến cơ sở dữ liệu MySQL
     * Trả về biến kết nối ($con) nếu thành công
     */
    public function connect()
    {
        // mysql_connect(máy_chủ, tên_đăng_nhập, mật_khẩu): kết nối tới máy chủ MySQL
        // localhost: máy chủ cục bộ; root: tài khoản mặc định; rỗng "": không có mật khẩu
        $con = mysql_connect("localhost", "root", "");

        // Kiểm tra nếu kết nối thất bại (! là toán tử phủ định NOT)
        if (!$con) {
            echo 'Không kết nối được csdl';
            exit(); // Dừng toàn bộ chương trình ngay lập tức, không chạy tiếp bên dưới
        } else {
            // mysql_select_db(tên_csdl, biến_kết_nối): chọn database cần làm việc
            mysql_select_db("csdl_sinhvien", $con);

            // mysql_query("SET NAMES UTF8"): thiết lập bảng mã tiếng Việt có dấu chuẩn UTF-8
            mysql_query("SET NAMES UTF8");

            // Trả về đối tượng kết nối $con để các hàm khác tái sử dụng
            return $con;
        }
    }

    /**
     * Hàm xuất danh sách sinh viên dưới dạng bảng HTML
     * @param string $sql Câu lệnh truy vấn SQL (ví dụ: SELECT * FROM sinhvien)
     */
    public function xuatbangsinhvien($sql)
    {
        // Gọi hàm connect() trong cùng class bằng $this-> để lấy biến kết nối CSDL
        $link = $this->connect();

        // mysql_query($sql, $link): thực thi câu lệnh truy vấn SQL gửi lên server MySQL
        $ketqua = mysql_query($sql, $link);

        // mysql_num_rows($ketqua): đếm số dòng dữ liệu trả về từ kết quả truy vấn
        $i = mysql_num_rows($ketqua);

        // Kiểm tra nếu có ít nhất 1 dòng dữ liệu ($i > 0) thì mới in bảng HTML
        if ($i > 0) {
            // In thẻ mở <table> và dòng tiêu đề chứa tên các cột
            echo '<table width="1000" border="1" align="center" cellpadding="3" cellspacing="0">
            <tr>
                <td align="center" valign="middle"><strong>STT</strong></td>
                <td align="center" valign="middle"><strong>MASV</strong></td>
                <td align="center" valign="middle"><strong>HỌ ĐỆM</strong></td>
                <td align="center" valign="middle"><strong>TÊN</strong></td>
                <td align="center" valign="middle"><strong>LỚP</strong></td>
            </tr>';

            // Biến $dem dùng làm Số Thứ Tự (STT), khởi tạo giá trị ban đầu là 1
            $dem = 1;

            // Vòng lặp while kết hợp mysql_fetch_array():
            // - Mỗi vòng lặp, hàm lấy ra một dòng dữ liệu và gán vào mảng kết hợp $row
            // - Khi đã duyệt hết các dòng, hàm trả về false và vòng lặp tự động dừng lại
            while ($row = mysql_fetch_array($ketqua)) {
                // Lấy giá trị từng trường (cột) trong bảng theo đúng tên cột trong database
                $id = $row['id'];         // Khóa chính (ID)
                $masv = $row['masv'];     // Mã sinh viên (ví dụ: SV01)
                $hodem = $row['hodem'];   // Họ và chữ đệm (ví dụ: Nguyễn Văn)
                $ten = $row['ten'];       // Tên sinh viên (ví dụ: An)
                $lop = $row['lop'];       // Tên lớp (ví dụ: 12DHTH)

                // In từng dòng thẻ <tr> chứa dữ liệu của 1 sinh viên (dùng dấu chấm . để nối chuỗi)
                echo '<tr>
                    <td align="center" valign="middle">' . $dem . '</td>
                    <td align="center" valign="middle">' . $masv . '</td>
                    <td align="center" valign="middle">' . $hodem . '</td>
                    <td align="center" valign="middle">' . $ten . '</td>
                    <td align="center" valign="middle">' . $lop . '</td>
                </tr>';

                // Tăng biến đếm STT lên 1 đơn vị cho dòng kế tiếp
                $dem++;
            }

            // In thẻ đóng </table> sau khi vòng lặp duyệt xong tất cả các dòng
            echo '</table>';
        } else {
            // Trường hợp câu truy vấn trả về 0 dòng (bảng rỗng hoặc không khớp điều kiện)
            echo 'Không có dữ liệu.';
        }

        // mysql_close($link): đóng kết nối CSDL sau khi hoàn thành để giải phóng bộ nhớ
        mysql_close($link);
    }

    /**
     * Hàm xuất danh sách sinh viên vào thẻ chọn combobox (select)
     * @param string $sql Câu lệnh truy vấn SQL
     */
    public function xuatcomboboxsv($sql)
    {
        // Lấy kết nối cơ sở dữ liệu
        $link = $this->connect();

        // Thực thi câu truy vấn
        $ketqua = mysql_query($sql, $link);

        // Đếm số dòng dữ liệu trả về
        $i = mysql_num_rows($ketqua);

        // Nếu có dữ liệu thì in ra thẻ <select>
        if ($i > 0) {
            // In thẻ mở <select> của dropdown combobox
            echo '<select name="select" id="select">';

            // In tùy chọn mặc định đầu tiên để nhắc người dùng
            echo '<option value="0">Mời chọn</option>';

            // Duyệt từng dòng dữ liệu sinh viên trong kết quả
            while ($row = mysql_fetch_array($ketqua)) {
                $id = $row['id'];
                $masv = $row['masv'];
                $hodem = $row['hodem'];
                $ten = $row['ten'];

                // Nối chuỗi Mã - Họ đệm - Tên để hiển thị trực quan cho người dùng đọc
                $xuat = $masv . ' - ' . $hodem . ' - ' . $ten;

                // Thẻ <option>:
                // - value="'.$id.'": giá trị id gửi về server khi form được submit
                // - '.$xuat.': nội dung hiển thị trong danh sách chọn
                echo '<option value="' . $id . '">' . $xuat . '</option>';
            }

            // In thẻ đóng </select>
            echo '</select>';
        } else {
            echo 'Không có dữ liệu.';
        }

        // Đóng kết nối CSDL
        mysql_close($link);
    }
}
?>
```

---

#### 2. File `sinhvien.php` (Trang giao diện chính)

```php
<?php
// Nạp file định nghĩa class csdl từ thư mục con myclass/
// Lệnh include giúp chèn toàn bộ nội dung file myclass/clscsdl.php vào đây để sử dụng
include('myclass/clscsdl.php');

// Khởi tạo một đối tượng (object) mới từ class csdl bằng từ khóa new
// Biến $p đại diện cho class csdl, dùng để gọi các hàm bên trong class đó
$p = new csdl();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Khai báo bảng mã UTF-8 để hiển thị tiếng Việt có dấu chuẩn, không bị lỗi font -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh Sách Sinh Viên</title>
</head>

<body>
<?php
/*
 * Gọi hàm xuatbangsinhvien() thông qua đối tượng $p (dùng toán tử ->)
 * Truyền vào câu lệnh truy vấn SQL:
 * - "select * from sinhvien": lấy tất cả các cột dữ liệu từ bảng sinhvien
 * - "order by ten asc": sắp xếp kết quả theo cột "ten" theo thứ tự tăng dần (A -> Z)
 */
$p->xuatbangsinhvien("select * from sinhvien order by ten asc");
?>

<!-- Thẻ <hr /> tạo một đường kẻ ngang để ngăn cách giữa phần Bảng và phần Combobox -->
<hr />

<?php
/*
 * Gọi hàm xuatcomboboxsv() thông qua đối tượng $p (dùng toán tử ->)
 * Truyền vào câu lệnh truy vấn SQL:
 * - Chỉ lấy 4 cột cần thiết: id, masv, hodem, ten từ bảng sinhvien
 * - Sắp xếp theo tên tăng dần từ A -> Z
 */
$p->xuatcomboboxsv("select id, masv, hodem, ten from sinhvien order by ten asc");
?>
</body>
</html>
```

---

## 5.4. Các lỗi thường gặp & Cách khắc phục

1. **Lỗi "Không kết nối được csdl":**
   * *Nguyên nhân:* Dịch vụ MySQL trong XAMPP/WampServer chưa được bật (`Start`), hoặc thông tin kết nối `mysql_connect("localhost", "root", "")` bị sai mật khẩu.
   * *Khắc phục:* Mở XAMPP Control Panel, đảm bảo module MySQL có đèn xanh (Status: Running). Nếu dùng mật khẩu, hãy điền chính xác vào tham số thứ 3.

2. **Lỗi hiển thị tiếng Việt bị dấu `?` hoặc ký tự rác:**
   * *Nguyên nhân:* Quên thiết lập bảng mã kết nối hoặc trang HTML thiếu thẻ meta charset UTF-8.
   * *Khắc phục:* Luôn luôn thực thi lệnh `mysql_query("SET NAMES UTF8");` ngay sau khi chọn database trong hàm `connect()`, đồng thời khai báo `<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />` trong thẻ `<head>`.

3. **Cảnh báo `Notice: Undefined index ...`:**
   * *Nguyên nhân:* Tên trường trong `$row['ten_truong']` không khớp chính xác từng chữ hoa/thường với tên cột đã tạo trong bảng cơ sở dữ liệu MySQL.
   * *Khắc phục:* Kiểm tra lại cấu trúc bảng trong phpMyAdmin để điền đúng tên cột (ví dụ: `masv`, `hodem`, `ten`, `lop`).

4. **Lưu ý về phiên bản PHP:**
   * Các hàm `mysql_*` thuộc thư viện MySQL Extension cũ (đã deprecated từ PHP 5.5 và bị xóa bỏ hoàn toàn từ PHP 7.0 trở lên). Trong môi trường học tập và các hệ thống trường học sử dụng PHP 5.6 / XAMPP đời cũ, cú pháp này được giảng dạy nhằm giúp sinh viên hiểu rõ bản chất từng bước truy vấn dữ liệu.
   * Trong các dự án thực tế hiện đại, khuyến nghị chuyển sang sử dụng thư viện **MySQLi** (`mysqli_connect()`, `mysqli_query()`) hoặc **PDO** (`PDO::prepare()`) để tăng tính bảo mật và ngăn ngừa các lỗ hổng SQL Injection.
