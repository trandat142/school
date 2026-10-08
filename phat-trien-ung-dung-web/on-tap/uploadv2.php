<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <input type="submit" name="upload" value="upload">
</form>
<?php
if(isset($_POST['upload'])){
    $file=$_FILES['file'];

    if($file['error']>0)
        echo "Loi upload";
    elseif($file['size']>2*1024*1024)
        echo "File lon hon 2mb";
    else{
        $ten=pathinfo($file['name'],PATHINFO_FILENAME);
        $ext=strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $tenmmoi=$ten.rand(100,999).".".$ext;
        if(!is_dir("upload")) mkdir("upload");
        if(move_uploaded_file($file['tmp_name'],"upload/".$tenmmoi)){
            echo "upload thanh cong";
            if(in_array($ext,['jpg','jpeg','png','gif']))
                echo "<img src='upload/$tenmmoi' width='250'>";
        }
        
        
    }

}

?>