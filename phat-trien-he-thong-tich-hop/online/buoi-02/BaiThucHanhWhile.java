// ===============================
// BÀI THỰC HÀNH BUỔI 02
// ===============================
// Yêu cầu:
// - Nhập ký tự bất kỳ
// - Nhập K: Chúc mừng trúng thưởng
// - Nhập Q: Thoát chương trình
// - Ký tự khác: Chúc bạn may mắn lần sau
// - Dùng while, không dùng do-while

public class BaiThucHanhWhile {

    public static void main(String[] args) throws Exception {

        // Gán giá trị ban đầu khác Q
        // để vòng lặp while được chạy lần đầu
        char kyTu = '0';

        // Lặp khi ký tự chưa phải Q
        while (kyTu != 'Q') {

            System.out.print("Nhap ky tu bat ky: ");

            // Đọc một ký tự từ bàn phím
            int ch = System.in.read();

            // Ép kiểu int sang char
            kyTu = (char) ch;

            // Xử lý ký tự Enter hoặc xuống dòng còn dư
            // Khi nhập trên terminal rồi bấm Enter,
            // System.in có thể còn ký tự '\n' hoặc '\r'
            if (kyTu == '\n' || kyTu == '\r') {
                continue;
            }

            // Nếu nhập Q thì thoát
            if (kyTu == 'Q') {
                System.out.println("Thoat chuong trinh");
            }
            // Nếu nhập K thì trúng thưởng
            else if (kyTu == 'K') {
                System.out.println("Chuc mung trung thuong");
            }
            // Các ký tự khác
            else {
                System.out.println("Chuc ban may man lan sau");
            }
        }
    }
}
