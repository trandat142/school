import java.util.Scanner;

public class Bai10DemTanSuat {
    public static void main(String[] args) {
        Scanner nhap = new Scanner(System.in);

        // 1. Nhập số lượng phần tử
        System.out.print("Nhap so phan tu: ");
        int n = nhap.nextInt();

        if (n <= 0) {
            System.out.println("So phan tu phai > 0");
            nhap.close();
            return;
        }

        // 2. Nhập từng phần tử của mảng
        int[] daySo = new int[n];
        for (int i = 0; i < n; i++) {
            System.out.print("Nhap phan tu " + (i + 1) + ": ");
            daySo[i] = nhap.nextInt();
        }

        // 3. In dãy số ban đầu
        System.out.println("Day so vua nhap vao la:");
        for (int i = 0; i < n; i++) {
            System.out.print(daySo[i] + " ");
        }
        System.out.println();

        // 4. Sắp xếp tăng dần để các phần tử giống nhau nằm gần nhau
        for (int i = 0; i < n - 1; i++) {
            for (int j = i + 1; j < n; j++) {
                if (daySo[i] > daySo[j]) {
                    int temp = daySo[i];
                    daySo[i] = daySo[j];
                    daySo[j] = temp;
                }
            }
        }

        System.out.println("Day so sau khi sap xep tang dan:");
        for (int i = 0; i < n; i++) {
            System.out.print(daySo[i] + " ");
        }
        System.out.println();

        // 5. Mảng check dùng để đếm và đánh dấu
        // check[i] = 1 nghĩa là ban đầu giả sử phần tử i xuất hiện 1 lần
        // check[i] = 0 nghĩa là phần tử i đã được tính vào phần tử trước đó
        int[] check = new int[n];
        for (int i = 0; i < n; i++) {
            check[i] = 1;
        }

        // 6. Đếm số lần xuất hiện
        for (int i = 0; i < n - 1; i++) {
            // Chỉ xử lý nếu phần tử này chưa bị đánh dấu trùng trước đó
            if (check[i] != 0) {
                for (int j = i + 1; j < n; j++) {
                    // Nếu phần tử phía sau giống phần tử hiện tại
                    if (daySo[j] == daySo[i]) {
                        check[i]++;  // Tăng số lần xuất hiện của daySo[i]
                        check[j] = 0; // Đánh dấu daySo[j] để không in lại
                    }
                }
            }
        }

        // 7. In kết quả
        System.out.println("Ket qua dem tan suat xuat hien:");
        for (int i = 0; i < n; i++) {
            if (check[i] != 0) {
                System.out.println("phan tu " + daySo[i] + " xuat hien " + check[i] + " lan");
            }
        }

        nhap.close();
    }
}
