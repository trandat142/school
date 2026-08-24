import java.util.List;

class NhanVienCoBan {
    public double tinhLuong() {
        return 0;
    }
}

class NhanVienFullTime extends NhanVienCoBan {
    @Override
    public double tinhLuong() {
        return 15000000;
    }
}

class NhanVienPartTime extends NhanVienCoBan {
    @Override
    public double tinhLuong() {
        return 5000000;
    }
}

public class ViDuDaHinh {
    public static void main(String[] args) {
        NhanVienCoBan nv1 = new NhanVienFullTime();
        NhanVienCoBan nv2 = new NhanVienPartTime();

        List<NhanVienCoBan> ds = List.of(nv1, nv2);

        for (NhanVienCoBan nv : ds) {
            System.out.println(nv.tinhLuong());
        }
    }
}
