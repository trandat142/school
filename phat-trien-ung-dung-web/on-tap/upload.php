<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="upload" value="Upload">
</form>

<?php
$dir="upload/";

if(!is_dir($dir))
    mkdir($dir);

if(isset($_POST['upload'])){
    $file=$_FILES['file'];

    if($file['error']==0){
        move_uploaded_file($file['tmp_name'],$dir.$file['name']);
        echo "Upload thanh cong";
    }
}

if(isset($_POST['delete'])){
    $file=$_POST['file'];

    if(file_exists($file))
        unlink($file);
}

$files=scandir($dir);

foreach($files as $f){
     $path=$dir.$f;
    if($f!="." && $f!=".."){
        echo $f." - ".round(filesize($dir.$f)/1024)." KB ";

        echo "<form method='post'>";
             
        echo "<a href='$path' download>Download</a>";
        echo "<input type='hidden' name='file' value='$dir$f'>";
        echo "<input type='submit' name='delete' value='Xoa'>";
        echo "</form>";
    }
}
?>

</body>
</html>