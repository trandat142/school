// ===============================
// CLASS CHA: NhanVien
// ===============================
class NhanVien {

    // protected:
    // Thuộc tính này dùng được trong class NhanVien
    // và các class con kế thừa từ NhanVien
    protected String hoTen;

    // Constructor của class NhanVien
    // Dùng để gán họ tên cho nhân viên
    public NhanVien(String hoTen) {
        this.hoTen = hoTen;
    }

    // Phương thức tính lương
    // Class cha chỉ định nghĩa chung
    // Chưa biết nhân viên cụ thể tính lương như thế nào
    public double tinhLuong() {
        return 0;
    }
}

// ===============================
// CLASS CON: NhanVienToanThoiGian
// ===============================

// extends = kế thừa
// NhanVienToanThoiGian kế thừa từ NhanVien
class NhanVienToanThoiGian extends NhanVien {

    // Lương tháng riêng của nhân viên toàn thời gian
    private double luongThang;

    // Constructor của class con
    public NhanVienToanThoiGian(String hoTen, double luongThang) {

        // super(hoTen):
        // Gọi constructor của class cha NhanVien
        // để gán giá trị cho hoTen
        super(hoTen);

        // Gán lương tháng cho nhân viên toàn thời gian
        this.luongThang = luongThang;
    }

    // @Override:
    // Ghi đè, viết lại phương thức tinhLuong()
    // của class cha NhanVien
    @Override
    public double tinhLuong() {

        // Nhân viên toàn thời gian:
        // lương = lương tháng
        return luongThang;
    }
}

// ===============================
// CLASS DEMO: Chạy thử chương trình
// ===============================
public class ViDuNhanVien {

    public static void main(String[] args) {

        // Tạo một nhân viên toàn thời gian
        // "Nguyen Van A" là họ tên
        // 15000000 là lương tháng
        NhanVienToanThoiGian nv = new NhanVienToanThoiGian("Nguyen Van A", 15000000);

        // In họ tên
        System.out.println("Ho ten: " + nv.hoTen);

        // Gọi phương thức tinhLuong()
        System.out.println("Luong: " + nv.tinhLuong());
    }
}
