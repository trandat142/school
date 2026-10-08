<?php 

session_start();
if(!isset($_POST["sbdangky"])){
    header("location: dangky.php");
    exit();
}

//lay ten trong ngoac = thuoc tinh name cua o input
$email=$_POST["email"];
$password=$_POST["email"];
$repassword=$_POST["email"];
$hoten=$_POST["email"];
$dienthoai=$_POST["email"];
$quequan=$_POST["email"];
$gioitinh= $_POST["gioitinh"];

//mat khau nhap lai ko khop thi bao loi
if($password!=$repassword){
    echo "Mat khau ko khop";
    exit();
}
$sothich=array();
if(isset($_POST["sothich"])){
    $sothich=$_POST["sothich"];
}

$duongdan ="";
$ext=strtolower(pathinfo($_FILES["anhdaidien"]["name"],PATHINFO_EXTENSION));
if (in_array($ext,array("gif","png", "jpg"))){
    if(!is_dir("upload")){
        mkdir("upload");
    }
    $duongdan="upload/".time().".".$ext;
    move_uploaded_file($_FILES["anhdaidien"]["tmp_name"],$duongdan);
}
$_SESSION["thongtin_dangky"]=array(
    "email" =>$email,
    "password" => $password,
    "hoten"=>$hoten,
    "quenquan"=>$hquenquanten,
    "dienthoai"=>$dienthoai,
    "gioitinh"=>$gioitinh,
    "sothich"=>$sothich,
    "anh"=>$duongdan
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Thong tin vua dang ky
    Email: <?php echo $email; ?>
     Ho ten: <?php echo $email; ?>
      Que quan: <?php echo $email; ?>
       Dien thoai: <?php echo $email; ?>
        Gioi tinh: <?php echo $email; ?>
        So thich: <?php 
        foreach($sothich as $st){
            echo $st. ";";
        }
        ?>
    Anh dai dien:
    <?php
        if($duongdan!=""){
            echo "<img src='".$duongdan."'>";
        }
        else{
            echo "file up len ko phai hinh anh";        }
    ?>
    <a href="dangnhap.php">Dang nhap ngay!</a>
</body>
</html>