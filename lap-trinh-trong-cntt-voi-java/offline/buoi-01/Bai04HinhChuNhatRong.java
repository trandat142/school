public class Bai04HinhChuNhatRong {
    public static void main(String[] args) {
        // Hình chữ nhật có 8 dòng và 10 cột
        for (int i = 1; i <= 8; i++) {
            for (int j = 1; j <= 10; j++) {

                // In * nếu đang ở viền hình chữ nhật:
                // i == 1  -> dòng đầu
                // i == 8  -> dòng cuối
                // j == 1  -> cột đầu
                // j == 10 -> cột cuối
                if (i == 1 || i == 8 || j == 1 || j == 10) {
                    System.out.print("*");
                } else {
                    // Bên trong hình chữ nhật thì in khoảng trắng
                    System.out.print(" ");
                }
            }

            // Xuống dòng sau khi in đủ 10 cột
            System.out.println();
        }
    }
}
