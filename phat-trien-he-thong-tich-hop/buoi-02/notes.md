# Buổi 02 - Kiến trúc phần mềm và Java cơ bản

## 1. Tổng quan buổi học

Buổi học gồm 2 phần chính:

- Kiến trúc phần mềm
- Nhắc lại Java cơ bản

Nội dung Java trong buổi này dùng để chuẩn bị cho các bài lập trình mạng sau này, đặc biệt là TCP và UDP.

---

## 2. Action items

- [ ] Gõ lại chương trình demo Java.
- [ ] Thêm biến vào chương trình.
- [ ] Sử dụng `System.in` để nhập ký tự.
- [ ] Dùng vòng lặp `while`, không dùng `do-while`.
- [ ] Chụp màn hình đầy đủ gồm code và kết quả chạy.
- [ ] Test đủ các trường hợp: nhập `K`, nhập `Q`, nhập ký tự khác.
- [ ] Tự nghiên cứu lớp `Scanner` để chuẩn bị cho buổi sau.

---

## 3. Kiến trúc phần mềm

Một ứng dụng thường có các phần chức năng chính:

- Giao diện
- Xử lý nghiệp vụ
- Truy vấn hoặc lưu trữ dữ liệu

Trong đó:

- Tầng xử lý còn gọi là business logic.
- Tầng dữ liệu dùng để lưu trữ và truy vấn thông tin.

---

## 4. Kiến trúc 1 tầng

Kiến trúc 1 tầng là toàn bộ chức năng nằm trên một máy.

Bao gồm:

- Giao diện
- Xử lý
- Lưu trữ dữ liệu

Ví dụ: một phần mềm chạy độc lập trên máy cá nhân, dữ liệu lưu ngay trên máy đó.

Ưu điểm:

- Đơn giản.
- Dễ triển khai khi chương trình nhỏ.

Nhược điểm:

- Khó mở rộng.
- Khó dùng chung dữ liệu cho nhiều máy.
- Không phù hợp với hệ thống nhiều người dùng.

---

## 5. Kiến trúc 2 tầng: Client - Server

Kiến trúc 2 tầng gồm:

- Client
- Server

Client gửi yêu cầu đến server.

Server xử lý yêu cầu và trả kết quả về client.

Kiến trúc này hỗ trợ nhiều máy cùng tương tác với một hệ thống.

### Fat Client

Fat Client là kiểu client chứa nhiều logic xử lý.

Client có thể chứa:

- Code giao diện
- Logic xử lý
- Một phần tính toán

Server chủ yếu làm nhiệm vụ lưu trữ dữ liệu.

### Fat Server

Fat Server là kiểu server xử lý hầu hết chức năng.

Client chủ yếu:

- Hiển thị giao diện
- Gửi yêu cầu đến server
- Nhận kết quả từ server

Server xử lý:

- Tính toán
- Nghiệp vụ
- Truy vấn dữ liệu
- Lưu trữ dữ liệu

---

## 6. Kiến trúc 3 tầng

Kiến trúc 3 tầng gồm:

```text
Client - Application Server - Database Server
```

Trong đó:

- Client: giao diện cho người dùng.
- Application Server: xử lý nghiệp vụ.
- Database Server: lưu trữ dữ liệu.

Đây là kiểu kiến trúc phổ biến trong các hệ thống hiện nay.

---

## 7. Phân biệt MVC và N-tier

### MVC là gì?

MVC là mô hình tổ chức code theo 3 lớp:

- Model
- View
- Controller

MVC nằm ở mức logic tổ chức code.

Nên gọi MVC là mô hình 3 lớp, không nên gọi là 3 tầng để tránh nhầm với kiến trúc vật lý.

### N-tier là gì?

N-tier là kiến trúc ở mức vật lý.

Nó mô tả cách các máy hoặc thiết bị tương tác với nhau.

Ví dụ:

- 1-tier
- 2-tier
- 3-tier

### Điểm khác nhau

| Nội dung | MVC | N-tier |
|---|---|---|
| Mức nhìn | Logic code | Vật lý hệ thống |
| Mục tiêu | Tổ chức code | Tổ chức máy và server |
| Ví dụ | Model, View, Controller | Client, Server, Database |
| Cách gọi nên dùng | 3 lớp | 3 tầng |

Nếu một hệ thống có cả client và server, mỗi phía vẫn có thể tổ chức code theo MVC.

---

## 8. Giới thiệu Java

Môn học sử dụng Java để lập trình ứng dụng mạng.

Các giao thức sẽ học:

- TCP
- UDP

Đặc điểm của Java:

- Là ngôn ngữ lập trình cấp cao.
- Hướng đối tượng.
- Chạy trên nhiều hệ điều hành nhờ JVM.
- Hỗ trợ đa luồng.
- Hỗ trợ lập trình phân tán.

Java thường được dùng trong:

- Ứng dụng desktop
- Ứng dụng server
- API
- Ứng dụng mạng
- Hệ thống phân tán

---

## 9. JVM và JDK

### JVM

JVM là Java Virtual Machine, tức máy ảo Java.

JVM giúp chương trình Java chạy được trên nhiều hệ điều hành khác nhau.

### JDK

JDK là Java Development Kit.

JDK là bộ công cụ để phát triển Java.

Một số công cụ trong JDK:

- `javac`: biên dịch file `.java` thành `.class`
- `java`: chạy chương trình Java
- `javadoc`: tạo tài liệu từ code
- `appletviewer`: chạy applet cũ

---

## 10. File `.java` và `.class`

File `.java` là file mã nguồn.

Ví dụ:

```text
HelloJava.java
```

Khi biên dịch, Java tạo file `.class`.

Ví dụ:

```text
HelloJava.class
```

Máy chạy file `.class`, không chạy trực tiếp code nguồn theo cách truyền thống.

Lệnh biên dịch:

```bash
javac HelloJava.java
```

Lệnh chạy:

```bash
java HelloJava
```

Lưu ý khi nộp bài:

- Nộp file `.java`.
- Không nộp file `.class`.
- Thầy cô cần xem code để chấm.

---

## 11. Quy tắc đặt tên trong Java

Java phân biệt chữ hoa và chữ thường.

Ví dụ:

```java
int STT;
int stt;
```

`STT` và `stt` là 2 tên khác nhau.

Quy tắc đặt tên:

- Không bắt đầu bằng số.
- Có thể dùng chữ cái, chữ số, dấu gạch dưới `_`.
- Tên class viết hoa chữ cái đầu mỗi từ.
- Tên biến và phương thức viết thường chữ cái đầu.

Ví dụ class:

```java
HelloJava
SinhVien
SanPham
```

Ví dụ biến/phương thức:

```java
hoTen
maSinhVien
hienThiThongTin
```

---

## 12. Cấu trúc file Java

Một file `.java` có thể có nhiều class.

Nhưng chỉ nên có một `public class` chính.

Tên `public class` phải trùng với tên file.

Ví dụ file:

```text
Demo.java
```

Thì class chính phải là:

```java
public class Demo {
}
```

Trong class chính cần có hàm `main` để chạy chương trình:

```java
public static void main(String[] args) {
}
```

Biến phải khai báo bên trong class, không khai báo lung tung ngoài class.

---

## 13. Xuất dữ liệu

Dùng:

```java
System.out.println();
```

Ví dụ:

```java
String ten = "Dat";
System.out.println("Xin chao " + ten);
```

Lưu ý:

- Chuỗi cố định phải đặt trong dấu `" "`.
- Biến thì không đặt trong dấu `" "`.
- Dùng dấu `+` để nối chuỗi.

---

## 14. Nhập dữ liệu bằng `System.in.read()`

`System.in.read()` dùng để đọc ký tự nhập từ bàn phím.

Nó trả về kiểu `int`, thường là mã ASCII của ký tự.

Ví dụ:

```java
int ch = System.in.read();
System.out.println(ch);
```

Nếu muốn lấy ký tự, ép kiểu sang `char`:

```java
char kyTu = (char) ch;
```

Ví dụ:

```java
int ch = System.in.read();
char kyTu = (char) ch;
System.out.println("Ky tu vua nhap: " + kyTu);
```

Lưu ý: `System.in.read()` đọc từng ký tự nên có thể gặp ký tự thừa như Enter hoặc xuống dòng.

Trong lập trình mạng, dữ liệu truyền đi cũng có thể có ký tự cuối luồng hoặc ký tự thừa, nên cần xử lý cẩn thận.

---

## 15. Scanner

Lớp `Scanner` sẽ được học kỹ hơn ở buổi sau.

Hiện tại cần tự tìm hiểu trước.

Scanner thường dùng để nhập dữ liệu dễ hơn `System.in.read()`.

Ví dụ:

```java
import java.util.Scanner;

Scanner sc = new Scanner(System.in);
String ten = sc.nextLine();
```

---

## 16. Vòng lặp `while`

Cú pháp:

```java
while (dieuKien) {
    // code lặp lại
}
```

Nếu điều kiện đúng, chương trình tiếp tục lặp.

Nếu điều kiện sai, chương trình thoát vòng lặp.

Ví dụ:

```java
int i = 0;
while (i < 5) {
    System.out.println(i);
    i++;
}
```

---

## 17. `while` và `do-while`

`while` kiểm tra điều kiện trước rồi mới chạy.

`do-while` chạy ít nhất một lần rồi mới kiểm tra điều kiện.

Trong bài thực hành hôm nay, cô yêu cầu dùng `while`, không dùng `do-while`.

---

## 18. Bài thực hành

Yêu cầu:

Viết chương trình nhập ký tự bất kỳ.

- Nhập `K`: in `Chuc mung trung thuong`
- Nhập `Q`: thoát chương trình
- Nhập ký tự khác: in `Chuc ban may man lan sau`
- Chương trình lặp lại đến khi nhập `Q`
- Dùng `while`
- Không dùng `do-while`

Cần test đủ 3 trường hợp:

- Ký tự khác `K` và `Q`
- Ký tự `K`
- Ký tự `Q`

---

## 19. Yêu cầu chụp màn hình nộp bài

Khi nộp bài, cần chụp màn hình đầy đủ.

Màn hình phải có:

- Code
- Kết quả chạy
- Đủ các trường hợp test

Không nên chỉ chụp code mà không chụp kết quả chạy.

Không nên chỉ chụp một phần màn hình làm giảng viên không thấy chương trình có chạy đúng hay không.

---

## 20. Kiểm tra giữa kỳ và cuối kỳ

Giữa kỳ:

- Làm bài thực hành trên máy.
- Cần code chạy được.

Cuối kỳ:

- Thi lý thuyết viết tay.
- Không có AI hỗ trợ.
- Mục tiêu là kiểm tra hiểu logic.
- Không nhất thiết yêu cầu code chạy hoàn hảo từng dấu chấm phẩy, nhưng phải hiểu cách tổ chức chương trình.

---

## 21. Ghi nhớ nhanh

- MVC là 3 lớp logic, không phải 3 tầng vật lý.
- N-tier là kiến trúc vật lý: 1 tầng, 2 tầng, 3 tầng.
- Java chạy qua JVM.
- JDK dùng để phát triển Java.
- File `.java` là code nguồn.
- File `.class` là file sau biên dịch.
- Nộp bài Java thì nộp `.java`, không nộp `.class`.
- `public class` phải trùng tên file.
- Hàm chạy chính là `public static void main(String[] args)`.
- `System.out.println()` dùng để in ra màn hình.
- `System.in.read()` đọc từng ký tự và trả về mã số kiểu `int`.
- Cần ép kiểu `(char)` nếu muốn xử lý ký tự.
- Vòng lặp `while` lặp khi điều kiện đúng.
- Bài thực hành yêu cầu nhập `K`, `Q`, và ký tự khác.
