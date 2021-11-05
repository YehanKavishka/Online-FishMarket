<?php

    //check whether the user is loggrd or not
    if(!isset($_SESSION['user']))//if user session not set
    {
        //user is not login
        $_SESSION['no-login-message']="<div class ='error text-center'>Please login to Admin panel.</div>";
        header("location:".SITEURL.'admin/login.php');
    }
?>