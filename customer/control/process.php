<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_SESSION["User_name"]))
{
    header("Location: ../View/customer_dashboard.php");
}
if(isset($_POST["register"])){
    header("Location: ../../home/view/registrationRole.php");
}

$Error_f_name = "";
$Error_username = "";
$Error_email = "";
$Error_number = "";
$Error_date="";
$Error_pass = "";
$Error_pass_cmp = "";
$Error_gender = "";
$customer_gender = "";
$hasError = 0;

//customer Registration php validation
if (isset($_REQUEST["submitReg"])) {
    $full_name = $_REQUEST['f_name'];
    $customer_username = $_REQUEST['u_name'];
    $customer_email = $_REQUEST['mail'];
    $customer_number = $_REQUEST["phn_number"];
    $customer_age=$_REQUEST['age'];
    $customer_password = $_REQUEST['pass'];
    $Customer_confirm_password = $_REQUEST['confirm_pass'];

    if (empty($_REQUEST['f_name']) || strlen($_REQUEST['f_name']) < 4 || preg_match('~[0-9]+~', $_REQUEST['f_name'])) {
        $Error_f_name = "Please enter a valid name. numeric value is not allowed !";
        $hasError = 1;
    } else {
        $full_name = $_REQUEST['f_name'];
    }
    if (!preg_match("/^[a-zA-Z0-9]{3,}$/", $customer_username)) {
        $Error_username = "username allows only alphanumeric & longer than 2 chars !";
        $hasError = 1;
    } else {
        $customer_username = $_REQUEST['u_name'];
    }

    if (empty($customer_email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix" ,$customer_email)) {
        $Error_email = "Invalid email Address !";
        $hasError = 1;
    } else {
        $customer_email = $_REQUEST['mail'];
    }
    if (!preg_match("/^[0-9]{11}+$/", $customer_number)) {
        $Error_number = "Enter valid phone number !";
        $hasError = 1;
    } else {
        $customer_number = $_REQUEST["phn_number"];
    }
    if(empty($customer_age)){
        $Error_date="Please enter your date of birth";
        $hasError = 1;
    }
    else{
        $customer_age=$_REQUEST['age'];
    }

    $uppercase = preg_match('@[A-Z]@', $customer_password);
    $lowercase = preg_match('@[a-z]@', $customer_password);
    $number    = preg_match('@[0-9]@', $customer_password);
    $specialChars = preg_match('@[^\w]@', $customer_password);
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($customer_password) < 8) {
        $Error_pass = 'Password should be at least 8 characters in length and should include at least one upper & lower case letter, one number, and one special character!';
        $hasError = 1;
    } else {
        $customer_password = $_REQUEST['pass'];
    }
    if (empty($Customer_confirm_password)) {
        $Error_pass_cmp = "Enter your confirm password";
        $hasError = 1;
    } else if ($customer_password != $Customer_confirm_password) {
        $Error_pass_cmp = "Incorrect confirm password !";
        $hasError = 1;
    } else {
        $Customer_confirm_password = $_REQUEST['confirm_pass'];
    }
    if (isset($_POST["gender"])) {
        $customer_gender = $_POST["gender"];
    } else {
        $Error_gender = "Please select your gender !";
        $hasError = 1;
    }

    if ($hasError == 0) {
        $customer_data = array(
            'Full_name' => $full_name,
            'User_name' => $customer_username,
            'Email' => $customer_email,
            'Phone_number' => $customer_number,
            'Age' => $customer_age,
            'Password' => $customer_password,
            'Confrim_password' => $Customer_confirm_password,
            'Gender' => $customer_gender
        );

        //json work
        $existing_Data = file_get_contents('../data/data.json');
        $customer_JsonData = json_decode($existing_Data);

        $customer_JsonData[] = $customer_data;
        $jsondata = json_encode($customer_JsonData, JSON_PRETTY_PRINT);
        if (file_put_contents("../data/data.json", $jsondata)) {

            echo "<br>Registration successful !";
        }
    } else {
        echo "Registration failed !";
    }
}
// else
// {
//     header("Location: ../View/login.php");
// }
?>