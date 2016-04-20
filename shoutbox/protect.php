<?php
function protect($value){
    $value=  mysqli_real_escape_string($value);
    $value=  htmlentities($value,ENT_QUOTES);
    $value=trim($value);
    return $value;
}
?>