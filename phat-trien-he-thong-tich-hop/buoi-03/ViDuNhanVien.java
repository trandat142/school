class NhanVien {
    protected String hoTen;

    public NhanVien(String hoTen) {
        this.hoTen = hoTen;
    }

    public double tinhLuong() {
        return 0;
    }
}

class NhanVienToanThoiGian extends NhanVien {
    private double luongThang;

    public NhanVienToanThoiGian(String hoTen, double luongThang) {
        super(hoTen);
        this.luongThang = luongThang;
    }

    @Override
    public double tinhLuong() {
        return luongThang;
    }
}

public class ViDuNhanVien {
    public static void main(String[] args) {
        NhanVienToanThoiGian nv = new NhanVienToanThoiGian("Nguyen Van A", 15000000);

        System.out.println("Ho ten: " + nv.hoTen);
        System.out.println("Luong: " + nv.tinhLuong());
    }
}
