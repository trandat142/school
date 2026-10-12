package customermanager_thi;

public class Customer {
    Customer left;
    Customer right;

    private final int customer_ID;
    private final String customer_Name;
    private final String customer_Gender;
    private final int customer_Age;

    public Customer(int customer_ID, String customer_Name, String customer_Gender, int customer_Age) {
        this.customer_ID = customer_ID;
        this.customer_Name = customer_Name;
        this.customer_Gender = customer_Gender;
        this.customer_Age = customer_Age;
    }

    public int getCustomer_ID() {
        return customer_ID;
    }

    public String getCustomer_Name() {
        return customer_Name;
    }

    public String getCustomer_Gender() {
        return customer_Gender;
    }

    public int getCustomer_Age() {
        return customer_Age;
    }

    @Override
    public String toString() {
        return "Customer [ID=" + customer_ID
                + ", Name=" + customer_Name
                + ", Gender=" + customer_Gender
                + ", Age=" + customer_Age + "]";
    }
}
