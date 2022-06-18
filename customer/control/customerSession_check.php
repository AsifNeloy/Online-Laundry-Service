<?php
session_start();
if(isset($_SESSION["User_name"])){
    echo "<h5>Welcome Back ".$_SESSION["User_name"]."</h5>";  
}

if(empty($_SESSION["User_name"])){

    header("Location: ../View/login.php");
}
?>