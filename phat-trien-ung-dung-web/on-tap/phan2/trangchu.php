```php
<?php

session_start();

if(!isset($_SESSION['user'])){

    echo '<a href="dangnhap.php">Dang nhap</a>';

}
else{

    echo '<p>Xin chao ' . $_SESSION['user'] . '</p>';
    echo '<a href="dangxuat.php">Dang xuat</a>';

}

?>
