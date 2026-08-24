# Buổi 02 - Offline: Mảng, đệ quy, quay lui, tìm kiếm/thêm/xóa

## Ghi chú cho người mới

Khi mới học Java, không nên chỉ đọc code chay. Cần đọc kèm comment để hiểu:

- Vì sao viết dòng đó.
- Logic thuật toán chạy thế nào.
- Bẫy thường gặp trong Java.
- Điều kiện dừng của đệ quy.
- Cách tránh ghi đè dữ liệu khi thêm/xóa phần tử trong mảng.

---

## Bài 6 và 7 - Mảng 1 chiều, max/min/trung bình, sắp xếp

### Điểm mấu chốt

- Khi tìm max/min trong mảng, nên khởi tạo bằng `daySo[0]`, không nên gán bằng `0`.
- Nếu mảng toàn số âm mà gán `max = 0`, kết quả max sẽ sai.
- Khi tính trung bình, dùng `sum * 1.0 / n` để kết quả là số thực.
- Nếu viết `sum / n` với 2 số nguyên, Java sẽ chia nguyên và mất phần thập phân.
- Sắp xếp tăng dần có thể dùng 2 vòng lặp lồng nhau và hoán đổi bằng biến `temp`.

### Tư duy sắp xếp đổi chỗ

```text
Nếu phần tử trước lớn hơn phần tử sau
-> đổi chỗ 2 phần tử
```

Ví dụ đổi chỗ:

```java
int temp = a[i];
a[i] = a[j];
a[j] = temp;
```

---

## Bài 8 - Đệ quy Fibonacci

Đệ quy là hàm tự gọi lại chính nó.

Mọi hàm đệ quy phải có điều kiện dừng.

Với Fibonacci:

```text
F(0) = 1
F(1) = 1
F(n) = F(n - 1) + F(n - 2)
```

Điều kiện dừng:

```java
if (n == 0 || n == 1) return 1;
```

Nếu thiếu điều kiện dừng, chương trình có thể gọi hàm vô hạn và báo lỗi `StackOverflowError`.

---

## Bài 9 - Quay lui sinh chuỗi nhị phân

Ý tưởng:

- Tại mỗi vị trí bit, thử gán `0`.
- Gọi tiếp hàm cho vị trí sau.
- Sau đó thử gán `1`.
- Gọi tiếp hàm cho vị trí sau.
- Khi đã đủ số bit thì in chuỗi.

Ví dụ với 4 bit sẽ sinh:

```text
0000
0001
0010
0011
...
1111
```

---

## Bài 10 - Đếm tần suất phần tử

Dùng mảng đánh dấu `check[]` để tránh in trùng.

Ý nghĩa:

- `check[i] = 1`: phần tử tại vị trí `i` chưa bị đếm trùng.
- `check[i] > 1`: phần tử tại vị trí `i` xuất hiện nhiều lần.
- `check[i] = 0`: phần tử này đã được tính vào phần tử trước đó, không in lại.

Khi gặp phần tử trùng:

```java
check[i]++;
check[j] = 0;
```

---

## Bài 11 - Tìm kiếm, thêm, xóa trên mảng đã sắp xếp

### Bản chất mảng trong Java

Mảng có kích thước cố định sau khi tạo.

Ví dụ:

```java
int[] a = new int[100];
```

Mảng có sức chứa tối đa 100 phần tử, nhưng không có nghĩa là đang dùng đủ 100 phần tử.

Ta dùng biến `n` để quản lý số phần tử thực tế.

### Tìm kiếm

Vì mảng đã sắp xếp tăng dần, có thể dùng tìm kiếm nhị phân.

Tìm kiếm nhị phân nhanh hơn duyệt tuần tự.

### Thêm phần tử

Để thêm `x` vào mảng vẫn giữ tăng dần:

1. Tìm vị trí cần chèn.
2. Dịch các phần tử từ phải sang phải thêm 1 ô.
3. Gán `x` vào vị trí trống.
4. Tăng `n`.

### Xóa phần tử

Để xóa `x`:

1. Tìm vị trí của `x`.
2. Dịch các phần tử phía sau đè lên phía trước.
3. Giảm `n`.
