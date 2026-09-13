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
        // mysql_connect(máy_chủ, tên_đăng_nhập, mật_khẩu): kết nối tới máy chủ MySQL
        // localhost: máy chủ cục bộ; root: tài khoản mặc định; rỗng "": không có mật khẩu
        $con = mysql_connect("localhost", "root", "");

        // Kiểm tra nếu kết nối thất bại (! là toán tử phủ định NOT)
        if (!$con) {
            echo 'Không kết nối được csdl';
            exit(); // Dừng toàn bộ chương trình ngay lập tức, không chạy tiếp bên dưới
        } else {
            // mysql_select_db(tên_csdl, biến_kết_nối): chọn database cần làm việc
            mysql_select_db("csdl_sinhvien", $con);

            // mysql_query("SET NAMES UTF8"): thiết lập bảng mã tiếng Việt có dấu chuẩn UTF-8
            mysql_query("SET NAMES UTF8");

            // Trả về đối tượng kết nối $con để các hàm khác tái sử dụng
            return $con;
        }
    }

    /**
     * Hàm xuất danh sách sinh viên dưới dạng bảng HTML
     * @param string $sql Câu lệnh truy vấn SQL (ví dụ: SELECT * FROM sinhvien)
     */
    public function xuatbangsinhvien($sql)
    {
        // Gọi hàm connect() trong cùng class bằng $this-> để lấy biến kết nối CSDL
        $link = $this->connect();

        // mysql_query($sql, $link): thực thi câu lệnh truy vấn SQL gửi lên server MySQL
        $ketqua = mysql_query($sql, $link);

        // mysql_num_rows($ketqua): đếm số dòng dữ liệu trả về từ kết quả truy vấn
        $i = mysql_num_rows($ketqua);

        // Kiểm tra nếu có ít nhất 1 dòng dữ liệu ($i > 0) thì mới in bảng HTML
        if ($i > 0) {
            // In thẻ mở <table> và dòng tiêu đề chứa tên các cột
            echo '<table width="1000" border="1" align="center" cellpadding="3" cellspacing="0">
            <tr>
                <td align="center" valign="middle"><strong>STT</strong></td>
                <td align="center" valign="middle"><strong>MASV</strong></td>
                <td align="center" valign="middle"><strong>HỌ ĐỆM</strong></td>
                <td align="center" valign="middle"><strong>TÊN</strong></td>
                <td align="center" valign="middle"><strong>LỚP</strong></td>
            </tr>';

            // Biến $dem dùng làm Số Thứ Tự (STT), khởi tạo giá trị ban đầu là 1
            $dem = 1;

            // Vòng lặp while kết hợp mysql_fetch_array():
            // - Mỗi vòng lặp, hàm lấy ra một dòng dữ liệu và gán vào mảng kết hợp $row
            // - Khi đã duyệt hết các dòng, hàm trả về false và vòng lặp tự động dừng lại
            while ($row = mysql_fetch_array($ketqua)) {
                // Lấy giá trị từng trường (cột) trong bảng theo đúng tên cột trong database
                $id = $row['id'];         // Khóa chính (ID)
                $masv = $row['masv'];     // Mã sinh viên (ví dụ: SV01)
                $hodem = $row['hodem'];   // Họ và chữ đệm (ví dụ: Nguyễn Văn)
                $ten = $row['ten'];       // Tên sinh viên (ví dụ: An)
                $lop = $row['lop'];       // Tên lớp (ví dụ: 12DHTH)

                // In từng dòng thẻ <tr> chứa dữ liệu của 1 sinh viên (dùng dấu chấm . để nối chuỗi)
                echo '<tr>
                    <td align="center" valign="middle">' . $dem . '</td>
                    <td align="center" valign="middle">' . $masv . '</td>
                    <td align="center" valign="middle">' . $hodem . '</td>
                    <td align="center" valign="middle">' . $ten . '</td>
                    <td align="center" valign="middle">' . $lop . '</td>
                </tr>';

                // Tăng biến đếm STT lên 1 đơn vị cho dòng kế tiếp
                $dem++;
            }

            // In thẻ đóng </table> sau khi vòng lặp duyệt xong tất cả các dòng
            echo '</table>';
        } else {
            // Trường hợp câu truy vấn trả về 0 dòng (bảng rỗng hoặc không khớp điều kiện)
            echo 'Không có dữ liệu.';
        }

        // mysql_close($link): đóng kết nối CSDL sau khi hoàn thành để giải phóng bộ nhớ
        mysql_close($link);
    }

    /**
     * Hàm xuất danh sách sinh viên vào thẻ chọn combobox (select)
     * @param string $sql Câu lệnh truy vấn SQL
     */
    public function xuatcomboboxsv($sql)
    {
        // Lấy kết nối cơ sở dữ liệu
        $link = $this->connect();

        // Thực thi câu truy vấn
        $ketqua = mysql_query($sql, $link);

        // Đếm số dòng dữ liệu trả về
        $i = mysql_num_rows($ketqua);

        // Nếu có dữ liệu thì in ra thẻ <select>
        if ($i > 0) {
            // In thẻ mở <select> của dropdown combobox
            echo '<select name="select" id="select">';

            // In tùy chọn mặc định đầu tiên để nhắc người dùng
            echo '<option value="0">Mời chọn</option>';

            // Duyệt từng dòng dữ liệu sinh viên trong kết quả
            while ($row = mysql_fetch_array($ketqua)) {
                $id = $row['id'];
                $masv = $row['masv'];
                $hodem = $row['hodem'];
                $ten = $row['ten'];

                // Nối chuỗi Mã - Họ đệm - Tên để hiển thị trực quan cho người dùng đọc
                $xuat = $masv . ' - ' . $hodem . ' - ' . $ten;

                // Thẻ <option>:
                // - value="'.$id.'": giá trị id gửi về server khi form được submit
                // - '.$xuat.': nội dung hiển thị trong danh sách chọn
                echo '<option value="' . $id . '">' . $xuat . '</option>';
            }

            // In thẻ đóng </select>
            echo '</select>';
        } else {
            echo 'Không có dữ liệu.';
        }

        // Đóng kết nối CSDL
        mysql_close($link);
    }
}
?>
