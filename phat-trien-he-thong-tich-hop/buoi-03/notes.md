# Buổi 03 - OOP trong Java

## Tổng quan

Buổi học tập trung vào lập trình hướng đối tượng trong Java, gồm:

- Class và Object
- Constructor
- Từ khóa `this`
- 3 đặc trưng OOP đã học: đóng gói, kế thừa, đa hình
- Tính trừu tượng sẽ học ở buổi sau

## Vì sao dùng OOP trong Java?

- Chương trình lớn có nhiều dòng code, nếu không tổ chức tốt sẽ khó đọc, khó sửa và khó mở rộng.
- OOP giúp mô hình hóa bài toán trước khi lập trình.
- OOP giúp tái sử dụng và mở rộng code dễ hơn.
- Nhiều framework Java đều được xây dựng theo hướng đối tượng.

## Class và Object

- Class là bản thiết kế, mô tả thuộc tính và phương thức chung.
- Object là đối tượng cụ thể được tạo ra từ class.
- Một class có thể tạo nhiều object.
- Tạo object bằng từ khóa `new`.

Ví dụ:

```java
SinhVien sv1 = new SinhVien("SV001", "Nguyen Van A", 8.5);
```

## Constructor và `this`

- Constructor dùng để khởi tạo object ở trạng thái hợp lệ.
- Constructor phải trùng tên với class.
- Constructor không có kiểu trả về.
- `this` dùng để chỉ thuộc tính của chính object hiện tại.

Ví dụ:

```java
this.maSinhVien = maSinhVien;
```

Trong đó:

- `this.maSinhVien`: thuộc tính của object
- `maSinhVien`: tham số truyền vào constructor

## 4 đặc trưng của OOP

### 1. Đóng gói

Dùng `private` hoặc `protected` để bảo vệ dữ liệu, không cho truy cập trực tiếp từ bên ngoài.

### 2. Kế thừa

Class con dùng `extends` để kế thừa thuộc tính và phương thức của class cha.

### 3. Đa hình

Cùng một lời gọi phương thức nhưng hành vi khác nhau tùy object thực tế.

Thường dùng với `@Override`.

### 4. Trừu tượng

Sẽ học ở buổi sau.

## Bài tập

- Xây dựng lớp `SanPham` gồm mã sản phẩm, tên sản phẩm, đơn giá, số lượng.
- Viết constructor.
- Viết hàm tính thành tiền.
- Viết hàm hiển thị thông tin và thành tiền.
- Viết hàm `main` tạo 2 sản phẩm.

## Câu hỏi ôn tập

1. Class và Object khác nhau như thế nào?
2. Constructor là gì, được gọi khi nào?
3. `this.maSinhVien` và `maSinhVien` khác nhau như thế nào?
