import java.util.Scanner;

public class Bai01MaxMin3So {
    public static void main(String[] args) {
        // Scanner dùng để nhập dữ liệu từ bàn phím
        Scanner sc = new Scanner(System.in);

        // Nhập 3 số nguyên a, b, c
        System.out.print("Nhap a: ");
        int a = sc.nextInt();

        System.out.print("Nhap b: ");
        int b = sc.nextInt();

        System.out.print("Nhap c: ");
        int c = sc.nextInt();

        // Giả sử ban đầu a là số lớn nhất và nhỏ nhất
        int max = a;
        int min = a;

        // Nếu b lớn hơn max hiện tại thì cập nhật max
        if (b > max) {
            max = b;
        }

        // Nếu c lớn hơn max hiện tại thì cập nhật max
        if (c > max) {
            max = c;
        }

        // Nếu b nhỏ hơn min hiện tại thì cập nhật min
        if (b < min) {
            min = b;
        }

        // Nếu c nhỏ hơn min hiện tại thì cập nhật min
        if (c < min) {
            min = c;
        }

        // In kết quả
        System.out.println("Gia tri lon nhat = " + max);
        System.out.println("Gia tri nho nhat = " + min);

        // Đóng Scanner sau khi dùng xong
        sc.close();
    }
}
