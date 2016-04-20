<?php
session_start();

$allowedlanguage=array('english','german');
if(isset($_GET['lang'])==true && in_array($_GET['lang'],$allowedlanguage)==true){
    $_SESSION['lang']=$_GET['lang'];

}
else if(isset($_SESSION['lang'])===false){
    
    $_SESSION['lang']='english';
}
include('lang/'.$_SESSION['lang'].'.php');

?>