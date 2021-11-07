<?php include('partials-front/menu.php');?>

<?php

//check the foodid is set or not
    if(isset($_GET['Shop_id']))
    {
        $Shop_id = $_GET['Shop_id'];

        $sql2 = "SELECT * FROM shop WHERE id=$Shop_id";
        $res2 = mysqli_query($conn,$sql2);

        $count2 = mysqli_num_rows($res2);

        if($count2==1)
        {
            $row2 =mysqli_fetch_assoc($res2);

            $S_title = $row2['title'];
            
        }
        else
        {
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location:'.SITEURL);
    }

?>
<!-- Title start-->
<section class="shop-page-1-background text-center">
    <div class="container">
            
        <h5><?php echo $S_title; ?></h5>

    </div>
</section>
<!-- Title  end-->


<!-- shops-1 Section Starts Here -->
<section class="shop-page-1">
    <div class="container">

    <?php
            //gatting shops to database
            $sql = "SELECT * FROM fish_items WHERE active ='Yes' AND featured='Yes' AND shop_id = $Shop_id LIMIT 6";

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
                            <a href="<?php echo SITEURL; ?>order.php? fish_id=<?php echo $id ?>" class="btn btn-primary"> Order Now </a>
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