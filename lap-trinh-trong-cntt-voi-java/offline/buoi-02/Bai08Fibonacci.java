public class Bai08Fibonacci {
    // Hàm đệ quy tính số Fibonacci thứ n
    public static int fibo(int n) {
        // Điều kiện dừng:
        // Nếu n là 0 hoặc 1 thì trả về 1 ngay
        // Nếu không có điều kiện dừng, hàm sẽ tự gọi mãi và gây StackOverflowError
        if (n == 0 || n == 1) {
            return 1;
        }

        // Bước đệ quy:
        // F(n) = F(n - 1) + F(n - 2)
        return fibo(n - 1) + fibo(n - 2);
    }

    public static void main(String[] args) {
        System.out.println("Day 20 so Fibonacci dau tien:");

        // In 20 số Fibonacci đầu tiên, từ chỉ số 0 đến 19
        for (int i = 0; i < 20; i++) {
            System.out.print(fibo(i) + " ");
        }
    }
}
