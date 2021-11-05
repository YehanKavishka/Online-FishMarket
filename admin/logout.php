<?php

include('../config/constants.php');
session_destroy();
//redirect to login page
header("location:".SITEURL.'admin/login.php');

?>