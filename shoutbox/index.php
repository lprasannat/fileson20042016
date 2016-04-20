<?php
session_start();
require 'connect.php';
require 'protect.php';
$_SESSION['uid']=1;
if(isset($_POST['submit'])){
    $shout=protect($_POST[shout]);
    if(strlen($shout)>255){
        echo "your shot must be 255 characters long";
    }else if($shout!=''){
        
    }if(isset($_POST['name'])){
        $name=protect($_POST['name']);
        $query=mysqli_query("SELECT username FROM customers WHERE username='$name'");
        if(mysqli_num_rows($query)>0){
            echo "that username already exists";
        }else if($name!=''){
            if(strlen($name)>32){
                echo "your name can't be greater than 32";
            }else{
                mysqli_query("INSERT INTO shout SET 
                       'user_id'=0,
                       'date_posted=NOW(),
                       'message'='$shout',
                        'name'='$name'");
            }
        }
    }else{
         mysqli_query("INSERT INTO shout SET 
                       'user_id'={$_SESSION['uid']},
                       'date_posted=NOW(),
                       'message'='$shout'");
           
        
    }
}

?>
<html>
    <head>
        <title>shout box</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body>
        <div id="shoutbox">
            
        </div>
        <p>Give a shout ur self!</p>
        <form meathod="post" action="index.php">
            <?php
            if(!isset($_SESSION['uid'])) :?>
            <div>
                <label for="name">Name</label>
                <input  type="text"name="name">
            </div>
            <?php endif;?>
            <div>
                <label for="shout">Shout</label>
                <input type="text" name="">
            </div>
            <input type="submit" name="submit" value="Shout">
        </form>
    </body>
</html>