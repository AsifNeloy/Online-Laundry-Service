<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_SESSION["dmUser_name"]))
{
    header("Location: ../View/dm_dashboard.php");
}

$Error_f_name = "";
$Error_username = "";
$Error_email = "";
$Error_number = "";
$Error_date="";
$Error_pass = "";
$Error_pass_cmp = "";
$Error_gender = "";
$Error_nid = "";
$Error_dl = "";
$Error_exp = "";
$Error_nat = "";
$Error_gender = "";
$Error_file = "";
$hasError = 0;


if (isset($_REQUEST["submitRegdm"])) {
    $full_name = $_REQUEST['dmf_name'];
    $dm_username = $_REQUEST['dmu_name'];
    $dm_email = $_REQUEST['dmmail'];
    $dm_number = $_REQUEST["dmphn_number"];
    $dm_age=$_REQUEST['dmage'];
    $dm_password = $_REQUEST['dmpass'];
    $dm_confirm_password = $_REQUEST['dmconfirm_pass'];
    $dm_nat = $_REQUEST["dmnat_name"];//
    $dm_exp = $_REQUEST["dmexp_number"];//
    $dm_dl = $_REQUEST["dmdl_number"];
    $dm_nid = $_REQUEST["dmnid_number"];//
    //$dm_gender = $_REQUEST["gender"];

    if (empty($_REQUEST['dmf_name']) || strlen($_REQUEST['dmf_name']) < 3 || preg_match('~[0-9]+~', $_REQUEST['dmf_name'])) {
        $Error_f_name = "Please enter a valid name. numeric value is not allowed !";
        $hasError = 1;
    } else {
        $full_name = $_REQUEST['dmf_name'];
    }
    if (!preg_match("/^[a-zA-Z0-9]{3,}$/", $dm_username)) {
        $Error_username = "username allows only alphanumeric & longer than 2 chars !";
        $hasError = 1;
    } else {
        $dm_username = $_REQUEST['dmu_name'];
    }

    if (empty($dm_email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix" ,$dm_email)) {
        $Error_email = "Invalid email Address !";
        $hasError = 1;
    } else {
        $dm_email = $_REQUEST['dmmail'];
    }
    if (!preg_match("/^[0-9]{11}+$/", $dm_number)) {
        $Error_number = "Enter valid phone number !";
        $hasError = 1;
    } else {
        $dm_number = $_REQUEST["dmphn_number"];
    }
    if(empty($dm_age)){
        $Error_date="Please enter your date of birth";
        $hasError = 1;
    }
    else{
        $dm_age=$_REQUEST['dmage'];
    }

    
    $number    = preg_match('@[0-9]@', $dm_password);
   
    if ( !$number  || strlen($dm_password) < 8) {
        $Error_pass = 'Password should be at least 8 characters in length and should include at least one number!';
        $hasError = 1;
    } else {
        $dm_password = $_REQUEST['dmpass'];
    }
    if (empty($dm_confirm_password)) {
        $Error_pass_cmp = "Enter your confirm password";
        $hasError = 1;
    } else if ($dm_password != $dm_confirm_password) {
        $Error_pass_cmp = "Incorrect confirm password !";
        $hasError = 1;
    } else {
        $dm_confirm_password = $_REQUEST['dmconfirm_pass'];
    }
    if (isset($_POST["dmgender"])) {
        $dm_gender = $_POST["dmgender"];
    } else {
        $Error_gender = "Please select your gender !";
        $hasError = 1;
    }

    if (empty($_REQUEST['dmnid_number']) || strlen($_REQUEST['dmnid_number']) != 10 || preg_match('@[A-Z]@', $dm_nid) || preg_match('@[a-z]@', $dm_nid) ) {
        $Error_nid = "Please enter a valid NID number !";
        $hasError = 1;
    } else {
        $dm_nid = $_REQUEST['dmnid_number'];
    }

    if (empty($_REQUEST['dmnat_name']) || preg_match('~[0-9]+~', $_REQUEST['dmnat_name'])) {
        $Error_nat = "Please enter a valid nationality. numeric value is not allowed !";
        $hasError = 1;
    } else {
        $nat_name = $_REQUEST['dmnat_name'];
    }

    if (empty($_REQUEST['dmexp_number'])   ) {
        $Error_exp = "Please enter experience !";
        $hasError = 1;
    } else {
        $dm_exp = $_REQUEST['dmexp_number'];
    }

    if (empty($_REQUEST['dmdl_number']) || strlen($_REQUEST['dmdl_number']) != 15  ) {
        $Error_dl = "Please enter driving license, must be 15 numerical digits !";
        $hasError = 1;
    } else {
        $dl_exp = $_REQUEST['dmdl_number'];
    }
    if(move_uploaded_file($_FILES["dmmyfile"]["tmp_name"],"../upload/".$_FILES["dmmyfile"]["name"])){
        
    }
    else{
        $Error_file= "File not uploaded. File should be JPG";
        $hasError = 1;
    }

    if ($hasError == 0) {
        $dm_data = array(
            'Full_name' => $full_name,
            'User_name' => $dm_username,
            'Email' => $dm_email,
            'Phone_number' => $dm_number,
            'Age' => $dm_age,
            'Password' => $dm_password,
            'Confrim_password' => $dm_confirm_password,
            'Gender' => $dm_gender,
            'Nationality' => $dm_nat,
            'Experience' => $dm_exp,
            'Driving License' => $dm_dl,
            'NID' => $dm_nid
        );

        //json work
        $existing_Data = file_get_contents('../data/dm_data.json');
        $dm_JsonData = json_decode($existing_Data);

        $dm_JsonData[] = $dm_data;
        $jsondata = json_encode($dm_JsonData, JSON_PRETTY_PRINT);
        if (file_put_contents("../data/dm_data.json", $jsondata)) {

            echo "<br>Registration successful !";
            //header("Location: ../View/dm_login.php");

        }
    } else {
        echo "Registration failed !";
    }
}

?>