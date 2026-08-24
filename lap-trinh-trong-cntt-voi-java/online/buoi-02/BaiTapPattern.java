public class BaiTapPattern {
    public static void main(String[] args) {
        bai1();
        System.out.println();

        bai2();
        System.out.println();

        bai4();
        System.out.println();

        bai5();
    }

    // Bài 1: in tam giác tăng dần
    static void bai1() {
        System.out.println("Bai 1:");

        for (int dong = 1; dong <= 10; dong++) {
            for (int cot = 1; cot <= dong; cot++) {
                System.out.print("*");
            }
            System.out.println();
        }
    }

    // Bài 2: in tam giác có khoảng trắng phía trước
    static void bai2() {
        System.out.println("Bai 2:");

        for (int dong = 1; dong <= 10; dong++) {
            for (int space = 1; space <= dong - 1; space++) {
                System.out.print(" ");
            }

            for (int sao = 1; sao <= 10 - dong + 1; sao++) {
                System.out.print("*");
            }

            System.out.println();
        }
    }

    // Bài 4: in hình chữ nhật rỗng 10x10
    static void bai4() {
        System.out.println("Bai 4:");

        for (int dong = 1; dong <= 10; dong++) {
            for (int cot = 1; cot <= 10; cot++) {
                if (dong == 1 || dong == 10 || cot == 1 || cot == 10) {
                    System.out.print("*");
                } else {
                    System.out.print(" ");
                }
            }
            System.out.println();
        }
    }

    // Bài 5: hình chữ nhật rỗng có 2 đường chéo
    static void bai5() {
        System.out.println("Bai 5:");

        for (int dong = 1; dong <= 10; dong++) {
            for (int cot = 1; cot <= 10; cot++) {
                if (
                    dong == 1 || dong == 10 ||
                    cot == 1 || cot == 10 ||
                    dong == cot ||
                    dong + cot == 11
                ) {
                    System.out.print("*");
                } else {
                    System.out.print(" ");
                }
            }
            System.out.println();
        }
    }
}
