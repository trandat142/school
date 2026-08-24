public class ViDuToanTu {
    public static void main(String[] args) {
        // Khai báo biến a kiểu int và gán giá trị ban đầu là 10
        int a = 10;

        // Khai báo biến b kiểu int và gán giá trị ban đầu là 20
        int b = 20;

        // Khai báo biến c kiểu int nhưng chưa gán giá trị
        int c;

        // Gán giá trị của a cho c
        // c = a nghĩa là c = 10
        // Sau đó in giá trị của c ra màn hình
        System.out.println(c = a);   // Kết quả: 10

        // b += a tương đương với b = b + a
        // b ban đầu là 20, a là 10
        // b = 20 + 10 = 30
        System.out.println(b += a);  // Kết quả: 30

        // b -= a tương đương với b = b - a
        // b hiện tại là 30, a là 10
        // b = 30 - 10 = 20
        System.out.println(b -= a);  // Kết quả: 20

        // b *= a tương đương với b = b * a
        // b hiện tại là 20, a là 10
        // b = 20 * 10 = 200
        System.out.println(b *= a);  // Kết quả: 200

        // b /= a tương đương với b = b / a
        // b hiện tại là 200, a là 10
        // b = 200 / 10 = 20
        System.out.println(b /= a);  // Kết quả: 20

        // Toán tử % là phép chia lấy phần dư
        // 10 chia 3 được 3 dư 1
        System.out.println(10 % 3);  // Kết quả: 1
    }
}
