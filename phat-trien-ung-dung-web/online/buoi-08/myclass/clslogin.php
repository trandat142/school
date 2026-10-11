<?php
class login
{
    private function connect()
    {
        $con = mysql_connect('localhost', 'dhcntt21avl', '123456');
        if (!$con) {
            echo 'Không kết nối được csdl.';
            exit();
        } else {
            mysql_select_db('dhcntt21avl_db');
            mysql_query("SET NAMES UTF8");
            return $con;
        }
    }

    public function bammatkhau($pass)
    {
        $salt = '1@Fd';
        return md5($pass . $salt);
    }

    public function mylogin($user, $pass)
    {
        $link = $this->connect();
        $pass = $this->bammatkhau($pass);
        $sql = "select id, masv, password, phanquyen from sinhvien where masv='$user' and password='$pass' limit 1";
        $ketqua = mysql_query($sql, $link);
        $i = mysql_num_rows($ketqua);
        if ($i == 1) {
            while ($row = mysql_fetch_array($ketqua)) {
                $id = $row['id'];
                $masv = $row['masv'];
                $password = $row['password'];
                $phanquyen = $row['phanquyen'];
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['user'] = $masv;
                $_SESSION['pass'] = $password;
                $_SESSION['phanquyen'] = $phanquyen;
                header('location:themxoasuasv.php');
            }
        } else {
            return 0;
        }
        mysql_close($link);
    }

    public function confirmlogin($id, $user, $pass, $phanquyen)
    {
        $link = $this->connect();
        $sql = "select id from sinhvien where id='' and masv='' and password='' and phanquyen=''";
    }
}
