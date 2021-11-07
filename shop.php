<?php include('partials-front/menu.php');?>

<!-- Title start-->
<section class="search text-center">
    <div class="container">
            
        <h5>Shops</h5>

    </div>
</section>
<!-- Title  end-->

<!-- shops Section Starts Here -->
<section class="shop-page text-center">
    <div class="container">
        <?php
            //gatting shops to database
            $sql = "SELECT * FROM shop WHERE active ='Yes' AND featured='Yes' LIMIT 6";

            $res = mysqli_query($conn, $sql);

            $count =mysqli_num_rows($res);

            if($count>0)
            {
                //shops available
                while($row =mysqli_fetch_assoc($res))
                {
                    //get the value 
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name= $row['image_name'];
                    ?>

                    <div class="shop-page-box">
                        <div class="shop-page-img">
                            <?php
                            //check the image is available or not
                                if($image_name =="")
                                {
                                    //display message
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    ?>
                                        <img src="<?php echo SITEURL;?>images/shops/<?php echo $image_name; ?>"alt="Shop_1" class="img-res img-curve">
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="shop-page-desc">
                            <h3><?php echo $title; ?></h3>
                            <p class="shop-detail">
                                Made with Italian Sauce, Chicken, and organice vegetables.
                            </p>
                            <br>

                            <a href="Shop_1.html" class="btn btn-primary">View Shop</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //shops not available
                echo "<div class='error'>Shops not available</div>";
            }

        ?>

        


        <div class="clearfix"></div>
    </div>
</section>
<!-- shops Section End Here -->

<?php include('partials-front/footer.php') ?>