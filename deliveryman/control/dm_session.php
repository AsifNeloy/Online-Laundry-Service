<?php
session_start();
if(isset($_SESSION["dmUser_name"])){
    echo "<h5>Profile Name :  ".$_SESSION["dmUser_name"]."</h5>";  
}

if(empty($_SESSION["dmUser_name"])){

    header("Location: ../View/dm_login.php");
}
?>