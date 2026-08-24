import java.util.Scanner;

public class Bai11TimKiemThemXoa {
    // Hàm in n phần tử đầu tiên của mảng
    public static void inMang(int[] a, int n) {
        for (int i = 0; i < n; i++) {
            System.out.print(a[i] + " ");
        }
        System.out.println();
    }

    // Tìm kiếm nhị phân trên mảng đã sắp xếp tăng dần
    // Nếu tìm thấy x thì trả về chỉ số của x
    // Nếu không tìm thấy thì trả về -1
    public static int timKiemNhiPhan(int[] a, int n, int x) {
        int left = 0;
        int right = n - 1;

        while (left <= right) {
            // Cách tính mid này an toàn hơn (left + right) / 2 khi chỉ số rất lớn
            int mid = left + (right - left) / 2;

            if (a[mid] == x) {
                return mid;
            }

            // Nếu phần tử giữa nhỏ hơn x thì x chỉ có thể nằm bên phải
            if (a[mid] < x) {
                left = mid + 1;
            } else {
                // Ngược lại x nằm bên trái
                right = mid - 1;
            }
        }

        return -1;
    }

    // Thêm x vào mảng đã sắp xếp tăng dần
    // n là số phần tử thực tế hiện có
    // Hàm trả về n mới sau khi thêm
    public static int themPhanTu(int[] a, int n, int x) {
        int pos = 0;

        // Tìm vị trí đầu tiên mà a[pos] >= x
        // Khi đó chèn x vào pos để mảng vẫn tăng dần
        while (pos < n && a[pos] < x) {
            pos++;
        }

        // Dịch các phần tử từ cuối về sau 1 ô để tạo chỗ trống
        // Phải duyệt từ phải sang trái để không ghi đè dữ liệu
        for (int i = n - 1; i >= pos; i--) {
            a[i + 1] = a[i];
        }

        // Đưa x vào vị trí trống
        a[pos] = x;

        // Tăng số phần tử thực tế thêm 1
        return n + 1;
    }

    // Xóa phần tử x khỏi mảng đã sắp xếp
    // Nếu x không tồn tại thì giữ nguyên n
    public static int xoaPhanTu(int[] a, int n, int x) {
        int pos = timKiemNhiPhan(a, n, x);

        if (pos == -1) {
            System.out.println("Khong tim thay phan tu " + x + " trong mang de xoa");
            return n;
        }

        // Dịch các phần tử sau pos đè lên trước để lấp chỗ trống
        for (int i = pos; i < n - 1; i++) {
            a[i] = a[i + 1];
        }

        System.out.println("Da xoa thanh cong phan tu " + x);

        // Giảm số phần tử thực tế đi 1
        return n - 1;
    }

    public static void main(String[] args) {
        Scanner nhap = new Scanner(System.in);

        // Mảng có sức chứa tối đa 100 phần tử
        // n sẽ quản lý số phần tử thật sự đang dùng
        int maxSize = 100;
        int[] a = new int[maxSize];

        System.out.print("Nhap so luong phan tu ban dau n: ");
        int n = nhap.nextInt();

        if (n <= 0 || n > maxSize) {
            System.out.println("n phai > 0 va <= " + maxSize);
            nhap.close();
            return;
        }

        System.out.println("Nhap cac phan tu theo thu tu tang dan:");
        for (int i = 0; i < n; i++) {
            System.out.print("a[" + i + "] = ");
            a[i] = nhap.nextInt();
        }

        System.out.println("Mang ban dau:");
        inMang(a, n);

        // 1. Tìm kiếm
        System.out.print("Nhap gia tri can tim: ");
        int xTim = nhap.nextInt();
        int viTri = timKiemNhiPhan(a, n, xTim);

        if (viTri != -1) {
            System.out.println("Tim thay " + xTim + " tai index: " + viTri);
        } else {
            System.out.println("Khong tim thay " + xTim + " trong mang");
        }

        // 2. Thêm phần tử
        System.out.print("Nhap gia tri can them: ");
        int xThem = nhap.nextInt();

        if (n < maxSize) {
            n = themPhanTu(a, n, xThem);
            System.out.println("Mang sau khi them " + xThem + ":");
            inMang(a, n);
        } else {
            System.out.println("Mang da day, khong the them");
        }

        // 3. Xóa phần tử
        System.out.print("Nhap gia tri can xoa: ");
        int xXoa = nhap.nextInt();
        n = xoaPhanTu(a, n, xXoa);

        System.out.println("Mang sau khi xoa:");
        inMang(a, n);

        nhap.close();
    }
}
