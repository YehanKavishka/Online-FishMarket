<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Fishes on Your Search <a href="#" class="text-white">"Momo"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="fish-menu">
        <div class="container">
            <h2 class="text-center">Fish Menu</h2>

            <?php 

            //get search keyword
            $search = $_POST['search'];

            $sql = "SELECT * FROM shop WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                <div class="fish-menu-box">
                         <div class="fish-menu-img">
                        <?php
                        if($image_name=="")
                        {
                            echo "<div class ='error'>Image not Available.</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/shops/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-res img-curve">
                            
                            <?php
                        }
                        ?>

                                </div>

                                <div class="fish-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="fish-price">$<?php echo $price; ?></p>
                                    <p class="fish-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                    
                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Food Not Found.</div>";
            }

            ?>


           

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php') ?>