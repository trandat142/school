public static int sumNode(Node root) {
    if (root==null) return 0;
    return root.label + sumNode(root.left) + sumNode(root.right);
}
public static double averageNode(Node root) {
    if (root==null) return 0;
    int sum = sumNode(root);
    int count = countNode(root);
    return (double)sum/count;
}

static class SumCount{
    long sum;
    int count;
    SumCount(long sum, int count){
        this.sum = sum;
        this.count = count;
    }
    public static SumCount


}