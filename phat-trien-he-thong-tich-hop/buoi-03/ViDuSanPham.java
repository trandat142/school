class SanPham {
    String maSP;
    String tenSP;
    double donGia;
    int soLuong;

    // Constructor
    public SanPham(String maSP, String tenSP, double donGia, int soLuong) {
        this.maSP = maSP;
        this.tenSP = tenSP;
        this.donGia = donGia;
        this.soLuong = soLuong;
    }

    // Tính thành tiền
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

public class ViDuSanPham {
    public static void main(String[] args) {
        SanPham sp1 = new SanPham("SP1", "Sach", 10000, 3);
        SanPham sp2 = new SanPham("SP2", "But", 5000, 10);

        sp1.hienThiThongTin();
        sp2.hienThiThongTin();
    }
}
