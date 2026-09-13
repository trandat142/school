# Buổi 03 - Vòng lặp, Mảng và Kỹ thuật Upload File trong PHP

## 1. Hành động cần thực hiện

- [ ] Xem tài liệu và slide bài giảng trên [Google Drive buổi 03](https://drive.google.com/drive/folders/1Y8zWtO1X_2Eo1sIxtzB3j9lr7fQWd-al).
- [ ] Thực hành thành thạo 4 loại vòng lặp: `for`, `while`, `do...while` và `foreach`.
- [ ] Nắm vững cách khai báo và truy xuất các loại mảng: mảng chỉ số, mảng kết hợp và mảng đa chiều.
- [ ] Hiểu rõ cơ chế upload file trong PHP qua biến siêu toàn cục `$_FILES`.
- [ ] Thực hành các bài tập upload file trong thư mục `offline/buoi-3` (Bài 3.1 đến Bài 3.5).
- [ ] Kiểm tra và biết cách cấu hình các thông số upload trong file `php.ini`.

---

## 2. Điểm danh và lưu ý đầu buổi

- Điểm danh thường thực hiện khoảng:
  ```text
  18:15 - 18:20
  ```
- Sinh viên vào trễ cần chủ động báo giảng viên để được ghi nhận chuyên cần.
- Tiếp tục hoàn thiện nhóm đề tài cuối kỳ (tối đa 4 sinh viên/nhóm, làm web thương mại điện tử bằng PHP thuần, không dùng framework).
- Tài liệu học tập:
  - Slide bài giảng Buổi 3 trên Google Drive lớp.
  - Sách *Giáo trình thực hành môn học Phát triển ứng dụng web*.

---

## 3. Vòng lặp trong PHP

Vòng lặp giúp thực thi một đoạn code lặp đi lặp lại nhiều lần cho đến khi thỏa mãn điều kiện dừng.

### Vòng lặp for

Thường dùng khi đã biết trước số lần lặp cụ thể.

Cú pháp:

```php
for ($i = 1; $i <= 10; $i++) {
    echo $i . ' ';
}
```

- Khởi tạo: `$i = 1`
- Điều kiện dừng: `$i <= 10`
- Bước nhảy: `$i++`

### Vòng lặp while

Kiểm tra điều kiện trước, nếu đúng mới thực hiện khối lệnh.

Cú pháp:

```php
$i = 1;
while ($i <= 5) {
    echo 'Số ' . $i . '<br>';
    $i++;
}
```

Lưu ý: Luôn cần có biến tăng/giảm bên trong khối lệnh để tránh vòng lặp vô tận (infinite loop).

### Vòng lặp do...while

Khối lệnh luôn được thực thi ít nhất một lần trước khi kiểm tra điều kiện.

Cú pháp:

```php
$i = 1;
do {
    echo 'Số ' . $i . '<br>';
    $i++;
} while ($i <= 5);
```

### Lệnh break và continue

- `break`: Kết thúc và thoát khỏi vòng lặp ngay lập tức.
- `continue`: Bỏ qua các câu lệnh còn lại của lần lặp hiện tại và nhảy sang lần lặp kế tiếp.

Ví dụ:

```php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 3) {
        continue; // Bỏ qua số 3
    }
    if ($i == 8) {
        break;    // Dừng vòng lặp khi tới 8
    }
    echo $i . ' ';
}
```

---

## 4. Mảng trong PHP (Array)

Mảng là một biến đặc biệt có thể lưu trữ nhiều giá trị trong cùng một biến duy nhất.

### 4.1. Mảng chỉ số (Indexed Array)

Mảng có chỉ số (index) là số nguyên, mặc định bắt đầu từ 0.

Cách khai báo:

```php
// Cách 1: dùng hàm array()
$monHoc = array('HTML', 'CSS', 'JavaScript', 'PHP');

// Cách 2: dùng ngoặc vuông [] (cú pháp ngắn, khuyến khích dùng)
$monHoc = ['HTML', 'CSS', 'JavaScript', 'PHP'];
```

Truy xuất phần tử:

```php
echo $monHoc[0]; // In ra 'HTML'
echo $monHoc[3]; // In ra 'PHP'
```

### 4.2. Mảng kết hợp (Associative Array)

Mảng mà mỗi phần tử được định danh bằng một khóa (key) dạng chuỗi thay vì số nguyên.

Cú pháp:

```php
$sinhVien = [
    'mssv'  => '20210001',
    'hoTen' => 'Nguyễn Văn An',
    'lop'   => 'CNTT-K15',
    'diem'  => 8.5
];
```

Truy xuất phần tử qua key:

```php
echo $sinhVien['hoTen']; // In ra 'Nguyễn Văn An'
echo $sinhVien['diem'];  // In ra 8.5
```

Mảng kết hợp rất phổ biến khi làm việc với dữ liệu từ form và cơ sở dữ liệu MySQL.

### 4.3. Mảng đa chiều (Multidimensional Array)

Mảng chứa một hoặc nhiều mảng con bên trong. Thường dùng để lưu danh sách các đối tượng (danh sách sinh viên, danh sách sản phẩm).

Ví dụ:

```php
$danhSachSanPham = [
    ['ma' => 'SP01', 'ten' => 'Bàn phím cơ', 'gia' => 750000],
    ['ma' => 'SP02', 'ten' => 'Chuột không dây', 'gia' => 350000],
    ['ma' => 'SP03', 'ten' => 'Tai nghe gaming', 'gia' => 550000]
];

echo $danhSachSanPham[0]['ten']; // In ra 'Bàn phím cơ'
```

### 4.4. Duyệt mảng bằng foreach

`foreach` là cấu trúc vòng lặp chuyên dụng và tối ưu nhất để duyệt mảng trong PHP.

**Dạng 1: Chỉ lấy giá trị**

```php
$traiCay = ['Táo', 'Chuối', 'Cam'];
foreach ($traiCay as $qua) {
    echo $qua . '<br>';
}
```

**Dạng 2: Lấy cả khóa (key) và giá trị (value)**

```php
$sinhVien = [
    'mssv'  => '20210001',
    'hoTen' => 'Nguyễn Văn An',
    'diem'  => 8.5
];

foreach ($sinhVien as $khoa => $giaTri) {
    echo $khoa . ': ' . $giaTri . '<br>';
}
```

### 4.5. Các hàm xử lý mảng thông dụng

- `count($arr)`: Trả về số lượng phần tử của mảng.
- `is_array($arr)`: Kiểm tra biến có phải mảng hay không.
- `in_array($value, $arr)`: Kiểm tra một giá trị có tồn tại trong mảng không.
- `array_key_exists($key, $arr)`: Kiểm tra một key có tồn tại trong mảng không.
- `array_push($arr, $item)`: Thêm một hoặc nhiều phần tử vào cuối mảng.
- `print_r($arr)`: In cấu trúc mảng trực quan (thường dùng để debug).
- `var_dump($arr)`: In chi tiết kiểu dữ liệu, độ dài và giá trị của mảng.

---

## 5. Hàm trong PHP (Function)

Hàm giúp đóng gói đoạn code tái sử dụng, giúp chương trình gọn gàng và dễ bảo trì.

Cú pháp:

```php
function tinhTong($a, $b) {
    return $a + $b;
}

$ketQua = tinhTong(5, 10); // $ketQua = 15
```

Hàm có tham số mặc định:

```php
function xinChao($ten = 'Bạn') {
    return 'Xin chào, ' . $ten . '!';
}

echo xinChao();        // In ra 'Xin chào, Bạn!'
echo xinChao('Minh');  // In ra 'Xin chào, Minh!'
```

Lưu ý phạm vi biến:
- Biến khai báo trong hàm là biến cục bộ (local variable), chỉ dùng được bên trong hàm.
- Muốn truy cập biến bên ngoài hàm, phải dùng từ khóa `global $tenBien` hoặc truyền qua tham số.

---

## 6. Kỹ thuật Upload File trong PHP

Upload file là kỹ thuật đưa tập tin từ máy khách (client) lên máy chủ (server) qua giao thức HTTP.

### 6.1. Yêu cầu bắt buộc của thẻ Form

Để form có thể gửi file lên server, thẻ `<form>` bắt buộc phải có đủ 2 điều kiện:

1. `method="post"`: Dữ liệu gửi bằng phương thức POST.
2. `enctype="multipart/form-data"`: Báo cho trình duyệt mã hóa dữ liệu theo dạng nhị phân nhiều phần để truyền tải file.

Ví dụ:

```html
<form action="" method="post" enctype="multipart/form-data">
    <label>Chọn file ảnh:</label>
    <input type="file" name="hinh_anh">
    <button type="submit" name="btnUpload">Tải lên</button>
</form>
```

> **Cảnh báo:** Nếu quên thuộc tính `enctype="multipart/form-data"`, server chỉ nhận được tên file dưới dạng chuỗi văn bản thông thường qua `$_POST`, toàn bộ dữ liệu nhị phân của file sẽ bị mất.

---

## 7. Mảng siêu toàn cục $_FILES

Khi người dùng gửi file lên server, PHP tự động lưu toàn bộ thông tin của file vào mảng 2 chiều `$_FILES['tên_input']`.

Mảng này gồm 5 phần tử:

| Khóa | Ý nghĩa | Ví dụ |
| :--- | :--- | :--- |
| `name` | Tên gốc của file trên máy tính người dùng | `anh-dai-dien.png` |
| `type` | Định dạng MIME của file | `image/png`, `application/pdf` |
| `tmp_name` | Đường dẫn file tạm được lưu tạm thời trên server | `C:\xampp\tmp\php8F12.tmp` |
| `size` | Kích thước file tính bằng Byte (1 MB = 1024 * 1024 Bytes) | `2048576` (tương đương 2MB) |
| `error` | Mã lỗi trong quá trình upload (0 là thành công) | `0` (`UPLOAD_ERR_OK`) |

---

## 8. Quy trình 3 tiến trình Upload File

1. **Tiến trình 1 - Client gửi file:** Người dùng chọn file trên form và nhấn Submit. Trình duyệt chia nhỏ file và gửi lên server theo định dạng multipart.
2. **Tiến trình 2 - Server nhận và lưu tạm:** Web server nhận file và lưu tạm thời vào thư mục tạm của hệ thống (`tmp_name`). Khi file nằm ở đây, nếu script PHP kết thúc mà không được xử lý thì file tạm sẽ tự động bị xóa.
3. **Tiến trình 3 - Di chuyển file lưu trữ chính thức:** Script PHP sử dụng hàm `move_uploaded_file($tmp_name, $destination)` để di chuyển file từ thư mục tạm đến thư mục lưu trữ của website trên server.

---

## 9. Các bước kiểm tra an toàn khi Upload File

Để đảm bảo an toàn cho hệ thống và tránh bị tải lên mã độc:

1. **Kiểm tra file đã được chọn chưa:**
   ```php
   if (!isset($_FILES['hinh_anh']) || $_FILES['hinh_anh']['error'] !== 0) {
       echo 'Chưa chọn file hoặc có lỗi khi tải lên!';
   }
   ```

2. **Kiểm tra định dạng file (phần mở rộng):**
   ```php
   $duoiChoPhep = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
   $duoiFile = strtolower(pathinfo($_FILES['hinh_anh']['name'], PATHINFO_EXTENSION));

   if (!in_array($duoiFile, $duoiChoPhep)) {
       echo 'Định dạng file không hợp lệ! Chỉ chấp nhận ảnh JPG, PNG, GIF, WEBP.';
   }
   ```

3. **Kiểm tra kích thước file (dung lượng):**
   ```php
   $dungLuongToiDa = 2 * 1024 * 1024; // 2MB
   if ($_FILES['hinh_anh']['size'] > $dungLuongToiDa) {
       echo 'File vượt quá kích thước cho phép (tối đa 2MB)!';
   }
   ```

4. **Đổi tên file tránh ghi đè dữ liệu:**
   Nếu 2 người dùng tải lên 2 file có cùng tên `avatar.png`, file sau sẽ xóa đè file trước. Cần đổi tên ngẫu nhiên:
   ```php
   $tenFileMoi = time() . '_' . rand(1000, 9999) . '.' . $duoiFile;
   $duongDanLuu = 'uploads/' . $tenFileMoi;
   ```

5. **Di chuyển file bằng `move_uploaded_file()`:**
   ```php
   if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $duongDanLuu)) {
       echo 'Upload thành công!';
   } else {
       echo 'Không thể lưu file!';
   }
   ```

---

## 10. Các hàm thao tác File quan trọng trên Server

- `move_uploaded_file($from, $to)`: Di chuyển file từ thư mục tạm sang thư mục đích.
- `file_exists($path)`: Kiểm tra file hoặc thư mục có tồn tại hay không.
- `unlink($path)`: Xóa file khỏi server (thường dùng khi người dùng muốn xóa ảnh cũ).
- `mkdir($dir, 0777, true)`: Tạo thư mục mới nếu chưa tồn tại.
- `pathinfo($path, PATHINFO_EXTENSION)`: Trích xuất phần mở rộng của file.

---

## 11. Cấu hình file php.ini liên quan đến Upload

Các tham số trong file `php.ini` ảnh hưởng trực tiếp đến upload:

```ini
; Cho phép upload file qua HTTP
file_uploads = On

; Thư mục lưu file tạm thời
upload_tmp_dir = "C:/xampp/tmp"

; Kích thước tối đa cho 1 file upload (mặc định thường là 2M)
upload_max_filesize = 100M

; Kích thước tối đa cho toàn bộ dữ liệu POST gửi lên (phải lớn hơn upload_max_filesize)
post_max_size = 120M

; Giới hạn bộ nhớ PHP (phải lớn hơn post_max_size)
memory_limit = 256M

; Thời gian thực thi tối đa của script (tính bằng giây)
max_execution_time = 300
```

> **Lưu ý:** Sau khi sửa file `php.ini`, bắt buộc phải Restart lại Apache trong XAMPP / WAMP để cấu hình mới có hiệu lực.

---

## 12. Lỗi thường gặp và cách khắc phục

1. **Mảng `$_FILES` hoàn toàn rỗng:**
   - Nguyên nhân: Quên khai báo `enctype="multipart/form-data"` trên thẻ `<form>` hoặc dùng nhầm `method="get"`.
   - Khắc phục: Bổ sung `enctype="multipart/form-data"` và `method="post"`.

2. **Lỗi `move_uploaded_file()` trả về `false`:**
   - Nguyên nhân: Thư mục đích chưa tồn tại hoặc web server không có quyền ghi.
   - Khắc phục: Kiểm tra tạo thư mục `uploads/` và cấp quyền ghi.

3. **Lỗi `UPLOAD_ERR_INI_SIZE` (mã lỗi 1):**
   - Nguyên nhân: Dung lượng file tải lên lớn hơn giới hạn `upload_max_filesize` trong `php.ini`.
   - Khắc phục: Nâng giá trị `upload_max_filesize` và `post_max_size` trong `php.ini`.

4. **File bị ghi đè mất dữ liệu:**
   - Nguyên nhân: Dùng trực tiếp tên file gốc của client (`$_FILES['...']['name']`).
   - Khắc phục: Đổi tên file duy nhất trước khi lưu bằng timestamp kết hợp số ngẫu nhiên hoặc UUID.

---

## 13. Demo thực hành trong thư mục

- `demo-vong-lap.php`: Minh họa vòng lặp `for`, `while`, `do...while` và `foreach` kết hợp tạo bảng dữ liệu.
- `demo-mang.php`: Minh họa mảng chỉ số, mảng kết hợp, mảng đa chiều và các hàm thao tác mảng.
- `demo-upload-file.php`: Form upload ảnh hoàn chỉnh với đầy đủ kiểm tra bảo mật, đổi tên file và hiển thị kết quả.

---

## 14. Ghi nhớ nhanh

- `foreach` là vòng lặp mạnh nhất để làm việc với mảng trong PHP.
- Mảng kết hợp dùng cấu trúc `$key => $value`.
- Form upload file bắt buộc phải có `method="post"` và `enctype="multipart/form-data"`.
- Mảng `$_FILES` có 5 thuộc tính: `name`, `type`, `tmp_name`, `size`, `error`.
- Dùng `move_uploaded_file()` để di chuyển file an toàn từ thư mục tạm đến thư mục đích.
- Luôn kiểm tra định dạng và dung lượng file trước khi lưu trữ.
- Đổi tên file ngẫu nhiên để tránh trùng tên và ghi đè dữ liệu.
- Dùng `unlink()` để xóa file trên server khi cần dọn dẹp.
