<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include("../control/dm_login_control.php");
?>
<html>
<center>
<head>

<input type="image" src="../image/img2.jpg" height="300" width="1500" >
    <title>Delivery</title>
</head>
<body>
    
    <br>
<h1>Delivery At Your Door!</h1><hr>

<form action="" method="POST">
    <br>
    
<table>
    
    <tr><td><b><h3>User Name : </h3></td> 
    <td><h3><input type="text" id="name" name="dmuname" placeholder="Enter username"></h3></td>
    <td> <?php
            echo $usernameError;
       ?>
       </td></tr>
       <tr><td><b><h3>Password : </h3></td>
       <td><h3><input type="password" id="password" name="dmpassword"></h3></td>
       <td> <?php
            echo $userPass_Error;
       ?>
       </td></tr>

</table>

<input type="submit" id="submit" name="dmsubmit" value="Login">
<input type="Reset" name="Reset" value="Reset"><br>
<p><h3><a href="dm_registration.php" id="register"><p>No Account? Register now!</h3></p></a>
</form>
<input type="image" src="../image/img9.jpg" height="180" width="1500"  >
</body>
</center>
</html>