import java.util.Scanner;

public class Bai06Bai07MangVaSapXep {
    public static void main(String[] args) {
        Scanner nhap = new Scanner(System.in);

        // 1. Nhập số lượng phần tử của mảng
        System.out.print("Nhap vao so phan tu: ");
        int n = nhap.nextInt();

        // Kiểm tra n hợp lệ để tránh tạo mảng rỗng hoặc lỗi khi truy cập daySo[0]
        if (n <= 0) {
            System.out.println("So phan tu phai > 0");
            nhap.close();
            return;
        }

        // 2. Khai báo mảng có n phần tử
        int[] daySo = new int[n];

        // Nhập từng phần tử vào mảng
        for (int i = 0; i < n; i++) {
            // i bắt đầu từ 0 nên khi in cho người dùng thì dùng i + 1
            System.out.print("Nhap phan tu thu " + (i + 1) + ": ");
            daySo[i] = nhap.nextInt();
        }

        // 3. Xuất mảng ban đầu vừa nhập
        System.out.println("Day so vua nhap vao la:");
        for (int i = 0; i < n; i++) {
            System.out.print(daySo[i] + " ");
        }
        System.out.println();

        // 4. Tìm max, min và tính tổng
        // Không gán max/min bằng 0 vì nếu mảng toàn số âm thì sẽ sai
        // Cách đúng là lấy phần tử đầu tiên làm mốc ban đầu
        int max = daySo[0];
        int min = daySo[0];
        int sum = daySo[0];

        // Duyệt từ phần tử thứ 2, tức index 1
        for (int i = 1; i < n; i++) {
            if (daySo[i] > max) {
                max = daySo[i];
            }

            if (daySo[i] < min) {
                min = daySo[i];
            }

            sum = sum + daySo[i];
        }

        // Nhân 1.0 để ép phép chia sang double, tránh chia nguyên
        double average = sum * 1.0 / n;

        System.out.println("Max = " + max + " Min = " + min + " Average = " + average);

        // 5. Tạo mảng phụ để sắp xếp, giữ nguyên dãy ban đầu nếu cần xem lại
        int[] tangDan = daySo.clone();

        // Sắp xếp tăng dần bằng thuật toán đổi chỗ trực tiếp
        for (int i = 0; i < n - 1; i++) {
            for (int j = i + 1; j < n; j++) {
                // Nếu phần tử đứng trước lớn hơn phần tử đứng sau thì đổi chỗ
                if (tangDan[i] > tangDan[j]) {
                    int temp = tangDan[i];
                    tangDan[i] = tangDan[j];
                    tangDan[j] = temp;
                }
            }
        }

        // 6. In dãy số sau khi sắp xếp tăng dần
        System.out.println("Day so sau khi sap xep tang dan:");
        for (int i = 0; i < n; i++) {
            System.out.print(tangDan[i] + " ");
        }
        System.out.println();

        // 7. In dãy số giảm dần bằng cách duyệt mảng tăng dần từ cuối về đầu
        System.out.println("Day so sau khi sap xep giam dan:");
        for (int i = n - 1; i >= 0; i--) {
            System.out.print(tangDan[i] + " ");
        }
        System.out.println();

        nhap.close();
    }
}
