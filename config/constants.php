<?php
    //start session
    session_start();

    //create constant to store non repeting value
    define('SITEURL','http://localhost:8080/Online-FishMarket/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','fish_order');

    //database connection
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD)or die(mysqli_error());// database connections
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());// select database 

?>