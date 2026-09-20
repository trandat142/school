package tree;
public  class Main{
	public static Node insert (Node root, int label)
	{
		if(root==null){
			return  new Node(label);
		}
		if(label<root.label){
			root.left=insert(root.left, label);

		}else if(label>root.label){
			root.right=insert(root.right, label);
		}
		return root;
	}


	//1. Doc cay theo thu tu LNR

public static void readTreeLNR(Node root){
	if(root == null)
		return;
	readTreeLNR(root.left);
	System.out.print(root.label+ " ");
	readTreeLNR(root.right);
	}
	//2. Dem tong so node
public static int countNode(Node root){
	if(root==null) return 0;
	return  countNode(root.left)+ 1 +countNode(root.right);
	
}
	//3. dem so node la (khong co con tra va khong co con phai)
public static int countLeaf(Node root){
	if(root ==null) return  0;
	if(root.left==null && root.right == null) return 1;
	return countLeaf(root.left)+countLeaf(root.right);
}
	//4.Tim node trai nhat (label nho nhat) di theo nhanh trai
	public static Node theLeftNode(Node root){
		if(root==null) return null;
		if(root.left==null) return root;
		return theLeftNode(root.left);
	}
	//Tim node phai nhat = di theo nhanh phai
public static Node theRightNode(Node root){
	if(root==null) return  null;
	if(root.right==null)return root;
	return  theRightNode(root.right);
}
	//Ham phu: tinh tong label cua tat ca node
	public static int sumLabel(Node root){
		if(root==null)return 0;
		return sumLabel(root.left)+root.label+sumLabel(root.right);
	}
	//5a. Tinh trung binh label
	public static double averageLabel(Node root){
		int total=countNode(root);
		if(total == 0)return 0;
		return (double) sumLabel(root)/total;
	}
	//5b. Dem so node nho hon trung binh
	public static int countLessThanAverrage(Node root, double average){
		if (root==null) return 0;
		int soLuong=(root.label<average)?1:0;
		return soLuong + countLessThanAverrage(root.left, average) + countLessThanAverrage(root.right,average);

	}

	//5c. Dem so node lon hon trung binh
	public static int countGreaterThanAverage(Node root, double average){
		if(root==null) return 0;
		int soLuong=(root.label>average)?1:0;
		return soLuong+countGreaterThanAverage(root.left, average)+countGreaterThanAverage(root.right, average);

	}
	//6. Tim chieu cao cua cay
	public static int height(Node root){
		if (root==null)return 0;
		int caoTrai=height(root.left);
		int caoPhai=height(root.right);
		return Math.max(caoTrai, caoPhai)+1;

	}
	public static void main(String[] args){
		int[] data={7,5,12,3,6,9,15,1,4,8,10,13,17};
		Node root=null;
		for (int value:data){
			root = insert(root, value);

		}
		System.out.println("1. Duyet cay theo thu tu LNR:");
		readTreeLNR(root);
		System.out.println();

		System.out.println("2. Tong so node cua cay:" + countNode(root));
		System.out.println("3. So node la cua cay:" + countLeaf(root));

		System.out.println("4.Node ben trai nhat co label: "+theLeftNode(root).label);
		System.out.println("Node ben phai nhat co label: "+ theRightNode(root).label);

		double avg=averageLabel(root);
		System.out.println("5. Gia tri trung binh cac label: "+ avg);
		System.out.println("so node nho hon trung binh: " +countLessThanAverrage(root, avg));
		System.out.println("so node lon hon trung binh:"+countGreaterThanAverage(root, avg));

		System.out.println("6. chieu cao cua cay:" + height(root));
	}

}

