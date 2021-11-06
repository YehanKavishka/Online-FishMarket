<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Shop</h1>

        <br></br>
    <?php
    
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
    
    ?>

    <br></br>


        <!-- Add Shop form starts-->
        <form action="" method="POST" enctype ="multipart/form-data">

                <table class ="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type = "text" name="title" placeholder="Store Title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active :</td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan ="2">
                            <input type="submit" name="submit" value="Add Shop" class="btn-secondary">
                        </td>
                    </tr>

                </table>

        <!-- Add Shop form ends-->

        <?php
            
            //Check if the submit button has been clicked

            if(isset($_POST['submit']))
            {
                //Getting the value from form
                $title = $_POST['title'];

                //Checking if a radio button has been selected
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured']; //Getting the value 
                }
                else
                {
                    $featured = "No"; //Default value
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; //Default value
                }

                //Check if an image has been selected
                //print_r($_FILES['image']);
                //die(); //Break the code

                if(isset($_FILES['image']['name']))
                {
                    //Image uploaded
                    $image_name = $_FILES['image']['name'];

                    
                    //Auto rename image
                    $ext = end(explode('.', $image_name));  
                    
                    $image_name ="fishShop_".rand(000, 999).'.'.$ext;
                    
                    $source_path =$_FILES['image']['tmp_name'];

                    $destination_path="../images/shops/".$image_name;

                    $upload = move_uploaded_file($source_path,$destination_path); //Upload image

                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class = 'error'> Failed to upload image. </div>";

                        header('location:'.SITEURL.'admin/add-shop.php');

                        //Stop process
                        die();
                    }
                
                }
                else
                {
                    //Image upload failed
                    $image_name = "";
                }

                //SQL query

               $sql = " INSERT INTO shop SET

               title = '$title',
               image_name= '$image_name',
               featured = '$featured',
               active = '$active'
               ";

                //Executing the query
                $res = mysqli_query($conn,$sql);

                //Checking the execution
                if($res==true)
                {
                    $_SESSION['add'] = "<div class = 'success'>Shop added successfully.</div>"; //Success

                    header('location:'.SITEURL.'admin/manage-shop.php'); //Redirecting

                }

                else
                {
                    
                    $_SESSION['add'] = "<div class = 'error'>Failed to add Shop .</div>"; //Faliure

                    header('location:'.SITEURL.'admin/add-shop.php'); //Redirecting

                }


            }


        ?>


    </div>
</div>




<?php include('partials/footer.php'); ?>