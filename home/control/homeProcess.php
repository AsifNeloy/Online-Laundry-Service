<?php
    if (isset($_POST["submitSignIn"])) {
        header("Location: ../../customer/View/login.php");
    }
    if(isset($_POST["submitSignUp"])){
        header("Location: ../view/registrationRole.php");
    }
?>