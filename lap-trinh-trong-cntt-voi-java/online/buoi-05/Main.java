package tree;

public class Main {
	public static void readtree(Node root) {
		if (root!=null) {
			readtree(root.right);
			readtree(root.left);
			System.out.print(root.label+" ");
		}
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Node n7 = new Node(7);
		Node n5 = new Node(5);
		Node n12 = new Node(12);
		Node n3 = new Node(3);
		Node n6 = new Node(6);
		Node n9 = new Node(9);
		Node n15 = new Node(15);
		Node n1 = new Node(1);
		Node n4 = new Node(4);
		Node n8 = new Node(8);
		Node n10 = new Node(10);
		Node n13 = new Node(13);
		Node n17 = new Node(17);
		n3.left = n1; n3.right = n4;
		n9.left = n8; n9.right = n10;
		n15.left = n13; n15.right = n17;
		n5.left = n3; n5.right = n6;
		n12.left = n9; n12.right = n15;
		n7.left = n5; n7.right = n12;
		Node root = n7;
		System.out.println("Doc cay root theo thu tu RLN: ");
		readtree(root);
		
	}

}

