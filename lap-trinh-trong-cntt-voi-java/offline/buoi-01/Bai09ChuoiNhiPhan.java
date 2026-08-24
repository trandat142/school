public class Bai09ChuoiNhiPhan {
    // Số bit cần in
    static final int SO_BIT = 4;

    // Mảng lưu từng bit của chuỗi nhị phân
    // Ví dụ: [0, 1, 1, 0] sẽ in ra 0110
    static int[] nhiphan = new int[SO_BIT];

    // Hàm đệ quy để sinh chuỗi nhị phân
    // viTri là vị trí bit hiện tại đang cần gán
    public static void xuat(int viTri) {
        // Nếu viTri == SO_BIT nghĩa là đã gán đủ các bit
        if (viTri == SO_BIT) {
            // In toàn bộ chuỗi nhị phân hiện tại
            for (int i = 0; i < SO_BIT; i++) {
                System.out.print(nhiphan[i]);
            }
            System.out.println();
        } else {
            // Trường hợp 1: gán bit hiện tại bằng 0
            nhiphan[viTri] = 0;
            xuat(viTri + 1);

            // Trường hợp 2: gán bit hiện tại bằng 1
            nhiphan[viTri] = 1;
            xuat(viTri + 1);
        }
    }

    public static void main(String[] args) {
        // Bắt đầu sinh chuỗi từ vị trí 0
        xuat(0);
    }
}
