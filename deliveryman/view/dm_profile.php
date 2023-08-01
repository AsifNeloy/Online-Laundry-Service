<?php
session_start();
$uname = $_SESSION["dmUser_name"];
?>

<html lang="en">
    <center>
<head>
    
    <title>Profile</title>
</head>
<body>
    <h1>Delivery Man Profile</h1><hr><br>
    <h3>Name : <?php echo $uname ?></h3>
    <input type="image" src="../image/img13.jpg"  > 
</body>
</center>
</html>