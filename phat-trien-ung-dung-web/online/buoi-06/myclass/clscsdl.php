<?php
// Khai báo lớp đối tượng csdl để quản lý toàn bộ thao tác kết nối và truy vấn CSDL
class csdl
{
    /**
     * Hàm kết nối đến cơ sở dữ liệu MySQL
     * Trả về biến kết nối ($con) nếu thành công
     */
    public function connect()
    {
        // Kết nối MySQL: tham số lần lượt là (máy_chủ, tên_đăng_nhập, mật_khẩu)
        $con = mysql_connect("localhost", "root", "");

        // Nếu kết nối thất bại thì báo lỗi và dừng chương trình
        if (!$con) {
            echo 'Không kết nối được csdl';
            exit();
        } else {
            // Chọn database cần làm việc
            mysql_select_db("dhcntt21avl_db", $con);

            // Thiết lập bảng mã UTF-8 để hiển thị tiếng Việt
            mysql_query("SET NAMES UTF8");

            // Trả về biến kết nối để các hàm khác dùng lại
            return $con;
        }
    }

    /**
     * Hàm xuất danh sách sinh viên ra bảng HTML
     * @param string $sql Câu truy vấn SQL (VD: SELECT * FROM sinhvien)
     */
    public function xuatbangsinhvien($sql)
    {
        // Gọi hàm connect() để lấy kết nối CSDL
        $link = $this->connect();

        // Gửi câu truy vấn SQL lên MySQL, kết quả lưu vào $ketqua
        $ketqua = mysql_query($sql, $link);

        // Đếm số dòng dữ liệu trả về
        $i = mysql_num_rows($ketqua);

        // Nếu có dữ liệu thì in bảng HTML
        if ($i > 0) {
            // In dòng tiêu đề bảng
            echo '<table width="1000" border="1" align="center" cellpadding="3" cellspacing="0">
            <tr>
                <td align="center" valign="middle"><strong>STT</strong></td>
                <td align="center" valign="middle"><strong>MASV</strong></td>
                <td align="center" valign="middle"><strong>HỌ ĐỆM</strong></td>
                <td align="center" valign="middle"><strong>TÊN</strong></td>
                <td align="center" valign="middle"><strong>LỚP</strong></td>
            </tr>';

            // Biến đếm số thứ tự, bắt đầu từ 1
            $dem = 1;

            // Duyệt từng dòng dữ liệu: mỗi vòng lặp lấy 1 dòng gán vào mảng $row
            while ($row = mysql_fetch_array($ketqua)) {
                // Lấy giá trị từng cột theo tên cột trong database
                $id = $row['id'];
                $masv = $row['masv'];
                $hodem = $row['hodem'];
                $ten = $row['ten'];
                $lop = $row['lop'];

                // In 1 dòng dữ liệu sinh viên trong bảng
                echo '<tr>
                    <td align="center" valign="middle">' . $dem . '</td>
                    <td align="center" valign="middle">' . $masv . '</td>
                    <td align="center" valign="middle">' . $hodem . '</td>
                    <td align="center" valign="middle">' . $ten . '</td>
                    <td align="center" valign="middle">' . $lop . '</td>
                </tr>';

                // Tăng STT lên 1
                $dem++;
            }

            // Đóng bảng
            echo '</table>';
        } else {
            echo 'Không có dữ liệu.';
        }

        // Đóng kết nối CSDL để giải phóng bộ nhớ
        mysql_close($link);
    }

    /**
     * Hàm xuất danh sách sinh viên vào combobox (thẻ <select>)
     * @param string $sql Câu truy vấn SQL
     */
    public function xuatcomboboxsv($sql)
    {
        // Lấy kết nối CSDL
        $link = $this->connect();

        // Thực thi truy vấn
        $ketqua = mysql_query($sql, $link);

        // Đếm số dòng kết quả
        $i = mysql_num_rows($ketqua);

        if ($i > 0) {
            // Mở thẻ <select> dropdown
            echo '<select name="select" id="select">';

            // Tùy chọn mặc định
            echo '<option value="0">Mời chọn</option>';

            // Duyệt từng sinh viên
            while ($row = mysql_fetch_array($ketqua)) {
                $id = $row['id'];
                $masv = $row['masv'];
                $hodem = $row['hodem'];
                $ten = $row['ten'];

                // Nối chuỗi hiển thị: "MaSV - Họ đệm - Tên"
                $xuat = $masv . ' - ' . $hodem . ' - ' . $ten;

                // In thẻ <option>: value gửi về server là id, nội dung hiển thị là $xuat
                echo '<option value="' . $id . '">' . $xuat . '</option>';
            }

            // Đóng thẻ </select>
            echo '</select>';
        } else {
            echo 'Không có dữ liệu.';
        }

        // Đóng kết nối
        mysql_close($link);
    }

    /**
     * Hàm thực thi câu lệnh Thêm / Xóa / Sửa (INSERT, DELETE, UPDATE)
     * @param string $sql Câu lệnh SQL
     * @return int Trả về 1 = thành công, 0 = thất bại
     */
    public function themxoasua($sql)
    {
        // Lấy kết nối CSDL
        $link = $this->connect();

        // Thực thi câu lệnh SQL (INSERT / UPDATE / DELETE)
        $ketqua = mysql_query($sql, $link);

        // Kiểm tra kết quả và trả về 1 (thành công) hoặc 0 (thất bại)
        if ($ketqua) {
            mysql_close($link);
            return 1;
        } else {
            mysql_close($link);
            return 0;
        }
    }
}
?>
