class SinhVien {
    String maSV;
    String hoTen;
    double diemTB;

    // Constructor
    public SinhVien(String maSV, String hoTen, double diemTB) {
        this.maSV = maSV;
        this.hoTen = hoTen;
        this.diemTB = diemTB;
    }

    void hienThiThongTin() {
        System.out.println("MSSV: " + maSV + " co ten la: " + hoTen);
        System.out.println("Diem TB: " + diemTB);
    }
}

public class ViDuSinhVien {
    public static void main(String[] args) {
        SinhVien sv1 = new SinhVien("SV001", "Nguyen Van A", 8.5);
        sv1.hienThiThongTin();
    }
}
