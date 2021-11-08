<?php include('partials-front/menu.php');?>


<!-- Title start-->
<section class="shop-page-1-background text-center">
    <div class="container">
            
        <h5>Ruvala Seafood</h5>

    </div>
</section>
<!-- Title  end-->

<!-- shops-1 Section Starts Here -->
<section class="shop-page-1">
    <div class="container">

    <?php
            //gatting shops to database
            $sql = "SELECT * FROM fish_items WHERE active ='Yes' AND featured='Yes' LIMIT 6";

            $res = mysqli_query($conn, $sql);

            $count =mysqli_num_rows($res);

            if($count>0)
            {
                //shops available
                while($row =mysqli_fetch_assoc($res))
                {
                    //get the value 
                    $id = $row['id'];
                    $title = $row['fish_title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name= $row['image_name'];
                    ?>
                    <div class="shop-page-1-box">
                        <div class="shop-page-1-img">

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
                                        <img src="<?php echo SITEURL;?>images/fishes/<?php echo $image_name; ?>"alt="Fish Items" class="img-res img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="shop-page-1-desc">
                            <h3><?php echo $title; ?></h3>
                            <p class="shop-page-1-food-price"><?php echo $price; ?></p>
                            <p class="shop-page-1-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>
                            <a href="order.html" class="btn btn-primary"> Order Now </a>
                        </div>
                    </div>
                    <?php
                }
            }
            else
            {
                //shops not available
                echo "<div class='error'>Fish Items not available</div>";

            }
    ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- shops Section End Here -->

<?php include('partials-front/footer.php') ?>