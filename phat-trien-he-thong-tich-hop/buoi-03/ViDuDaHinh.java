import java.util.List; // Import List để tạo danh sách

// ===============================
// CLASS CHA: NhanVienCoBan
// ===============================
class NhanVienCoBan {

    // Hàm tính lương chung cho nhân viên
    // Class cha chỉ trả về 0 vì chưa biết loại nhân viên cụ thể
    public double tinhLuong() {
        return 0;
    }
}

// ===============================
// CLASS CON: NhanVienFullTime
// ===============================

// NhanVienFullTime kế thừa từ NhanVienCoBan
class NhanVienFullTime extends NhanVienCoBan {

    // @Override = viết lại hàm tinhLuong() của class cha
    @Override
    public double tinhLuong() {

        // Nhân viên toàn thời gian nhận 15 triệu
        return 15000000;
    }
}

// ===============================
// CLASS CON: NhanVienPartTime
// ===============================

// NhanVienPartTime cũng kế thừa từ NhanVienCoBan
class NhanVienPartTime extends NhanVienCoBan {

    @Override
    public double tinhLuong() {

        // Nhân viên bán thời gian nhận 5 triệu
        return 5000000;
    }
}

// ===============================
// CLASS DEMO
// ===============================
public class ViDuDaHinh {

    public static void main(String[] args) {

        // --------------------------------
        // Tạo nhân viên toàn thời gian
        // --------------------------------

        // NhanVienCoBan = kiểu của biến
        // nv1 = tên biến
        // new NhanVienFullTime() = object thật
        NhanVienCoBan nv1 = new NhanVienFullTime();

        // --------------------------------
        // Tạo nhân viên bán thời gian
        // --------------------------------
        NhanVienCoBan nv2 = new NhanVienPartTime();

        // --------------------------------
        // Tạo danh sách nhân viên
        // --------------------------------

        // List<NhanVienCoBan> = danh sách chứa các nhân viên
        // List.of(nv1, nv2) = đưa nv1 và nv2 vào danh sách
        List<NhanVienCoBan> ds = List.of(nv1, nv2);

        // --------------------------------
        // Duyệt qua danh sách
        // --------------------------------

        // Lần 1: nv = nv1, gọi tinhLuong() của NhanVienFullTime
        // Lần 2: nv = nv2, gọi tinhLuong() của NhanVienPartTime
        for (NhanVienCoBan nv : ds) {
            System.out.println(nv.tinhLuong());
        }
    }
}
