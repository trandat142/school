// ===============================
// CLASS CHA: Animal
// ===============================
class Animal {

    // Tên của con vật
    protected String ten;

    // Constructor
    // Khi tạo Animal hoặc class con, cần truyền tên vào
    public Animal(String ten) {
        this.ten = ten;
    }

    // Phương thức chung
    // Mỗi con vật sẽ có tiếng kêu khác nhau
    public void keu() {
        System.out.println("Dong vat dang keu...");
    }
}

// ===============================
// CLASS CON: Cho
// ===============================

// Cho kế thừa từ Animal
class Cho extends Animal {

    // Constructor của Cho
    public Cho(String ten) {

        // Gọi constructor của Animal
        super(ten);
    }

    // Ghi đè phương thức keu() của Animal
    @Override
    public void keu() {
        System.out.println(ten + " keu: Gau gau!");
    }
}

// ===============================
// CLASS CON: Meo
// ===============================

// Meo cũng kế thừa từ Animal
class Meo extends Animal {

    // Constructor của Meo
    public Meo(String ten) {

        // Gọi constructor của Animal
        super(ten);
    }

    // Ghi đè phương thức keu() của Animal
    @Override
    public void keu() {
        System.out.println(ten + " keu: Meo meo!");
    }
}

// ===============================
// CLASS DEMO
// ===============================
public class ViDuAnimal {

    public static void main(String[] args) {

        // Tạo một con chó
        Cho cho = new Cho("Milu");

        // Tạo một con mèo
        Meo meo = new Meo("Mimi");

        // Gọi phương thức keu()
        // Mỗi object sẽ chạy phiên bản keu() riêng
        cho.keu();
        meo.keu();
    }
}
