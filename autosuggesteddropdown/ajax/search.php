<?php
require_once '../core/connect.php';
if(isset($_POST['searchitem'])==true && empty($_POST['searchitem'])==false){
    $searchitem=  mysqli_real_escape_string($link,$_POST['searchitem']);
    $query="SELECT city FROM  structure WHERE city LIKE '$searchitem%'";
    $result=mysqli_query($link,$query);
    while(($row=mysqli_fetch_assoc($result))!=false){
        echo "<li>",$row['city']."</li>";
    }
    
}
?>