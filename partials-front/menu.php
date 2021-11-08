<?php include ('config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Fish Market</title>
   
    <!--Link CSS file-->
    <link rel="stylesheet" href="css/styel.css">
</head>
<body>
<!--Navbar Section Start-->
<section class="nevbar">
    <div class="container">
        <div class="logo">
            <img src="Images/Onlin fish market-logo.jpeg" alt="Fish Market Logo" class="img-res">
        </div>
        <div class="menu text-right">
           <ul>
               <li>
                   <a href="<?php echo SITEURL; ?>">Home</a>
               </li>
                <li>
                    <a href="<?php echo SITEURL; ?>shop.php">Shops</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL; ?>about-us.html">About us</a>
                </li>
                <li>
                <a href="<?php echo SITEURL; ?>Contact.html">Contact</a>
            </li>
           </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<!--Navbar Section end-->