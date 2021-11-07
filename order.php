<?php include('partials-front/menu.php');?>

<?php

//check the foodid is set or not
    if(isset($_GET['fish_id']))
    {
        $fish_id = $_GET['fish_id'];

        $sql = "SELECT * FROM fish_items WHERE id=$fish_id";
        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $row =mysqli_fetch_assoc($res);

            $title = $row['fish_title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
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

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="order-background">
        <div class="container">
            
            <h6 class="text-center text-white">Fill this form to confirm your order.</h6>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Fish Items</legend>

                    <div class="food-menu-img">
                        <?php

                            //check the image awailable
                            if($image_name == "")
                            {
                                echo "<div class ='error'> Image not available.</div>";
                            }
                            else
                            {
                                ?>
                                     <img src="<?php echo SITEURL;?>Images/fishes/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-res img-curve">
                                <?php
                            }

                        ?>
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="fish" value="<?php echo $title;?>">

                        <p class="food-price"><?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Kamal Perera" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 077xxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. kamal@mail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

            if(isset($_POST['submit']))
            {
                //get all the details from the form
                $fish = $_POST['fish'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;// total = price * qty

                $order_date = date("Y-m-d h:i:sa"); //order date
                $status = "Ordered";//Ordered, on dilivary ,delivered, cancelled

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];


                //save the data in database using sql

                $sql2="INSERT INTO tbl_order SET 
                fish='$fish',
                price='$price',
                qty='$qty',
                total='$total',
                order_date='$order_date',
                status='$status',
                customer_name='$customer_name',
                customer_contact='$customer_contact',
                customer_email='$customer_email',
                customer_address='$customer_address'
                ";

                //echo $sql2; die();

                //execute quey
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    //order save
                    $_SESSION['order'] = "<div class='success text-center'>Fish Ordered Successfull</div>";
                    header('location:'.SITEURL.'shop.php');

                }
                else
                {
                    //order save not save
                    $_SESSION['order'] = "<div class='error text-center'>Failed to order </div>";
                    header('location:'.SITEURL.'shop.php');
                }

            }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php') ?>