<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$user_cookie=$_SESSION["User_name"];
$cookie_value='hello';
setcookie($user_cookie,$cookie_value, time()+36000);
if(!empty($user_cookie))
{
    if(isset($_COOKIE[$user_cookie])){
        echo "<h4> I have seen you before. </h4>";
    }
    else{
        echo "<h4>We have a new Friend</h4>";
    }
}else{
    echo "Session is empty !";
}


?>