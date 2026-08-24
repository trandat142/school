// ===============================
// DEMO NHẬP KÝ TỰ BẰNG System.in.read()
// ===============================
public class DemoNhapKyTu {

    public static void main(String[] args) throws Exception {

        // System.in.read() đọc một ký tự từ bàn phím
        // Kết quả trả về là kiểu int, thường là mã ASCII
        System.out.print("Nhap mot ky tu: ");
        int ch = System.in.read();

        // Ép kiểu int sang char để hiển thị ký tự
        char kyTu = (char) ch;

        // In mã số của ký tự
        System.out.println("Ma so vua nhap: " + ch);

        // In ký tự thật sự
        System.out.println("Ky tu vua nhap: " + kyTu);
    }
}
