public class Bai03TamGiacNguoc {
    public static void main(String[] args) {
        // Có 10 dòng, i là số thứ tự dòng
        for (int i = 1; i <= 10; i++) {

            // In khoảng trắng phía trước
            // Dòng 1 có 0 khoảng trắng
            // Dòng 2 có 1 khoảng trắng
            // Dòng i có i - 1 khoảng trắng
            for (int j = 1; j <= i - 1; j++) {
                System.out.print(" ");
            }

            // In dấu * sau phần khoảng trắng
            // Dòng 1 có 10 dấu *
            // Dòng 2 có 9 dấu *
            // Dòng i có 11 - i dấu *
            for (int j = 1; j <= 11 - i; j++) {
                System.out.print("*");
            }

            // Xuống dòng sau khi in xong một dòng
            System.out.println();
        }
    }
}
