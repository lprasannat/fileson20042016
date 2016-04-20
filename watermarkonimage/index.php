<?php
require 'function/img-func.php';
if(isset($_FILES['image'])){
    $filename=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];allowedImage($filename);
    if(allowedImage($filename)==true){
        watremark_image($file_tmp,'');
    }
    else{
        echo "<p>Image not accepted</p>";
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    Choose an image:
    <input type="file" name="image">
    <input type="submit" value="watremark">
</form>