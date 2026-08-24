# Câu hỏi ôn tập buổi 02

## 1. Vì sao Java được gọi là đa nền tảng?

Vì Java biên dịch mã nguồn `.java` thành bytecode `.class`.

Bytecode này chạy trên JVM. Máy nào có JVM phù hợp thì có thể chạy chương trình Java.

## 2. Identifier là gì?

Identifier là tên do lập trình viên đặt cho class, method, interface hoặc variable.

Ví dụ:

```java
SinhVien
hoTen
hienThiThongTin
```

## 3. Identifier hợp lệ cần điều kiện gì?

- Không trùng từ khóa Java.
- Không bắt đầu bằng số.
- Không có khoảng trắng.
- Không có ký tự đặc biệt như `+`, `-`, `&`, `.`.
- Có thể bắt đầu bằng chữ cái, `_`, hoặc `$`.
- Java phân biệt hoa thường.

## 4. Reserved words trong Java là gì?

Là các từ dành riêng của Java, không được dùng để đặt tên biến, tên lớp hoặc tên phương thức.

Ví dụ:

```java
class
public
static
void
int
if
else
for
return
new
```

## 5. Có mấy loại biến trong Java?

Có 3 loại chính:

- Local variable: biến cục bộ.
- Instance variable: biến đối tượng.
- Static variable: biến lớp.

## 6. Kiểu nguyên thủy trong Java gồm những gì?

- Số nguyên: `byte`, `short`, `int`, `long`
- Số thực: `float`, `double`
- Ký tự: `char`
- Đúng/sai: `boolean`

## 7. Ép kiểu `double` sang `int` có gì cần lưu ý?

Khi ép `double` sang `int`, phần thập phân bị cắt bỏ, không làm tròn.

Ví dụ:

```java
double x = 9.8;
int y = (int) x;
```

Kết quả `y` là `9`.

## 8. Toán tử `%` dùng để làm gì?

`%` dùng để chia lấy phần dư.

Ví dụ:

```text
10 % 3 = 1
```

## 9. `break`, `continue`, `return` khác nhau thế nào?

- `break`: thoát khỏi vòng lặp hoặc switch.
- `continue`: bỏ qua lần lặp hiện tại, chuyển sang lần tiếp theo.
- `return`: thoát khỏi phương thức.

## 10. Khi làm bài in pattern cần chú ý gì?

Cần nhìn ra quy luật trước khi code.

Ví dụ cần xác định khi nào in `*`, khi nào in khoảng trắng, và mỗi dòng/cột thay đổi ra sao.
