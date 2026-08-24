# Buổi 03 - Lập trình hướng đối tượng trong Java

## 1. Tổng quan buổi học

Buổi học hôm nay tập trung vào **lập trình hướng đối tượng**, viết tắt là **OOP**.

Các nội dung chính:

- Vì sao Java dùng lập trình hướng đối tượng.
- Class là gì.
- Object là gì.
- Constructor là gì.
- Từ khóa `this` dùng để làm gì.
- Các đặc trưng của OOP:
  - Đóng gói
  - Kế thừa
  - Đa hình
  - Trừu tượng

Trong buổi này cô chủ yếu giảng 3 đặc trưng đầu:

- Đóng gói
- Kế thừa
- Đa hình

Phần **trừu tượng** sẽ học kỹ hơn ở buổi sau.

---

## 2. Vì sao cần học OOP trong Java?

Khi chương trình nhỏ, chỉ vài chục dòng code, mình có thể viết biến và hàm trực tiếp.

Nhưng khi chương trình lớn hơn, có thể có:

- 1.000 dòng code
- 10.000 dòng code
- Nhiều class
- Nhiều chức năng
- Nhiều dữ liệu liên quan với nhau

Nếu không tổ chức code tốt thì sẽ gặp vấn đề:

- Khó đọc code.
- Khó tìm lỗi.
- Sửa một chỗ có thể ảnh hưởng nhiều chỗ khác.
- Dữ liệu và hàm xử lý bị lẫn lộn.
- Khó mở rộng chương trình.

OOP giúp mình **mô hình hóa bài toán** trước khi viết code.

Ví dụ: bài toán quản lý sinh viên.

Nếu viết bình thường, có thể khai báo:

```java
String ten1 = "An";
double diem1 = 8.5;

String ten2 = "Binh";
double diem2 = 7.0;
```

Cách này sẽ rối nếu có nhiều sinh viên.

Thay vào đó, ta tạo một class `SinhVien` để mô tả sinh viên gồm:

- Mã sinh viên
- Họ tên
- Điểm trung bình
- Hàm hiển thị thông tin
- Hàm kiểm tra học bổng nếu cần

Sau đó từ class `SinhVien`, có thể tạo nhiều object sinh viên khác nhau.

---

## 3. Class là gì?

**Class** là lớp, hay có thể hiểu là **bản thiết kế**.

Class mô tả một loại đối tượng gồm:

- Thuộc tính
- Phương thức

Ví dụ class `SinhVien`:

```java
class SinhVien {
    String maSV;
    String hoTen;
    double diemTB;

    void hienThiThongTin() {
        System.out.println(hoTen);
    }
}
```

Trong đó:

- `maSV`, `hoTen`, `diemTB` là thuộc tính.
- `hienThiThongTin()` là phương thức.

Class giống như bản thiết kế nhà. Từ một bản thiết kế có thể xây nhiều căn nhà.

Tương tự, từ một class có thể tạo nhiều object.

---

## 4. Object là gì?

**Object** là đối tượng cụ thể được tạo ra từ class.

Ví dụ:

```java
SinhVien sv1 = new SinhVien("SV001", "Nguyen Van A", 8.5);
SinhVien sv2 = new SinhVien("SV002", "Tran Van B", 7.5);
```

Ở đây:

- `SinhVien` là class.
- `sv1`, `sv2` là object.
- `new` dùng để tạo object mới.

Mỗi object có dữ liệu riêng.

Ví dụ:

- `sv1` có mã sinh viên, họ tên, điểm riêng.
- `sv2` cũng có mã sinh viên, họ tên, điểm riêng.

Nhưng cả hai đều được tạo từ cùng class `SinhVien`.

---

## 5. Constructor là gì?

**Constructor** là hàm khởi tạo.

Constructor dùng để gán giá trị ban đầu cho object ngay khi object được tạo ra.

Ví dụ:

```java
class SinhVien {
    String maSV;
    String hoTen;
    double diemTB;

    public SinhVien(String maSV, String hoTen, double diemTB) {
        this.maSV = maSV;
        this.hoTen = hoTen;
        this.diemTB = diemTB;
    }
}
```

Khi tạo object:

```java
SinhVien sv1 = new SinhVien("SV001", "Nguyen Van A", 8.5);
```

Constructor sẽ được gọi để gán:

- `maSV = "SV001"`
- `hoTen = "Nguyen Van A"`
- `diemTB = 8.5`

### Quy tắc của constructor

- Constructor phải trùng tên với class.
- Constructor không có kiểu trả về.
- Constructor được gọi khi dùng `new` để tạo object.
- Constructor giúp object có dữ liệu hợp lệ ngay khi được tạo.

Ví dụ sai:

```java
public void SinhVien() {
}
```

Sai vì constructor không được có `void`.

Ví dụ đúng:

```java
public SinhVien() {
}
```

---

## 6. Từ khóa `this`

`this` dùng để chỉ object hiện tại.

Ví dụ:

```java
this.maSV = maSV;
```

Trong đó:

- `this.maSV` là thuộc tính của object.
- `maSV` là tham số truyền vào constructor.

Nếu không có `this`, sẽ khó phân biệt thuộc tính và tham số khi chúng trùng tên.

Hiểu đơn giản:

```text
this.maSV = thuộc tính của object
maSV = dữ liệu truyền vào
```

---

## 7. Class không có `main` có chạy được không?

Một class chỉ mô tả đối tượng thì chưa chắc chạy độc lập được.

Ví dụ class `SinhVien` chỉ có thuộc tính và phương thức thì không có hàm `main`, nên không chạy trực tiếp như chương trình được.

Muốn chạy thử, cần có class chứa:

```java
public static void main(String[] args) {
}
```

---

## 8. Đóng gói

**Đóng gói** là che giấu dữ liệu bên trong class, không cho bên ngoài sửa trực tiếp tùy ý.

Thường dùng:

- `private`
- `protected`
- getter
- setter

Lợi ích:

- Bảo vệ dữ liệu.
- Kiểm tra dữ liệu trước khi thay đổi.
- Tránh gán giá trị sai từ bên ngoài.

---

## 9. Kế thừa

**Kế thừa** là class con sử dụng lại thuộc tính và phương thức của class cha.

Dùng từ khóa:

```java
extends
```

Ví dụ:

```java
class NhanVien {
    protected String hoTen;

    public double tinhLuong() {
        return 0;
    }
}

class NhanVienToanThoiGian extends NhanVien {
    private double luongThang;
}
```

Lợi ích:

- Tái sử dụng code của class cha.
- Tránh viết lại nhiều lần.
- Class con có thể mở rộng thêm thuộc tính và phương thức riêng.

---

## 10. `super` là gì?

`super` dùng để gọi constructor hoặc phương thức của class cha.

Ví dụ:

```java
class NhanVienToanThoiGian extends NhanVien {
    public NhanVienToanThoiGian(String hoTen, double luongThang) {
        super(hoTen);
        this.luongThang = luongThang;
    }
}
```

Trong đó `super(hoTen)` gọi constructor của class cha `NhanVien` để gán họ tên.

---

## 11. Đa hình

**Đa hình** là cùng một lời gọi phương thức nhưng hành vi khác nhau tùy object thực tế.

Ví dụ:

```java
NhanVien nv1 = new NhanVienToanThoiGian();
NhanVien nv2 = new NhanVienBanThoiGian();
```

Khi gọi:

```java
nv.tinhLuong();
```

Java sẽ tự gọi đúng hàm `tinhLuong()` của class con.

---

## 12. `@Override` là gì?

`@Override` dùng khi class con viết lại phương thức của class cha.

Ý nghĩa:

- Báo cho Java biết hàm này đang ghi đè hàm của class cha.
- Nếu viết sai tên hàm, Java sẽ báo lỗi.
- Giúp code rõ ràng hơn.

---

## 13. Trừu tượng

Buổi này cô chỉ giới thiệu, chưa học kỹ.

Phần trừu tượng sẽ học ở buổi sau.

Có thể hiểu tạm thời:

- Trừu tượng là chỉ tập trung vào phần quan trọng.
- Ẩn bớt chi tiết xử lý bên trong.
- Dùng `abstract class` hoặc `interface` trong Java.

---

## 14. Bài tập sản phẩm

Yêu cầu:

Xây dựng class `SanPham` có các thuộc tính:

- Mã sản phẩm
- Tên sản phẩm
- Đơn giá
- Số lượng

Cần viết:

- Constructor
- Hàm tính thành tiền
- Hàm hiển thị thông tin và thành tiền
- Hàm `main` tạo 2 sản phẩm

Công thức:

```text
Thành tiền = đơn giá * số lượng
```

---

## 15. Các file ví dụ trong buổi 03

```text
ViDuSinhVien.java
ViDuSanPham.java
ViDuNhanVien.java
ViDuAnimal.java
ViDuDaHinh.java
```

---

## 16. Câu hỏi ôn tập

### Câu 1: Class và Object khác nhau như thế nào?

Class là bản thiết kế.

Object là đối tượng cụ thể được tạo ra từ class.

### Câu 2: Constructor là gì, được gọi khi nào?

Constructor là hàm khởi tạo.

Constructor được gọi khi tạo object bằng từ khóa `new`.

### Câu 3: `this.maSinhVien` và `maSinhVien` khác nhau như thế nào?

- `this.maSinhVien` là thuộc tính của object.
- `maSinhVien` là tham số truyền vào constructor.

---

## 17. Ghi nhớ nhanh

- Class là bản thiết kế.
- Object là đối tượng cụ thể.
- `new` dùng để tạo object.
- Constructor dùng để khởi tạo object.
- `this` chỉ object hiện tại.
- `extends` dùng để kế thừa.
- `super` gọi constructor hoặc phương thức của class cha.
- `@Override` dùng để ghi đè phương thức.
- Đóng gói giúp bảo vệ dữ liệu.
- Kế thừa giúp tái sử dụng code.
- Đa hình giúp cùng một lời gọi nhưng chạy hành vi khác nhau.
