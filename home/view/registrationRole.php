<?php

    include("../control/registrationRoleProcess.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Role</title>
</head>

<body>
<form action="" method="POST">
    <center>
        <br>
        <h1>CHOOSE THE ROLE YOU WANT TO GET REGISTERED IN </h1><hr>
        <br><br>
        
        <input type="submit" name="c_role" value="Customer"> &nbsp;&nbsp;
        <input type="submit" name="r_role" value="Rider">  &nbsp;&nbsp;
        <input type="submit" name="l_role" value="Laundry">  &nbsp;&nbsp;
        <input type="submit" name="a_role" value="Admin"> &nbsp;&nbsp;
        
    </center>
</form>
</body>

</html>