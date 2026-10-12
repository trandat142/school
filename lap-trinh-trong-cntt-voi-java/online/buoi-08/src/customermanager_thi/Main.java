package customermanager_thi;

import java.util.Scanner;

public class Main {
    public static Customer addCustomer(Customer root, Customer customer) {
        if (root == null) {
            return customer;
        }

        if (customer.getCustomer_ID() < root.getCustomer_ID()) {
            root.left = addCustomer(root.left, customer);
        } else if (customer.getCustomer_ID() > root.getCustomer_ID()) {
            root.right = addCustomer(root.right, customer);
        }
        return root;
    }

    public static void readTree(Customer root) {
        if (root == null) {
            return;
        }

        readTree(root.left);
        System.out.printf(
                "%-10d%-25s%-10s%-10d%n",
                root.getCustomer_ID(),
                root.getCustomer_Name(),
                root.getCustomer_Gender(),
                root.getCustomer_Age());
        readTree(root.right);
    }

    public static Customer findCustomer(Customer root, int id) {
        if (root == null || root.getCustomer_ID() == id) {
            return root;
        }
        if (id < root.getCustomer_ID()) {
            return findCustomer(root.left, id);
        }
        return findCustomer(root.right, id);
    }

    public static Customer deleteCustomer(Customer root, int id) {
        if (root == null) {
            return null;
        }

        if (id < root.getCustomer_ID()) {
            root.left = deleteCustomer(root.left, id);
        } else if (id > root.getCustomer_ID()) {
            root.right = deleteCustomer(root.right, id);
        } else {
            if (root.left == null) {
                return root.right;
            }
            if (root.right == null) {
                return root.left;
            }

            Customer successor = theLeftCustomer(root.right);
            successor.right = deleteCustomer(root.right, successor.getCustomer_ID());
            successor.left = root.left;
            return successor;
        }
        return root;
    }

    public static Customer theLeftCustomer(Customer root) {
        if (root == null || root.left == null) {
            return root;
        }
        return theLeftCustomer(root.left);
    }

    private static void printCustomers(Customer root) {
        System.out.printf("%-10s%-25s%-10s%-10s%n", "ID", "Name", "Gender", "Age");
        readTree(root);
    }

    public static void main(String[] args) {
        Customer[] customers = {
                new Customer(107, "An", "Nam", 30),
                new Customer(101, "Hoa", "Nữ", 20),
                new Customer(105, "Khanh", "Nam", 35),
                new Customer(103, "Mai", "Nữ", 39),
                new Customer(109, "Huy", "Nam", 27),
                new Customer(102, "Bình", "Nam", 25),
                new Customer(104, "Thuận", "Nam", 29)
        };

        Customer root = null;
        for (Customer customer : customers) {
            root = addCustomer(root, customer);
        }

        System.out.println("Danh sách khách hàng theo ID:");
        printCustomers(root);

        try (Scanner scanner = new Scanner(System.in)) {
            System.out.print("Nhập ID cần tìm: ");
            int id = scanner.nextInt();
            Customer customer = findCustomer(root, id);
            if (customer != null) {
                System.out.println("Tìm thấy khách hàng có ID là: " + id);
                System.out.println(customer);
            } else {
                System.out.println("Không tìm thấy khách hàng có ID: " + id);
            }

            System.out.print("Nhập ID khách hàng cần xóa: ");
            id = scanner.nextInt();
            root = deleteCustomer(root, id);

            System.out.println("Danh sách khách hàng sau khi xóa ID: " + id);
            printCustomers(root);
        }
    }
}
