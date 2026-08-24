# Buổi 01 - Tổng quan môn học và nền tảng Java

## Action items

- [ ] Cài đặt JDK trước buổi học tiếp theo.
- [ ] Cài đặt IDE Eclipse trước buổi học tiếp theo.
- [ ] Chuẩn bị để code cùng giảng viên ở các buổi demo trực tiếp, đặc biệt từ khoảng buổi 6.
- [ ] Chủ động tìm thêm tài liệu từ Internet, AI và các nguồn trực tuyến.
- [ ] Ôn lại kiến thức nền tảng về máy tính, hệ điều hành và mạng máy tính.

---

## 1. Tổng quan môn học

Môn học: **Lập trình trong CNTT với Java**.

Thời lượng:

- 15 tiết lý thuyết
- 10 tiết thực hành

Mục tiêu của môn học là giúp sinh viên có thể tạo ra sản phẩm ứng dụng thực tế, không chỉ học lý thuyết.

Nội dung trọng tâm:

- Cấu trúc dữ liệu
- Giải thuật
- Danh sách liên kết
- Cây nhị phân
- Tư duy lập trình và giải quyết vấn đề
- Java và cách Java hoạt động

Giảng viên sẽ dạy từ cơ bản, đi chậm theo trình độ lớp vì đa số sinh viên là người mới.

---

## 2. Quy định và điểm số

Một số điểm cần chú ý:

- Trả lời tốt có thể được cộng điểm.
- Vắng buổi học có thể bị trừ điểm.
- Điểm có thể tính vào điểm thực hành hoặc điểm thường kỳ.
- Sinh viên cần chủ động học thêm, không chỉ chờ nội dung trên lớp.

Lưu ý: thông tin về cộng/trừ điểm cần theo thông báo chính thức của giảng viên trong từng buổi.

---

## 3. Khảo sát kinh nghiệm sinh viên

Đa số sinh viên trong lớp là newbie, tức là mới học hoặc chưa có nhiều kinh nghiệm thực tế.

Một số sinh viên đã có kinh nghiệm liên quan đến:

- Website
- Phần mềm
- Lập trình mã nguồn mở
- Thiết kế phần mềm hoặc UI

Giảng viên có thể đánh giá riêng những sinh viên đã có kinh nghiệm để giao vai trò phù hợp, ví dụ làm trưởng nhóm.

---

## 4. Nghề lập trình và tác động của AI

Lộ trình năng lực thường gặp:

```text
Newbie -> Junior -> Senior
```

AI có thể hỗ trợ lập trình rất mạnh, nhưng không thay thế hoàn toàn người có tư duy tốt.

Điểm quan trọng:

- Không nên lệ thuộc hoàn toàn vào AI.
- Phải hiểu logic và biết kiểm tra kết quả AI tạo ra.
- Người lập trình cần có khả năng giải quyết vấn đề.
- Nếu không có tư duy logic, rất khó lập trình thật sự.

Điều này không chỉ đúng với lập trình, mà còn đúng với thiết kế, sáng tạo nội dung và các công việc liên quan đến CNTT.

---

## 5. Bản chất của lập trình

Lập trình là lập ra **trình tự các bước** để máy tính thực hiện một bài toán.

Có thể hiểu đơn giản:

```text
Code = ngôn ngữ dùng để ra lệnh cho máy tính làm việc
```

Muốn lập trình tốt cần hiểu:

- Bài toán cần giải quyết là gì
- Dữ liệu đầu vào là gì
- Kết quả đầu ra là gì
- Các bước xử lý ra sao
- Cách giải nào nhanh và tiết kiệm tài nguyên hơn

---

## 6. Giải thuật là gì?

Giải thuật là cách giải quyết bài toán đã được mô tả rõ ràng theo từng bước.

Các bài toán phổ biến thường có giải thuật riêng, ví dụ:

- Tìm kiếm
- Sắp xếp
- Thêm dữ liệu
- Xóa dữ liệu
- Sửa dữ liệu

Người lập trình cần nắm, hiểu và vận dụng giải thuật.

Nghĩ ra giải thuật tốt hơn là việc khó, vì nhiều bài toán phổ biến đã có các giải thuật được nghiên cứu từ trước.

---

## 7. Cấu trúc dữ liệu và giải thuật

Cấu trúc dữ liệu và giải thuật là nền tảng quan trọng của lập trình.

Cấu trúc dữ liệu giúp tổ chức dữ liệu để xử lý hiệu quả hơn.

Các nội dung trọng tâm của môn:

- Danh sách liên kết
- Cây nhị phân
- Tìm kiếm
- Sắp xếp
- Xử lý dữ liệu có cấu trúc

Cấu trúc dữ liệu và giải thuật không phụ thuộc hoàn toàn vào một ngôn ngữ cụ thể. Java chỉ là công cụ để hiện thực giải pháp.

---

## 8. Bài tập pseudocode: tìm max/min của 3 số

Bài toán:

```text
Cho 3 số A, B, C. Tìm giá trị lớn nhất và nhỏ nhất.
```

### Cách 1: dùng biến max và min

```text
Nhập A, B, C
max = A
min = A

Nếu B > max thì max = B
Nếu C > max thì max = C

Nếu B < min thì min = B
Nếu C < min thì min = C

In max
In min
```

### Cách 2: so sánh trực tiếp

```text
Nếu A >= B và A >= C thì A là lớn nhất
Nếu B >= A và B >= C thì B là lớn nhất
Nếu C >= A và C >= B thì C là lớn nhất

Tương tự với giá trị nhỏ nhất
```

Cách 1 thường gọn và dễ mở rộng hơn khi số lượng phần tử nhiều.

---

## 9. Ôn lại kiến thức nền tảng máy tính

### Kiến trúc máy tính

Các thành phần cần nhớ:

- ISA
- CPU
- RAM
- Bus
- Cache

### ISA

ISA là Instruction Set Architecture, tức kiến trúc tập lệnh.

ISA là tập các lệnh máy mà CPU hiểu và thực thi được.

Mỗi lệnh thường gồm:

```text
opcode + operands
```

Trong đó:

- `opcode`: mã lệnh, cho biết thao tác cần làm
- `operands`: toán hạng, là dữ liệu hoặc địa chỉ liên quan đến lệnh

Ví dụ thao tác cơ bản:

- Cộng
- Trừ
- So sánh
- Di chuyển dữ liệu

---

## 10. CPU

CPU là bộ xử lý trung tâm, có nhiệm vụ thực hiện lệnh, tính toán và điều khiển hoạt động của máy tính.

Các thành phần chính trong CPU:

- CU
- ALU
- Tập thanh ghi
- Khối phối ghép bus
- Cache

### CU

CU là Control Unit, tức khối điều khiển.

Nhiệm vụ:

- Đọc lệnh
- Giải mã lệnh
- Điều khiển các thành phần khác thực hiện lệnh

### ALU

ALU là Arithmetic Logic Unit, tức khối tính toán số học và logic.

ALU xử lý:

- Cộng, trừ, nhân, chia
- So sánh đúng/sai
- Các phép logic như AND, OR

### Thanh ghi

Thanh ghi là vùng nhớ rất nhanh nằm trong CPU.

Có thể dùng để lưu:

- Dữ liệu tạm
- Địa chỉ
- Trạng thái
- Lệnh đang xử lý

### Cache

Cache là bộ nhớ đệm tốc độ cao.

Các mức cache thường gặp:

- L1
- L2
- L3

Cache ảnh hưởng đến tốc độ xử lý và giá của CPU.

---

## 11. RAM và Bus

### RAM

RAM là bộ nhớ tạm trong lúc máy tính hoạt động.

Đặc điểm:

- Lưu dữ liệu và chương trình đang chạy
- Tốc độ nhanh hơn ổ cứng
- Mất dữ liệu khi tắt nguồn nếu chưa lưu

Ví dụ: đang mở Word hoặc Chrome thì dữ liệu đang xử lý nằm trong RAM.

### Bus

Bus là đường truyền dữ liệu giữa các thành phần trong máy tính.

Ví dụ:

```text
RAM -> Bus -> CPU
```

Dữ liệu từ RAM đi qua bus để đến CPU xử lý.

---

## 12. Hệ điều hành

Hệ điều hành kiểm soát toàn bộ hoạt động của máy tính.

Các khái niệm cần nhớ:

- Đơn nhiệm
- Đa nhiệm
- Đơn người dùng
- Đa người dùng
- Process
- Thread
- PCB

### Đơn nhiệm và đa nhiệm

Đơn nhiệm: chỉ chạy một chương trình tại một thời điểm.

Đa nhiệm: có thể chạy nhiều chương trình cùng lúc, thực chất là hệ điều hành phân chia thời gian xử lý rất nhanh.

Ví dụ: Windows vừa mở trình duyệt, vừa nghe nhạc, vừa soạn văn bản là đa nhiệm.

### Đơn người dùng và đa người dùng

Đơn người dùng: phục vụ một người dùng tại một thời điểm.

Đa người dùng: nhiều người có thể cùng truy cập và sử dụng hệ thống.

Ví dụ: server Linux có nhiều tài khoản đăng nhập là hệ thống đa người dùng.

### Process và Thread

Process là tiến trình, tức một chương trình đang chạy.

Thread là tiểu trình, là luồng xử lý nhỏ hơn bên trong process.

### PCB

PCB là Process Control Block, tức khối quản lý tiến trình.

Hệ điều hành dùng PCB để lưu thông tin quản lý tiến trình.

---

## 13. 32-bit và 64-bit

32-bit và 64-bit liên quan đến khả năng xử lý dữ liệu và địa chỉ bộ nhớ.

64-bit thường có khả năng:

- Xử lý vùng nhớ lớn hơn
- Hỗ trợ nhiều RAM hơn
- Phù hợp với xử lý song song và hệ thống hiện đại hơn

Ví dụ:

- Windows 32-bit thường bị giới hạn RAM thấp hơn
- Windows 64-bit dùng được nhiều RAM hơn

---

## 14. Xử lý tuần tự và song song

Xử lý tuần tự là làm từng việc một.

Xử lý song song là làm nhiều việc cùng lúc.

Ví dụ:

- Một người nấu từng món lần lượt: tuần tự
- Nhiều người cùng nấu nhiều món: song song
- CPU nhiều lõi có thể xử lý nhiều tác vụ cùng lúc tốt hơn

---

## 15. Mạng máy tính

Các nội dung cần nhớ:

- Cấu hình TCP/IP
- Xem thông tin hệ thống

### Cấu hình TCP/IP

TCP/IP giúp máy tính kết nối vào mạng Internet hoặc mạng nội bộ.

Ví dụ cấu hình:

```text
IP: 192.168.1.10
Gateway: 192.168.1.1
```

### Xem thông tin hệ thống mạng

Trên Windows có thể dùng:

```bash
ipconfig
```

Trên Linux/macOS có thể dùng:

```bash
ifconfig
```

hoặc:

```bash
ip addr
```

---

## 16. Giới thiệu Java

Java được phát triển bởi Sun Microsystems, hiện thuộc Oracle.

Java là ngôn ngữ:

- Bậc cao
- Hướng đối tượng
- Phổ biến trong hệ thống doanh nghiệp
- Có cộng đồng lớn
- Có nhiều framework hỗ trợ

Khẩu hiệu nổi bật của Java:

```text
Write Once, Run Anywhere
```

Nghĩa là viết một lần, chạy ở nhiều nơi có JVM.

---

## 17. Java dùng ở đâu?

Java thường dùng trong:

- Ứng dụng doanh nghiệp
- Web backend
- Hệ thống cơ sở dữ liệu
- Bảo mật
- Ứng dụng desktop
- Hệ thống lớn cần ổn định

Python thường mạnh hơn ở một số mảng như:

- AI
- Phân tích dữ liệu
- IoT

Nhưng Java vẫn rất mạnh trong enterprise và hệ thống lớn.

---

## 18. Các phiên bản Java

Các phiên bản/chủng Java thường gặp:

- Java SE
- Java EE
- Java ME

### Java SE

Java Standard Edition, dùng cho ứng dụng Java cơ bản và desktop.

### Java EE

Java Enterprise Edition, dùng cho ứng dụng doanh nghiệp, web và server.

### Java ME

Java Micro Edition, dùng cho thiết bị nhỏ hoặc mobile đời cũ.

---

## 19. Cơ chế hoạt động của Java

Quy trình cơ bản:

```text
File .java -> biên dịch -> file .class -> JVM thực thi
```

Cụ thể:

1. Lập trình viên viết mã nguồn `.java`.
2. Trình biên dịch `javac` biên dịch thành bytecode `.class`.
3. JVM đọc bytecode và thực thi trên máy cụ thể.

Java kết hợp cả:

- Biên dịch
- Thông dịch/thực thi qua JVM

Đây là lý do Java có tính độc lập nền tảng.

---

## 20. JDK, JRE và JVM

### JDK

JDK là Java Development Kit.

Dùng để phát triển chương trình Java.

JDK gồm:

- JRE
- Compiler
- Công cụ hỗ trợ phát triển

### JRE

JRE là Java Runtime Environment.

Dùng để chạy chương trình Java.

Nếu chỉ chạy ứng dụng Java thì có thể chỉ cần JRE.

### JVM

JVM là Java Virtual Machine.

JVM thực thi bytecode `.class`.

---

## 21. IDE Eclipse

Eclipse là IDE dùng để viết, chạy và quản lý project Java.

Cần cài Eclipse trước buổi học tiếp theo để chuẩn bị code cùng giảng viên.

---

## 22. Các loại lỗi trong lập trình

### Lỗi cú pháp

Lỗi do viết sai quy tắc ngôn ngữ.

Ví dụ:

- Thiếu dấu `;`
- Sai tên biến
- Sai cấu trúc lệnh

Lỗi này thường được phát hiện khi biên dịch.

### Lỗi ngữ nghĩa

Lỗi do câu lệnh hợp cú pháp nhưng ý nghĩa xử lý không đúng.

### Lỗi runtime

Lỗi xảy ra khi chương trình đang chạy.

Ví dụ:

- Chia cho 0
- Truy cập phần tử mảng không tồn tại
- File không tồn tại

### Lỗi logic

Lỗi logic là lỗi nguy hiểm nhất.

Chương trình vẫn chạy, nhưng kết quả sai.

Ví dụ:

- Công thức tính sai
- Điều kiện `if` viết ngược
- Thuật toán sai

---

## 23. Ghi nhớ nhanh

- Lập trình là lập ra trình tự để máy tính giải quyết bài toán.
- Code là mã lệnh điều khiển máy tính làm việc.
- Giải thuật là cách giải bài toán theo từng bước rõ ràng.
- Cấu trúc dữ liệu và giải thuật là nền tảng quan trọng.
- Java là ngôn ngữ bậc cao, hướng đối tượng.
- Java chạy qua JVM.
- `.java` là mã nguồn.
- `.class` là bytecode sau biên dịch.
- JDK dùng để phát triển Java.
- JRE dùng để chạy Java.
- Eclipse là IDE để lập trình Java.
- Lỗi logic nguy hiểm vì chương trình chạy được nhưng kết quả sai.
