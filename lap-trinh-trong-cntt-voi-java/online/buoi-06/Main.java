import java.util.Scanner;

public class Main {

    public static Node addNode(Node root, int value) {
        if (root == null) {
            root = new Node(value);
            return root;
        }
        if (value < root.label) {
            if (root.left == null) {
                root.left = new Node(value);
            } else {
                root.left = addNode(root.left, value);
            }
        } else {
            if (root.right == null) {
                root.right = new Node(value);
            } else {
                root.right = addNode(root.right, value);
            }
        }
        return root;
    }

    public static void readtree(Node root) {
        if (root != null) {
            readtree(root.left);
            System.out.print(root.label + " ");
            readtree(root.right);
        }
    }
    public static void findNode(Node root, int value) {
        if (root == null) {
            System.out.println("Khong tim thay");
            return;
        }
        if (root.label == value) {
            System.out.println("Tim thay: " + root.label);
            return;
        }
        if (value < root.label) {
            findNode(root.left, value);
        } else {
            findNode(root.right, value);
        }
    }
    public static Node deleteNode(Node root, int value){
        if(root == null){
            return null;
        }
        if(root.label==value){
            if(root.left==null) return root.right;
            if(root.right==null) return root.left;
            Node T= theLeftNode(root.right);
            Node L=root.left;
            Node R=deleteNode(root.right, T.label);
            T.left=L;
            T.right=R;
            return T;            
        }
        if(value<root.label){
            root.left=deleteNode(root.left, value);
        }else{
            root.right=deleteNode(root.right, value);
        }
        return root;
    }
    public static Node theLeftNode(Node root){
        if(root==null) return null;
        while(root.left!=null){
            root=root.left;
        }
        return root;
    }
    public static void main(String[] args) {
        // TODO Auto-generated method stub
        Node root = null;
        root = addNode(root, 50);
        root = addNode(root, 40);
        root = addNode(root, 60);
        root = addNode(root, 70);
        root = addNode(root, 55);
        root = addNode(root, 45);
        root = addNode(root, 65);

        System.out.print("Readtree root: ");
        readtree(root);
        System.out.println();

        Scanner scanner = new Scanner(System.in);
        System.out.print("Nhap gia tri can tim: ");
        int value = scanner.nextInt();
        findNode(root, value);

        System.out.print("Nhap gia tri can xoa: ");
        int deleteValue = scanner.nextInt();
        root = deleteNode(root, deleteValue);

        System.out.print("Readtree root sau khi xoa: ");
        readtree(root);
        System.out.println();

        scanner.close();
    }
}
