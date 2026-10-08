<p>Dang nhap</p>
<p> <?php echo $loi;?> </p>
<form id="form1" name="form1" method="post">
  <p>Email 
    <input name="email" type="email" required="required" id="email">
  </p>
  <p>Mat khau
    <input name="password" type="password" required="required" id="password">
  </p>
  <p>
    <input type="checkbox" name="checkbox" id="checkbox">
    <label for="checkbox">luu dang nhap </label>
  </p>
  <p>
    <input type="submit" name="sbdangnhap" id="sbdangnhap" value="Dang nhap">
  </p>
</form>
<p>&nbsp;</p>
<?php
session_start();

if(isset($_SESSION["user"])){
    header("location:trangchu.php");
    exit();
}
$loi="";
$email_cookie="";
if(isset($_COOKIE["saved_email"])){
    $email_cookie=$_COOKIE["saved_email"];
}
if(isset($_POST["sbdangnhap"])){
    $email=$_POST["email"];
    $password=$_POST["password"];

    if(isset($_SESSION["thongtin_dangky"])){
        $tk=$_SESSION["thongtin_dangky"];
        if($email== $tk["email"] && $password=$tk["password"]){
            $_SESSION["user"]=$email;
            
            if(isset($_POST["chknho"])){
                setcookie("saved_email",$email,time()+3600*24*10,"/");

            }
            else{
                setcookie("saved_email", "", time()-36000, "/");
            }
            header("location:trangchu.php");
            exit();
        }
    }
    $loi = " Email mat khau khong chinh xac";
}



?>