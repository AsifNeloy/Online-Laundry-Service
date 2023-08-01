<?php
include("../control/dm_session.php");
include("../control/dm_cookie.php");
?>
<html lang="en">
<center>
<head>
<input type="image" src="../image/img5.jpg" height="500" width="500" >
    <title>Delivery Man dashboard</title>
</head>
<body>
    <header>
            <h2 >Delivery Man In Charge</h2><hr>
    </header>
    <a href="dm_dashboard.php" id="dashboard"><h2>DASHBOARD</h2></a>
    <br>
    
        <a href="dm_profile.php" id="profile"><h2>PROFILE</h2></a>
        <br>
        
        <a href="dm_dashboard.php"><h2>ORDERS</h2></a>
        <br>
        
        <a href="dm_dashboard.php"><h2>PAYMENTS</h2></a>
        <br>
        
        
        <a href="dm_dashboard.php"><h2>CONTACT US</h2></a>
        <br>
        <hr>
        <a href="../control/dm_logout.php" id= "logout" name ="Logout"><h2>LOGOUT</h2></a>
        
            
           
</body>
</center>
</html>