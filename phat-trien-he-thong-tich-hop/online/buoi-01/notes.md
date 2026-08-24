# Buổi 01 - Giới thiệu môn học và tổng quan hệ thống tích hợp

## Action items

- [ ] Kiểm tra và cập nhật tên đăng nhập cho khớp với danh sách lớp.
- [ ] Xem tài liệu/slide trên LMS.
- [ ] Tìm hiểu trước sự khác biệt giữa `Tier` và `Layer`.
- [ ] Tìm hiểu mô hình MVC: Model - View - Controller.

---

## 1. Quy định môn học

### Điểm danh

Giảng viên sẽ điểm danh không thường xuyên.

Việc kiểm tra chủ yếu dựa trên tên đăng nhập của sinh viên.

Cần kiểm tra tên đăng nhập cho đúng với danh sách lớp.

### Camera và micro

Trong giờ học bình thường, không bắt buộc mở camera.

Khi làm bài kiểm tra, bắt buộc bật:

- Micro
- Camera

Nếu được gọi trong lúc kiểm tra nhưng không bật hoặc không trả lời thì có thể không có điểm.

### Tài liệu học

Tài liệu và slide sẽ được đăng trên LMS.

Giảng viên không gửi tài liệu qua Zalo.

---

## 2. Cấu trúc điểm số

Môn học gồm:

- 30 tiết lý thuyết
- 30 tiết thực hành

### Điểm lý thuyết

Có 2 cột điểm thường kỳ.

Hình thức có thể thay đổi theo quá trình học.

Buổi 10 chắc chắn có một bài kiểm tra hoặc ôn kiểm tra.

### Điểm thực hành

Thực hành có 3 cột điểm.

#### TH1

Tính theo các bài nộp qua hệ thống MMS.

Có thể hiểu đơn giản:

```text
1 bài nộp = 1 điểm
Đi học và nộp bài đầy đủ = điểm cao hơn
```

Lưu ý:

- Nếu 2 bài giống nhau và bị phát hiện copy, cả 2 bài có thể không có điểm.

#### TH2

Giảng viên gọi ngẫu nhiên sinh viên trình bày hoặc chạy bài trong giờ thực hành.

Cần hiểu bài mình làm, không chỉ nộp code.

#### TH3

Có thể là:

- Bài kiểm tra thực hành
- Hoặc báo cáo cá nhân

Hình thức cụ thể sẽ được quyết định sau.

---

## 3. Thi giữa kỳ và cuối kỳ

### Thi giữa kỳ

Thi giữa kỳ là bài thực hành trong giờ thực hành.

Quy định:

- Không dùng Internet.
- Không dùng AI.
- Được dùng tài liệu giấy tự chuẩn bị.

### Thi cuối kỳ

Thi cuối kỳ là bài tự luận theo lịch chung.

Được sử dụng tài liệu giấy.

Vì vậy nên chuẩn bị tài liệu ôn thi ngắn, dễ tra cứu.

---

## 4. Nội dung môn học

Ngôn ngữ sử dụng chính trong môn học là Java.

Các nội dung chính:

- Review Java
- OOP trong Java
- Các gói lập trình mạng
- Stream
- Đa luồng, multithreading
- Docker
- Socket programming
- JDBC
- TCP và UDP

Socket programming là phần trọng tâm của môn học.

Môn học tập trung nhiều vào:

- Tầng Application
- Tầng Transport

Trong mô hình TCP/IP, đây là các tầng liên quan trực tiếp đến lập trình ứng dụng mạng.

---

## 5. Hệ thống tích hợp là gì?

Hệ thống tích hợp là quá trình kết nối nhiều hệ thống phần cứng hoặc phần mềm để chúng hoạt động như một hệ thống thống nhất.

Ví dụ:

- Zalo tích hợp chat, gọi video, gửi file.
- Trang thương mại điện tử tích hợp thanh toán online.
- Ứng dụng có đăng nhập bằng Google hoặc Facebook.
- Hệ thống IoT kết nối thiết bị, cảm biến và phần mềm quản lý.

Một hệ thống hiện đại thường không chỉ có một chức năng riêng lẻ, mà tích hợp nhiều dịch vụ khác nhau.

---

## 6. Micro-service và tích hợp dịch vụ

Micro-service là cách chia hệ thống thành nhiều dịch vụ nhỏ.

Mỗi dịch vụ xử lý một chức năng riêng.

Ví dụ:

- Dịch vụ đăng nhập
- Dịch vụ thanh toán
- Dịch vụ gửi thông báo
- Dịch vụ quản lý người dùng

Ví dụ tích hợp dịch vụ:

- Đăng nhập bằng Google
- Đăng nhập bằng Facebook
- Thanh toán qua Momo
- Thanh toán qua ZaloPay

Những chức năng này không nhất thiết do ứng dụng chính tự viết toàn bộ, mà có thể kết nối đến dịch vụ bên ngoài.

---

## 7. Mô hình TCP/IP

Mô hình TCP/IP thường được trình bày với 5 tầng:

```text
Application
Transport
Network
DataLink
Physical
```

Luồng dữ liệu đi từ tầng trên xuống tầng dưới khi gửi đi.

Khi nhận dữ liệu, quá trình diễn ra ngược lại từ tầng dưới lên tầng trên.

Môn học này tập trung nhiều vào:

```text
Application + Transport
```

Vì đây là phần liên quan đến lập trình ứng dụng mạng, TCP, UDP và socket.

---

## 8. So sánh TCP/IP và OSI

OSI có 7 tầng.

TCP/IP thường được học với 5 tầng.

Có thể hiểu đơn giản:

| Mô hình | Số tầng | Mục đích |
|---|---:|---|
| OSI | 7 | Mô hình lý thuyết chi tiết |
| TCP/IP | 5 | Mô hình thực tế dùng nhiều trong mạng |

Môn học chủ yếu dùng TCP/IP để học lập trình mạng.

---

## 9. TCP và UDP

### TCP

TCP là giao thức hướng kết nối.

Đặc điểm:

- Có thiết lập kết nối trước khi truyền dữ liệu.
- Độ tin cậy cao.
- Có kiểm soát lỗi và thứ tự dữ liệu.
- Tốc độ thường chậm hơn UDP.

TCP phù hợp khi cần truyền dữ liệu chính xác.

Ví dụ:

- Gửi file
- Truy cập web
- Đăng nhập
- Giao dịch

### UDP

UDP là giao thức không kết nối.

Đặc điểm:

- Không cần thiết lập kết nối trước.
- Tốc độ nhanh hơn.
- Độ tin cậy thấp hơn TCP.
- Có thể mất gói tin.

UDP phù hợp khi ưu tiên tốc độ hơn độ chính xác tuyệt đối.

Ví dụ:

- Gọi thoại
- Video call
- Game online
- Truyền dữ liệu thời gian thực

### So sánh nhanh

| Tiêu chí | TCP | UDP |
|---|---|---|
| Kết nối | Có kết nối | Không kết nối |
| Độ tin cậy | Cao | Thấp hơn |
| Tốc độ | Chậm hơn | Nhanh hơn |
| Thứ tự dữ liệu | Có đảm bảo | Không đảm bảo |
| Ví dụ | Web, gửi file | Video call, game |

Trong môn này, khi học socket có thể phải viết cả 2 phiên bản:

- TCP socket
- UDP socket

---

## 10. Lập trình Socket

Socket là kỹ thuật giao tiếp giữa các ứng dụng trên các máy khác nhau thông qua mạng.

Một kết nối mạng thường cần:

- IP
- Port
- Giao thức truyền dữ liệu

Có thể hiểu đơn giản:

```text
IP = địa chỉ máy
Port = cửa vào ứng dụng
Socket = điểm kết nối để gửi và nhận dữ liệu
```

Ví dụ:

Một client muốn gửi dữ liệu đến server thì cần biết:

```text
Địa chỉ IP của server
Port server đang mở
Giao thức TCP hoặc UDP
```

---

## 11. Mô hình ứng dụng mạng

### Client - Server

Trong mô hình Client - Server:

- Client gửi yêu cầu.
- Server xử lý và trả kết quả.
- Dữ liệu thường lưu tập trung trên server.

Ví dụ:

- Website
- Hệ thống quản lý sinh viên
- Ứng dụng ngân hàng

### Peer-to-Peer

Trong mô hình Peer-to-Peer, các thiết bị có thể giao tiếp trực tiếp với nhau.

Ví dụ:

- Gọi thoại
- Video call
- Chia sẻ file trực tiếp

### Hybrid

Hybrid là mô hình kết hợp Client - Server và Peer-to-Peer.

Ví dụ với Zalo:

- Tin nhắn có thể đi qua server.
- Cuộc gọi thoại/video có thể dùng giao tiếp gần kiểu P2P hoặc kết hợp nhiều cơ chế.

---

## 12. Kiến trúc Tier

Tier là tầng theo nghĩa vật lý hoặc triển khai hệ thống.

Ví dụ:

### 1-tier

Tất cả nằm trên một máy.

```text
Client + xử lý + dữ liệu
```

### 2-tier

Gồm client và server.

```text
Client - Server
```

### 3-tier

Gồm client, application server và database server.

```text
Client - Application Server - Database Server
```

---

## 13. Phân biệt Tier và Layer

Đây là câu hỏi cần chuẩn bị cho buổi sau.

### Tier

Tier là tầng vật lý hoặc tầng triển khai.

Tier trả lời câu hỏi:

```text
Hệ thống được chia trên mấy máy hoặc mấy môi trường triển khai?
```

Ví dụ:

```text
Client - Server - Database
```

Đây là 3-tier.

### Layer

Layer là lớp logic trong code.

Layer trả lời câu hỏi:

```text
Code được tổ chức thành những lớp chức năng nào?
```

Ví dụ MVC:

```text
Model - View - Controller
```

Đây là 3 layer.

### So sánh nhanh

| Nội dung | Tier | Layer |
|---|---|---|
| Ý nghĩa | Tầng triển khai vật lý | Lớp logic trong code |
| Liên quan đến | Máy, server, môi trường chạy | Cách tổ chức code |
| Ví dụ | Client - Server - Database | Model - View - Controller |
| Câu hỏi chính | Chạy ở đâu? | Code chia trách nhiệm thế nào? |

Ghi nhớ:

```text
Tier = tầng vật lý
Layer = lớp logic
```

---

## 14. MVC là gì?

MVC là viết tắt của:

- Model
- View
- Controller

MVC là mô hình tổ chức code theo 3 lớp logic.

### Model

Model xử lý dữ liệu và nghiệp vụ liên quan đến dữ liệu.

### View

View hiển thị giao diện cho người dùng.

### Controller

Controller nhận yêu cầu từ người dùng, gọi Model xử lý và chọn View để hiển thị kết quả.

Luồng cơ bản:

```text
User - View - Controller - Model - Controller - View
```

MVC là **Layer**, không phải Tier.

Nếu hỏi MVC là mấy tầng thì cần nói rõ:

```text
MVC là mô hình 3 lớp logic, không phải 3 tầng vật lý.
```

---

## 15. Câu hỏi cần nhớ

### Câu 1: Phân biệt Tier và Layer

Tier là tầng triển khai vật lý, liên quan đến máy, server, môi trường chạy.

Layer là lớp logic trong code, liên quan đến cách chia trách nhiệm trong chương trình.

Ví dụ:

```text
Client - Server - Database = 3-tier
Model - View - Controller = 3-layer
```

### Câu 2: MVC là gì?

MVC là mô hình 3 lớp logic gồm:

- Model
- View
- Controller

MVC dùng để tổ chức code rõ ràng, dễ bảo trì.

### Câu 3: MVC là layer hay tier?

MVC là layer.

Không nên gọi MVC là 3-tier.

Nên gọi là:

```text
Mô hình 3 lớp MVC
```

### Câu 4: Client - Server - Database là layer hay tier?

Đây là tier.

Cụ thể là 3-tier.

Vì nó nói về cách triển khai hệ thống trên các thành phần vật lý hoặc server khác nhau.

---

## 16. Ghi nhớ nhanh

- Môn học dùng Java.
- Trọng tâm là Socket programming.
- Sẽ học TCP và UDP.
- TCP tin cậy hơn nhưng chậm hơn.
- UDP nhanh hơn nhưng kém tin cậy hơn.
- Socket cần IP và Port.
- Client - Server là mô hình phổ biến.
- P2P là các thiết bị giao tiếp trực tiếp.
- Hybrid là kết hợp nhiều mô hình.
- Tier là tầng triển khai vật lý.
- Layer là lớp logic trong code.
- MVC là 3 layer: Model, View, Controller.
