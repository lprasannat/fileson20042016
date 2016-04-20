<?php
error_reporting(E_STRICT);
if(isset($_FILES['image'])){
    $errors=array();
    $allowedextension=array('jpg','jpeg','png','gif');
    $FileName=$_FILES['image']['name'];
    $FileExtension=strtolower(end(explode('.',$FileName)));
    $FileSize=$_FILES['image']['size'];
    $File_tmp=$_FILES['image']['tmp_name'];
    if(in_array($FileExtension,$allowedextension)==false){
        
        $errors[]="extension not allowed";
    }
    if($FileSize>209152){
        $errors[]="file size must be under 2mb";
    }
    if(empty($errors)){
        if(move_uploaded_file($File_tmp, 'images/'.$FileName)){
            echo "file uploaded";
        }
        
    }else{
        foreach($errors as $error){
            echo $error."<br>";
        }
    }
    //print_r($errors);
}


?>
<form action="" method="POST" enctype="multipart/form-data">
    <p>
        <input type="file" name="image">
        <input type="submit" value="Upload">
    </p>
</form>