<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}


include("dm_process.php");
$HasError=0;
$usernameError="";
$userPass_Error="";

$dm_data = file_get_contents('../data/dm_data.json');
$decoded_data = json_decode($dm_data);

if (isset($_POST["dmsubmit"])) {
    foreach ($decoded_data as  $key => $udata) {
        if ( $udata->User_name == $_POST["dmuname"]  && $udata->Password == $_POST["dmpassword"]) {

            $_SESSION["dmUser_name"] = $_POST["dmuname"];
            
            $_SESSION["dmPassword"] = $_POST["dmpassword"];
             if (!empty($_SESSION["dmUser_name"]))
             {
                header("Location: ../View/dm_dashboard.php");
             }
        }
        if(empty($_REQUEST["dmuname"])||(empty($_REQUEST["dmpassword"])))
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
