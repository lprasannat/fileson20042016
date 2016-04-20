<?php
include 'template.php';
$template=new Template();
$template->assign('username','lakshmi');
$template->assign('age',12);
$template->assign('favourite','sweets');
$template->render('mytemplate');
?>