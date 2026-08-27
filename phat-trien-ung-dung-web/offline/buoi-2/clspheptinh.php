<?php
// Tạo class tên là pheptinh để chứa các hàm tính toán
class pheptinh
{
    // Hàm cộng: nhận vào 2 số $a và $b, trả về tổng của 2 số
    public function phepcong($a, $b)
    {
        return $a + $b;
    }

    // Hàm trừ: nhận vào 2 số $a và $b, trả về hiệu của 2 số
    public function pheptru($a, $b)
    {
        return $a - $b;
    }

    // Hàm nhân: nhận vào 2 số $a và $b, trả về tích của 2 số
    public function phepnhan($a, $b)
    {
        return $a * $b;
    }

    // Hàm chia: nhận vào 2 số $a và $b, trả về thương của 2 số
    public function phepchia($a, $b)
    {
        // Kiểm tra nếu số chia bằng 0 thì không thực hiện phép chia
        if ($b == 0) {
            return "Không thể chia cho 0";
        }

        // Nếu số chia khác 0 thì trả về kết quả phép chia
        return $a / $b;
    }
}
?>
