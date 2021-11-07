<?php include('partials-front/menu.php');?>

<!--Search Section Start-->
<section class="search text-center">
    <div class="container">
        <form action="">
            <input type="search" name="search" placeholder="Search...">
            <input type="submit" name="submit" value="Search" class="button but-color">
        </form>
    </div>
</section>
<!--Search Section end-->

<!--Shop Section Start-->
<section class="shop">
    <div class="container">
        <h2 class="text-center">Shops</h2>

        <?php 
            //create Sql query to display shops
            $sql = "SELECT * FROM shop WHERE active ='Yes' AND featured='Yes' LIMIT 3";
            //execute query
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
                        <a href="">
                            <div Class="Box-1 float-container">
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
                                
                                <h3 class="float-text fount-color"><?php echo $title; ?></h3>
                            </div>
                        </a>
                    <?php

                }
            }
            else
            {
                //shops not available
                echo "<div class='error'>Shops not added</div>";
            }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!--Shop Section end-->

<!--Fish Categories Section Start-->
<section class="fish-categories">
    <div class="container">
        <h2 class="text-center">Fish Categories</h2>
       <a href="catagoriesFish.html">
        <div class="categories float-container">
            <img src="Images/Fish.png" alt="fish" class="img-res img-curve">
            <h4 class="categories-float-text categories-fount-color">FISH</h4>
        </div>
        </a>

        <a href="catagoriesCrab.html">
        <div class="categories float-container">
            <img src="Images/Crab.png" alt="crab" class="img-res img-curve">
            <h4 class="categories-float-text categories-fount-color">CRAB</h4>
        </div>
        </a>

        <a href="CatagoriesCuttlefish.html">
        <div class="categories float-container">
            <img src="Images/Cuttlefish.png" alt="cuttlefish" class="img-res img-curve">
            <h4 class="categories-float-text-cuttlefish categories-fount-color">CUTTLEFISH</h4>
        </div>
        </a>

        <a href="catagoriesPrawn.html">
        <div class="categories float-container">
            <img src="Images/Prawn.png" alt="prawn" class="img-res img-curve">
            <h4 class="categories-float-text categories-fount-color">PRAWN</h4>
        </div>
        </a>

        <div class="clearfix"></div>

    </div>
</section>
<!--Fish Categories Section end-->

<?php include('partials-front/footer.php') ?>