# Buổi 08: Quản lý khách hàng bằng cây nhị phân tìm kiếm

## Mục tiêu

- Lưu khách hàng trong cây nhị phân tìm kiếm (BST), khóa là mã khách hàng.
- Duyệt cây theo thứ tự tăng dần của mã khách hàng.
- Tìm kiếm và xóa khách hàng theo mã.

## Cấu trúc

- `src/customermanager_thi/Customer.java`: dữ liệu khách hàng và liên kết hai nhánh cây.
- `src/customermanager_thi/Main.java`: tạo dữ liệu mẫu, duyệt, tìm và xóa khách hàng.

## Biên dịch và chạy

Chạy các lệnh sau từ thư mục `online/buoi-08`:

```bash
mkdir -p out
javac -encoding UTF-8 -d out src/customermanager_thi/*.java
java -cp out customermanager_thi.Main
```

Khi chạy, chương trình yêu cầu nhập mã cần tìm, sau đó mã khách hàng cần xóa.
