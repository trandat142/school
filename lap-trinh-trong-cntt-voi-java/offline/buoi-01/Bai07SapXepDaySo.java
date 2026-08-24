import java.util.Scanner;

public class Bai07SapXepDaySo {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        // Nhập số lượng phần tử của mảng
        System.out.print("Nhap vao so phan tu: ");
        int n = sc.nextInt();

        if (n <= 0) {
            System.out.println("So phan tu phai > 0");
            sc.close();
            return;
        }

        // Khai báo mảng số nguyên có n phần tử
        int[] daySo = new int[n];

        // Nhập từng phần tử vào mảng
        for (int i = 0; i < n; i++) {
            System.out.print("Nhap phan tu thu " + (i + 1) + ": ");
            daySo[i] = sc.nextInt();
        }

        // In dãy số vừa nhập
        System.out.println("Day so vua nhap vao la:");
        for (int i = 0; i < n; i++) {
            System.out.print(daySo[i] + " ");
        }
        System.out.println();

        // Tạo mảng phụ để sắp xếp tăng dần
        // Không sắp xếp trực tiếp mảng gốc để còn giữ lại dãy đã nhập
        int[] tangDan = daySo.clone();

        // Sắp xếp tăng dần bằng cách đổi chỗ đơn giản
        for (int i = 0; i < n - 1; i++) {
            for (int j = i + 1; j < n; j++) {
                if (tangDan[i] > tangDan[j]) {
                    int temp = tangDan[i];
                    tangDan[i] = tangDan[j];
                    tangDan[j] = temp;
                }
            }
        }

        // In dãy tăng dần
        System.out.println("Day so sau khi sap xep tang dan:");
        for (int i = 0; i < n; i++) {
            System.out.print(tangDan[i] + " ");
        }
        System.out.println();

        // In dãy giảm dần bằng cách duyệt mảng tăng dần từ cuối về đầu
        System.out.println("Day so sau khi sap xep giam dan:");
        for (int i = n - 1; i >= 0; i--) {
            System.out.print(tangDan[i] + " ");
        }
        System.out.println();

        sc.close();
    }
}
