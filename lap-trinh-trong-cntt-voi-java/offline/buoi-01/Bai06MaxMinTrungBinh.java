import java.util.Scanner;

public class Bai06MaxMinTrungBinh {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        // Nhập số lượng phần tử
        System.out.print("Nhap n: ");
        int n = sc.nextInt();

        // Nếu n <= 0 thì không thể nhập dãy số hợp lệ
        if (n <= 0) {
            System.out.println("n phai > 0");
            sc.close();
            return; // Thoát khỏi hàm main
        }

        int max;
        int min;
        long sum = 0; // Dùng long để giảm nguy cơ bị tràn số khi cộng nhiều số int

        // Nhập số đầu tiên để làm giá trị ban đầu cho max, min và sum
        System.out.print("Nhap so thu 1: ");
        int x = sc.nextInt();

        max = x;
        min = x;
        sum = x;

        // Nhập các số còn lại từ số thứ 2 đến số thứ n
        for (int i = 2; i <= n; i++) {
            System.out.print("Nhap so thu " + i + ": ");
            x = sc.nextInt();

            // Cập nhật max nếu x lớn hơn max hiện tại
            if (x > max) {
                max = x;
            }

            // Cập nhật min nếu x nhỏ hơn min hiện tại
            if (x < min) {
                min = x;
            }

            // Cộng x vào tổng
            sum += x;
        }

        // Nhân 1.0 để phép chia ra số thực double
        double avg = sum * 1.0 / n;

        System.out.println("Max = " + max);
        System.out.println("Min = " + min);
        System.out.println("Average = " + avg);

        sc.close();
    }
}
