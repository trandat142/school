class Animal {
    protected String ten;

    public Animal(String ten) {
        this.ten = ten;
    }

    public void keu() {
        System.out.println("Dong vat dang keu...");
    }
}

class Cho extends Animal {
    public Cho(String ten) {
        super(ten);
    }

    @Override
    public void keu() {
        System.out.println(ten + " keu: Gau gau!");
    }
}

class Meo extends Animal {
    public Meo(String ten) {
        super(ten);
    }

    @Override
    public void keu() {
        System.out.println(ten + " keu: Meo meo!");
    }
}

public class ViDuAnimal {
    public static void main(String[] args) {
        Cho cho = new Cho("Milu");
        Meo meo = new Meo("Mimi");

        cho.keu();
        meo.keu();
    }
}
