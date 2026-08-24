# Câu hỏi ôn tập buổi 01

## 1. Phân biệt Tier và Layer

**Tier** là tầng triển khai vật lý.

Nó cho biết hệ thống được triển khai trên mấy máy, mấy server hoặc mấy môi trường chạy.

Ví dụ:

```text
Client - Server - Database
```

Đây là 3-tier.

**Layer** là lớp logic trong code.

Nó cho biết code được chia theo trách nhiệm như thế nào.

Ví dụ:

```text
Model - View - Controller
```

Đây là 3-layer.

Ghi nhớ ngắn:

```text
Tier = chạy ở đâu
Layer = code chia thế nào
```

---

## 2. MVC là gì?

MVC là viết tắt của:

- Model
- View
- Controller

MVC là mô hình tổ chức code theo 3 lớp logic.

- Model: dữ liệu và xử lý liên quan đến dữ liệu.
- View: giao diện hiển thị cho người dùng.
- Controller: nhận yêu cầu, điều phối xử lý và trả kết quả.

MVC là layer, không phải tier.

---

## 3. Mô hình Client - Server - Database là mấy tầng?

Đây là mô hình 3-tier.

Vì nó chia hệ thống theo triển khai vật lý:

```text
Client - Application Server - Database Server
```

---

## 4. TCP và UDP khác nhau như thế nào?

TCP:

- Có kết nối.
- Tin cậy hơn.
- Chậm hơn.
- Đảm bảo thứ tự dữ liệu tốt hơn.

UDP:

- Không kết nối.
- Nhanh hơn.
- Kém tin cậy hơn.
- Có thể mất gói tin.

---

## 5. Socket là gì?

Socket là điểm giao tiếp giữa các ứng dụng qua mạng.

Một socket thường cần:

- IP
- Port
- Giao thức TCP hoặc UDP

Ví dụ:

```text
Client gửi dữ liệu đến IP của server tại một port cụ thể.
```
