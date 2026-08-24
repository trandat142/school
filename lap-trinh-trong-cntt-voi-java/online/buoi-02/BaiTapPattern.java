public class BaiTapPattern {
    public static void main(String[] args) {
        // Gọi hàm bai1() để in bài 1
        bai1();

        // In một dòng trống để tách kết quả giữa các bài
        System.out.println();

        // Gọi hàm bai2() để in bài 2
        bai2();
        System.out.println();

        // Gọi hàm bai4() để in bài 4
        bai4();
        System.out.println();

        // Gọi hàm bai5() để in bài 5
        bai5();
    }

    // ===============================
    // Bài 1: In tam giác sao tăng dần
    // ===============================
    static void bai1() {
        System.out.println("Bai 1:");

        // Vòng lặp ngoài đại diện cho số dòng
        // dong chạy từ 1 đến 10, nghĩa là in 10 dòng
        for (int dong = 1; dong <= 10; dong++) {

            // Vòng lặp trong dùng để in dấu * trên từng dòng
            // Ở dòng thứ dong thì in dong dấu *
            // Ví dụ:
            // dong = 1 -> in 1 dấu *
            // dong = 2 -> in 2 dấu *
            // dong = 10 -> in 10 dấu *
            for (int cot = 1; cot <= dong; cot++) {
                System.out.print("*");
            }

            // Sau khi in xong một dòng thì xuống dòng
            System.out.println();
        }
    }

    // ===========================================
    // Bài 2: In tam giác sao ngược lệch sang phải
    // ===========================================
    static void bai2() {
        System.out.println("Bai 2:");

        // Có 10 dòng
        for (int dong = 1; dong <= 10; dong++) {

            // In khoảng trắng phía trước dấu *
            // Dòng 1 có 0 khoảng trắng
            // Dòng 2 có 1 khoảng trắng
            // Dòng 3 có 2 khoảng trắng
            // Công thức: dong - 1
            for (int space = 1; space <= dong - 1; space++) {
                System.out.print(" ");
            }

            // In số lượng dấu * giảm dần
            // Dòng 1 có 10 dấu *
            // Dòng 2 có 9 dấu *
            // Dòng 10 có 1 dấu *
            // Công thức: 10 - dong + 1
            for (int sao = 1; sao <= 10 - dong + 1; sao++) {
                System.out.print("*");
            }

            // Xuống dòng sau khi in xong khoảng trắng và dấu *
            System.out.println();
        }
    }

    // =================================
    // Bài 4: In hình chữ nhật rỗng 10x10
    // =================================
    static void bai4() {
        System.out.println("Bai 4:");

        // Vòng lặp ngoài chạy qua từng dòng của hình chữ nhật
        for (int dong = 1; dong <= 10; dong++) {

            // Vòng lặp trong chạy qua từng cột của mỗi dòng
            for (int cot = 1; cot <= 10; cot++) {

                // In dấu * nếu vị trí hiện tại nằm trên viền:
                // dong == 1  -> dòng đầu tiên
                // dong == 10 -> dòng cuối cùng
                // cot == 1   -> cột đầu tiên
                // cot == 10  -> cột cuối cùng
                if (dong == 1 || dong == 10 || cot == 1 || cot == 10) {
                    System.out.print("*");
                } else {
                    // Các vị trí bên trong không thuộc viền thì in khoảng trắng
                    System.out.print(" ");
                }
            }

            // Xuống dòng sau khi in đủ 10 cột
            System.out.println();
        }
    }

    // ==============================================
    // Bài 5: Hình chữ nhật rỗng có hai đường chéo
    // ==============================================
    static void bai5() {
        System.out.println("Bai 5:");

        // Hình có 10 dòng
        for (int dong = 1; dong <= 10; dong++) {

            // Mỗi dòng có 10 cột
            for (int cot = 1; cot <= 10; cot++) {

                // In dấu * nếu vị trí hiện tại thuộc một trong các trường hợp:
                // 1. Viền trên: dong == 1
                // 2. Viền dưới: dong == 10
                // 3. Viền trái: cot == 1
                // 4. Viền phải: cot == 10
                // 5. Đường chéo xuôi: dong == cot
                // 6. Đường chéo ngược: dong + cot == 11
                //
                // Vì hình 10x10 nên đường chéo ngược có công thức:
                // dong + cot == 10 + 1 = 11
                if (
                    dong == 1 || dong == 10 ||
                    cot == 1 || cot == 10 ||
                    dong == cot ||
                    dong + cot == 11
                ) {
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
