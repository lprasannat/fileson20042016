<?php
error_reporting(E_STRICT);
function allowedImage($filename){
    $allowed_ext=array('jpg','jpeg','png','gif');
       $file_ext = end(explode('.', $filename));
  return(in_array($file_ext,$allowed_ext)==true)?true:false;
}
function watremark_image($file,$destination){
    $watermark=  imagecreatefrompng('images/watermark.png');
    $source=  getimagesize($file);
    
}
print_r($source);
?>