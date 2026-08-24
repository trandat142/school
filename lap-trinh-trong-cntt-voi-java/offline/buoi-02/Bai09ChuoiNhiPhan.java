public class Bai09ChuoiNhiPhan {
    // Số bit cần sinh
    static final int SO_BIT = 4;

    // Mảng lưu chuỗi nhị phân hiện tại
    // Ví dụ nhiphan = {0, 1, 1, 0} thì in ra 0110
    static int[] nhiphan = new int[SO_BIT];

    // Hàm quay lui sinh chuỗi nhị phân tại vị trí viTri
    public static void xuat(int viTri) {
        // Điều kiện dừng:
        // Nếu viTri == SO_BIT nghĩa là đã gán đủ các bit từ 0 đến SO_BIT - 1
        if (viTri == SO_BIT) {
            for (int i = 0; i < SO_BIT; i++) {
                System.out.print(nhiphan[i]);
            }
            System.out.println();
        } else {
            // Nhánh 1: thử gán bit hiện tại bằng 0
            nhiphan[viTri] = 0;
            xuat(viTri + 1);

            // Nhánh 2: thử gán bit hiện tại bằng 1
            nhiphan[viTri] = 1;
            xuat(viTri + 1);
        }
    }

    public static void main(String[] args) {
        // Bắt đầu sinh từ vị trí bit đầu tiên, tức index 0
        xuat(0);
    }
}
