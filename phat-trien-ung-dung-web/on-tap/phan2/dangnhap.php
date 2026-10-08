<?php
session_start();
if (isset($_POST['user'])){
        
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $pass=$_POST['passowrd'];
        if($email=="admin@gmail.com" && $pass=="123456" ){
            $_SESSION['user']=$email;
            if(isset($_POST['remember'])){
                setcookie("email",$email,time()+30*24*3600);
            }
            else{
                setcookie("email","",time()-36000);
            }
            header("location:trangchu.php");
            exit();
        }
     }
        echo "sai email hoac mat khau";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        email
        <input
        type="email"
        name="email"
        value="<?php echo $_COOKIE['email'] ?? ''; ?>"
        >

        password:
        <input
        type="password"
        name= "password"
        >
        Nho email
        <input
        type="checkbox"
        name="remember"
        >

    </form>
</body>
</html>