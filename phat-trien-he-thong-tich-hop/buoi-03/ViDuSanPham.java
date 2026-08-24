// ===============================
// CLASS: SanPham
// ===============================
class SanPham {

    // Thuộc tính của sản phẩm
    String maSP;
    String tenSP;
    double donGia;
    int soLuong;

    // Constructor
    // Dùng để khởi tạo sản phẩm với đầy đủ thông tin
    public SanPham(String maSP, String tenSP, double donGia, int soLuong) {
        this.maSP = maSP;
        this.tenSP = tenSP;
        this.donGia = donGia;
        this.soLuong = soLuong;
    }

    // Tính thành tiền
    // Thành tiền = đơn giá * số lượng
    double tinhThanhTien() {
        return donGia * soLuong;
    }

    // Hiển thị thông tin sản phẩm
    void hienThiThongTin() {
        System.out.println("Ma san pham: " + maSP);
        System.out.println("Ten san pham: " + tenSP);
        System.out.println("Don gia: " + donGia);
        System.out.println("So luong: " + soLuong);
        System.out.println("Thanh tien: " + tinhThanhTien());
        System.out.println();
    }
}

// ===============================
// CLASS DEMO
// ===============================
public class ViDuSanPham {

    public static void main(String[] args) {

        // Tạo sản phẩm thứ nhất
        SanPham sp1 = new SanPham("SP1", "Sach", 10000, 3);

        // Tạo sản phẩm thứ hai
        SanPham sp2 = new SanPham("SP2", "But", 5000, 10);

        // Hiển thị thông tin 2 sản phẩm
        sp1.hienThiThongTin();
        sp2.hienThiThongTin();
    }
}
