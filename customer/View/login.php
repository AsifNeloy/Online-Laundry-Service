<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include("../control/CustomerLogin_Control.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<h1>Login</h1><hr>
<pre><h4>                                                                                                                        GO BACK TO HOME PAGE<a href="../../home/view/home.php"> Click here</a></h4></pre>

<div align="center">
<form action="" method="POST">
    <br>
    <br>
    <br>
    <br>
    
<table>
<tr><td><b>Select User Role &nbsp; </td>
       <td><select name="role" id="role">
    <option value="customer">Customer</option>
    <option value="rider">Rider</option>
    <option value="laundry">Laundry</option>
    <option value="admin">Admin</option>
  </select></td>
  <tr></tr>
    <tr><td><br><b>Username</td> 
    <td><br><input type="text" name="uname" placeholder="Enter username or email"></td>
    <td> <?php
            echo $usernameError;
       ?>
       </td></tr>
       <tr><td><br><b>Password</td>
       <td><br><input type="password"name="password"></td>
       <td> <?php
            echo $userPass_Error;
       ?>
       </td></tr>
</table>
<br>
<input type="submit" name="submitlogin" value="Login">&nbsp;
<input type="Reset" name="Reset" value="Reset"><br>
<p>Don't Have an Account? <input type="submit" name="register" value="Register Now"> </p>
</form>
</div>
</body>
</html>