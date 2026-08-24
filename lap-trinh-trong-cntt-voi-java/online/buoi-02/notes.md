# Buổi 02 - Ngôn ngữ Java cơ bản

## Action items

- [ ] Tự gõ lại và chạy các bài tập ví dụ từ bài 2 đến bài 5.
- [ ] Nếu chưa làm bài 1 thì làm luôn bài 1.
- [ ] Mở slide giảng viên đã gửi và làm các bài về khai báo biến, nhập, xuất trong Java.
- [ ] Cài Eclipse hoặc dùng trình biên dịch online nếu chưa có môi trường.

---

## 1. Ôn tập đặc điểm của Java

Java kết hợp cả **biên dịch** và **thông dịch**.

Quy trình cơ bản:

```text
.java -> biên dịch -> bytecode .class -> JVM thông dịch/thực thi
```

Trong đó:

- File `.java` là mã nguồn.
- File `.class` là bytecode, tức mã trung gian.
- JVM là máy ảo Java, dùng để chạy bytecode trên từng nền tảng.

Nhờ cơ chế này, Java có tính đa nền tảng:

```text
Write Once, Run Anywhere
```

Nghĩa là viết một lần, chạy được ở nhiều nơi có JVM phù hợp.

Java khác với nhiều ngôn ngữ biên dịch hoặc thông dịch thông thường vì giảm phụ thuộc vào hệ điều hành và phần cứng cụ thể.

---

## 2. Java, Microsoft và .NET

Java ra đời trong bối cảnh cần giảm sự phụ thuộc vào một nền tảng cụ thể.

Sau này Microsoft phát triển `.NET` với ý tưởng tương tự về môi trường chạy trung gian.

`.NET Core` và các phiên bản .NET hiện đại cũng hỗ trợ đa nền tảng.

Ghi nhớ chính:

- Java chạy trên JVM.
- .NET chạy trên CLR/runtime của .NET.
- Cả hai đều hướng đến việc giúp chương trình chạy trên nhiều môi trường hơn.

---

## 3. Lưu ý về AI khi học Java

AI có thể viết code rất nhanh, nhưng sinh viên vẫn cần hiểu bản chất.

Cần tránh học kiểu:

```text
Không hiểu bài -> hỏi AI -> copy code -> nộp
```

Cách học đúng hơn:

```text
Hiểu yêu cầu -> tự nghĩ hướng giải -> dùng AI hỗ trợ kiểm tra/sửa lỗi -> tự chạy lại
```

Điểm quan trọng là phải hiểu:

- Biến dùng để làm gì
- Vòng lặp chạy thế nào
- Điều kiện đúng/sai ra sao
- Vì sao chương trình in ra kết quả đó

---

## 4. Khóa luận và lựa chọn công nghệ

Khóa luận không bắt buộc phải dùng Java.

Có thể chọn công nghệ phù hợp với đề tài, ví dụ:

- JavaScript/Node.js và API HTTP
- PHP
- ASP.NET hoặc .NET Core
- Java

Đề tài về bảo mật hệ thống cũng có thể hợp lệ nếu đảm bảo đủ độ khó và chất lượng.

---

## 5. Identifier trong Java

Identifier là **định danh**, tức tên do lập trình viên đặt trong chương trình.

Identifier dùng để đặt tên cho:

- Class
- Method
- Interface
- Variable

Ví dụ:

```java
class SinhVien {
    int tuoi;

    void hienThiThongTin() {
    }
}
```

Trong ví dụ trên:

- `SinhVien` là tên class.
- `tuoi` là tên biến.
- `hienThiThongTin` là tên method.

---

## 6. Quy tắc đặt identifier

Một identifier hợp lệ cần thỏa các quy tắc:

1. Không được trùng từ khóa của Java.
2. Ký tự đầu tiên phải là chữ cái, `_`, hoặc `$`.
3. Không được bắt đầu bằng số.
4. Các ký tự tiếp theo có thể là chữ, số, `_`, hoặc `$`.
5. Không được có khoảng trắng.
6. Không được có ký tự đặc biệt như `+`, `-`, `&`, `.`, `'`.
7. Java phân biệt chữ hoa và chữ thường.

Ví dụ:

```java
MyVariable
myvariable
my_Variable
sum_of_array
_myvariable
$myvariable
dataflair123
```

Các tên trên hợp lệ về mặt cú pháp.

Nhưng trong code thực tế nên hạn chế dùng `$` nếu không cần thiết.

---

## 7. Identifier không hợp lệ

Ví dụ không hợp lệ:

```text
My Variable
123gkk
.a+c
variable-2
sum & difference
0'Reilly
```

Lý do:

- `My Variable`: có khoảng trắng.
- `123gkk`: bắt đầu bằng số.
- `.a+c`: có dấu `.` và `+`.
- `variable-2`: có dấu `-`.
- `sum & difference`: có dấu `&` và khoảng trắng.
- `0'Reilly`: bắt đầu bằng số và có dấu `'`.

---

## 8. Quy ước đặt tên chuẩn trong Java

Nên dùng quy ước sau để code dễ đọc:

### Class

Dùng PascalCase.

```java
SinhVien
SanPham
BaiTapPattern
```

### Biến và phương thức

Dùng camelCase.

```java
hoTen
maSinhVien
hienThiThongTin
```

### Hằng số

Dùng UPPER_SNAKE_CASE.

```java
MAX_SIZE
PI
DEFAULT_TIMEOUT
```

---

## 9. Từ khóa và reserved words

Java có 53 từ dành riêng:

- 50 keyword
- 3 reserved literal: `true`, `false`, `null`

Các từ này không được dùng làm tên biến, tên lớp hoặc tên phương thức.

Ví dụ từ khóa hay gặp:

```java
class
public
static
void
int
if
else
for
while
return
new
switch
try
catch
```

Hai từ `const` và `goto` được Java giữ chỗ nhưng không sử dụng.

Người mới chưa cần học thuộc hết 53 từ ngay. Trước mắt cần nhớ các từ hay gặp khi làm bài.

---

## 10. Biến trong Java

Cú pháp khai báo biến:

```java
<kiểu dữ liệu> <tên biến>;
```

Ví dụ:

```java
int tuoi;
double diem;
String hoTen;
```

Có thể vừa khai báo vừa gán giá trị:

```java
int a = 10;
String ten = "Dat";
```

---

## 11. Ba loại biến trong Java

### Local variable

Biến cục bộ, khai báo bên trong method hoặc block `{}`.

Chỉ dùng được trong phạm vi block đó.

```java
public static void main(String[] args) {
    int a = 10;
}
```

### Instance variable

Biến đối tượng, thuộc về từng object cụ thể.

```java
class SinhVien {
    String hoTen;
    int tuoi;
}
```

Mỗi object `SinhVien` có `hoTen` và `tuoi` riêng.

### Static variable

Biến lớp, dùng chung cho cả class.

```java
class SinhVien {
    static int soLuong;
}
```

---

## 12. Kiểu dữ liệu trong Java

Java có 2 nhóm kiểu dữ liệu chính:

- Kiểu nguyên thủy
- Kiểu không nguyên thủy

### Kiểu nguyên thủy

Số nguyên:

```java
byte
short
int
long
```

Số thực:

```java
float
double
```

Kiểu khác:

```java
char
boolean
```

Ghi nhớ:

- `int` thường dùng cho số nguyên.
- `double` thường dùng cho số thực.
- `char` dùng cho một ký tự.
- `boolean` chỉ có `true` hoặc `false`.

### Kiểu không nguyên thủy

Ví dụ:

```java
String
array
class do người dùng định nghĩa
```

---

## 13. Ép kiểu

Ép kiểu dùng khi chuyển đổi từ kiểu dữ liệu này sang kiểu dữ liệu khác.

Ví dụ ép `double` sang `int`:

```java
double x = 9.8;
int y = (int) x;
System.out.println(y);
```

Kết quả:

```text
9
```

Lưu ý: ép từ `double` sang `int` sẽ cắt phần thập phân, không làm tròn.

---

## 14. Toán tử số học

Các toán tử số học:

| Toán tử | Ý nghĩa |
|---|---|
| `+` | Cộng |
| `-` | Trừ |
| `*` | Nhân |
| `/` | Chia |
| `%` | Chia lấy dư |

Ví dụ chia lấy dư:

```text
1 % 1 = 0
10 % 3 = 1
2 % 1 = 0
```

---

## 15. Toán tử gán kết hợp

Ví dụ:

```java
int a = 10;
int b = 20;
int c;

System.out.println(c = a);
System.out.println(b += a);
System.out.println(b -= a);
System.out.println(b *= a);
System.out.println(b /= a);
```

Kết quả:

```text
10
30
20
200
20
```

Giải thích:

- `c = a`: `c = 10`, in `10`.
- `b += a`: `20 + 10 = 30`, in `30`.
- `b -= a`: `30 - 10 = 20`, in `20`.
- `b *= a`: `20 * 10 = 200`, in `200`.
- `b /= a`: `200 / 10 = 20`, in `20`.

---

## 16. Toán tử so sánh và logic

Toán tử so sánh:

```java
==
!=
<
>
<=
>=
```

Kết quả của so sánh là `true` hoặc `false`.

Toán tử logic:

```java
&&  // AND
||  // OR
!   // NOT
```

---

## 17. Toán tử tăng giảm

Có 2 dạng:

```java
++i
i++
--i
i--
```

Ý nghĩa:

- `++i`: tăng trước rồi dùng.
- `i++`: dùng trước rồi tăng.
- `--i`: giảm trước rồi dùng.
- `i--`: dùng trước rồi giảm.

---

## 18. Toán tử 3 ngôi

Cú pháp:

```java
<điều kiện> ? <giá trị nếu đúng> : <giá trị nếu sai>
```

Ví dụ:

```java
int diem = 8;
String ketQua = diem >= 5 ? "Dau" : "Rot";
System.out.println(ketQua);
```

---

## 19. Cấu trúc điều khiển

Các cấu trúc thường gặp:

- `if`
- `if-else`
- `else if`
- `switch-case`

### if

```java
if (diem >= 5) {
    System.out.println("Dau");
}
```

### if-else

```java
if (diem >= 5) {
    System.out.println("Dau");
} else {
    System.out.println("Rot");
}
```

### switch-case

`switch-case` thường dùng cho menu lựa chọn.

Cần dùng `break` để thoát khỏi từng case.

---

## 20. Vòng lặp

Các vòng lặp thường gặp:

- `for`
- `for-each`
- `while`
- `do-while`

### for

```java
for (int i = 1; i <= 10; i++) {
    System.out.println(i);
}
```

### for-each

Dùng để duyệt từng phần tử trong mảng hoặc collection.

```java
int[] arr = {1, 2, 3};
for (int x : arr) {
    System.out.println(x);
}
```

### while

Kiểm tra điều kiện trước, thực hiện sau.

```java
while (i <= 10) {
    i++;
}
```

### do-while

Thực hiện trước, kiểm tra điều kiện sau.

Chạy ít nhất 1 lần.

---

## 21. break, continue, return

### break

Thoát khỏi vòng lặp hoặc `switch` ngay lập tức.

### continue

Bỏ qua phần còn lại của lần lặp hiện tại, chuyển sang lần lặp tiếp theo.

### return

Thoát khỏi phương thức hiện tại.

Nếu dùng trong `main`, chương trình có thể kết thúc.

---

## 22. Demo thực hành trên Eclipse

Giảng viên demo:

- Tạo Java Project trên Eclipse.
- Viết chương trình mẫu.
- Chạy chương trình.

Nếu chưa cài Eclipse, có thể dùng trình biên dịch online tạm thời.

Tuy nhiên vẫn nên cài Eclipse để thực hành đúng môi trường học.

---

## 23. Bài tập thực hành: in pattern ký tự

Các bài tập yêu cầu nhìn ra quy luật rồi dùng vòng lặp để in hình.

### Bài 1

In 10 dòng, mỗi dòng có số lượng ký tự `*` theo yêu cầu.

Dùng 2 vòng lặp `for` lồng nhau.

Sau mỗi dòng cần xuống dòng.

### Bài 2

In tam giác có khoảng trắng phía trước.

Dòng `y` có:

```text
(y - 1) khoảng trắng
(10 - y + 1) ký tự *
```

### Bài 4

In hình chữ nhật rỗng.

Điều kiện in `*`:

```text
dòng == 1
dòng == 10
cột == 1
cột == 10
```

Các vị trí còn lại in khoảng trắng.

### Bài 5

In hình chữ nhật rỗng có 2 đường chéo.

Điều kiện in `*`:

```text
dòng == 1
dòng == 10
cột == 1
cột == 10
dòng == cột
dòng + cột == 11
```

---

## 24. Ghi nhớ nhanh

- Java có tính đa nền tảng nhờ JVM.
- `.java` biên dịch thành `.class`.
- Identifier là tên do mình đặt trong code.
- Không dùng từ khóa Java để đặt tên biến/lớp.
- Java phân biệt chữ hoa và chữ thường.
- `int` thường dùng cho số nguyên.
- `double` thường dùng cho số thực.
- `%` là chia lấy dư.
- `break` thoát vòng lặp hoặc switch.
- `continue` bỏ qua lần lặp hiện tại.
- `return` thoát khỏi phương thức.
- Làm bài pattern cần nhìn ra quy luật trước khi code.
