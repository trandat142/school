public class Bai02TamGiacSao {
    public static void main(String[] args) {
        // Vòng lặp i đại diện cho số dòng, từ dòng 1 đến dòng 10
        for (int i = 1; i <= 10; i++) {

            // Mỗi dòng i sẽ in ra i ký tự '*'
            // Ví dụ:
            // i = 1 -> in 1 dấu *
            // i = 2 -> in 2 dấu *
            for (int j = 1; j <= i; j++) {
                System.out.print("*");
            }

            // Sau khi in xong một dòng thì xuống dòng
            System.out.println();
        }
    }
}
