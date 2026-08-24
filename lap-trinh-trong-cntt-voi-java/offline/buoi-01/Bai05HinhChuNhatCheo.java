public class Bai05HinhChuNhatCheo {
    public static void main(String[] args) {
        // Hình có 8 dòng và 10 cột
        // Lưu ý: đề/code gốc dùng i <= 8 nhưng điều kiện lại có i == 10.
        // Vì i không bao giờ bằng 10 nên điều kiện đó sai.
        // Ở đây sửa thành i == 8 để đúng với dòng cuối.
        for (int i = 1; i <= 8; i++) {
            for (int j = 1; j <= 10; j++) {

                // In * nếu vị trí hiện tại thuộc:
                // - Viền trên: i == 1
                // - Viền dưới: i == 8
                // - Viền trái: j == 1
                // - Viền phải: j == 10
                // - Đường chéo xuôi: i == j
                // - Đường chéo ngược: i + j == 11
                if (i == 1 || i == 8 || j == 1 || j == 10 || i == j || i + j == 11) {
                    System.out.print("*");
                } else {
                    // Không thuộc viền hoặc đường chéo thì in khoảng trắng
                    System.out.print(" ");
                }
            }

            // Xuống dòng sau khi in xong một dòng
            System.out.println();
        }
    }
}
