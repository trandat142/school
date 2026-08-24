import java.util.Scanner;

public class Bai10DemTanSuat {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        // Nhập số lượng phần tử
        System.out.print("Nhap so phan tu: ");
        int n = sc.nextInt();

        if (n <= 0) {
            System.out.println("So phan tu phai > 0");
            sc.close();
            return;
        }

        // Khai báo mảng chứa n số nguyên
        int[] daySo = new int[n];

        // Nhập từng phần tử
        for (int i = 0; i < n; i++) {
            System.out.print("Nhap phan tu " + (i + 1) + ": ");
            daySo[i] = sc.nextInt();
        }

        // In dãy số vừa nhập
        System.out.println("Day so vua nhap vao la:");
        for (int i = 0; i < n; i++) {
            System.out.print(daySo[i] + " ");
        }
        System.out.println();

        // Sắp xếp tăng dần để các giá trị giống nhau nằm gần nhau
        for (int i = 0; i < n - 1; i++) {
            for (int j = i + 1; j < n; j++) {
                if (daySo[i] > daySo[j]) {
                    int temp = daySo[i];
                    daySo[i] = daySo[j];
                    daySo[j] = temp;
                }
            }
        }

        // In dãy sau khi sắp xếp
        System.out.println("Day so sau khi sap xep tang dan:");
        for (int i = 0; i < n; i++) {
            System.out.print(daySo[i] + " ");
        }
        System.out.println();

        // Mảng check dùng để đánh dấu số lần xuất hiện
        // check[i] = 0 nghĩa là phần tử tại vị trí i đã được tính ở vị trí trước đó
        int[] check = new int[n];

        // Ban đầu giả sử mỗi phần tử xuất hiện 1 lần
        for (int i = 0; i < n; i++) {
            check[i] = 1;
        }

        // Đếm số lần xuất hiện của từng phần tử
        for (int i = 0; i < n - 1; i++) {
            // Chỉ xử lý nếu phần tử này chưa bị đánh dấu là đã tính rồi
            if (check[i] != 0) {
                for (int j = i + 1; j < n; j++) {
                    // Nếu gặp phần tử giống daySo[i]
                    if (daySo[j] == daySo[i]) {
                        check[i]++;  // Tăng số lần xuất hiện
                        check[j] = 0; // Đánh dấu vị trí j đã được tính
                    }
                }
            }
        }

        // In kết quả đếm
        for (int i = 0; i < n; i++) {
            if (check[i] != 0) {
                System.out.println("phan tu " + daySo[i] + " xuat hien " + check[i] + " lan");
            }
        }

        sc.close();
    }
}
