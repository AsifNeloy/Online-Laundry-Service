<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include("process.php");
$HasError=0;
$usernameError="";
$userPass_Error="";
$customer_data = file_get_contents('../data/data.json');
$decoded_data = json_decode($customer_data);

if (isset($_POST["submitlogin"])) {
    foreach ($decoded_data as  $key => $udata) {
        if (($udata->User_name == $_POST["uname"] || $udata->Email==$_POST["uname"]) && $udata->Password == $_POST["password"]) {

            $_SESSION["User_name"] = $_POST["uname"];
            $_SESSION["email"]=$_POST["mail"];
            $_SESSION["Password"] = $_POST["password"];
             if (!empty($_SESSION["User_name"]))
             {
                header("Location: ../View/customer_dashboard.php");
             }
        }
        if(empty($_REQUEST["uname"])||(empty($_REQUEST['password'])))
            {
                $usernameError= "Enter your user name and password !";
            }
            else{

                $hasError=1;
            }   
        }
    if($hasError==1){
        $userPass_Error= "Your username or password is incorrect !";
    }
}
?>