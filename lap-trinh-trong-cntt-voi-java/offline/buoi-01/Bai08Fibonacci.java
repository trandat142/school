public class Bai08Fibonacci {
    // Hàm tính số Fibonacci tại vị trí n
    // Theo đề:
    // F(0) = 1
    // F(1) = 1
    // F(n) = F(n - 1) + F(n - 2)
    public static int fibo(int n) {
        // Điều kiện dừng 1
        if (n == 0) {
            return 1;
        }

        // Điều kiện dừng 2
        if (n == 1) {
            return 1;
        }

        // Công thức đệ quy
        return fibo(n - 1) + fibo(n - 2);
    }

    public static void main(String[] args) {
        // In 20 số Fibonacci đầu tiên
        for (int i = 0; i < 20; i++) {
            System.out.print(fibo(i) + " ");
        }
    }
}
