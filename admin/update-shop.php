<?php include('partials/menu.php'); ?>

<div class = 'main-content'>
    <div class ="wrapper">
    
    <h1>Update Shop</h1>

    <br><br>

            <?php

                if(isset($_GET['id']))
                {
                        $id =$_GET['id'];

                        //SQL Query
                        $sql = "SELECT * FROM shop WHERE id = $id";

                        $res = mysqli_query($conn,$sql);

                        $count = mysqli_num_rows($res);
                        

                        if($count == 1)
                        {
                            $row = mysqli_fetch_assoc($res);
                            $title = $row['title'];
                            $current_iamge = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                        }
                        else
                        {

                            $_SESSION['no-shop-found'] = "<div class = 'error> Shop not found </div>";
                            header('location:'.SITEURL.'admin/manage-shop.php');

                        }




                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-shop.php');
                }



            ?>





    <form action="" method ="POST" enctype="multipart/form-data">
        <table>
            <table class ="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php

                        if($current_iamge != "")
                        {
                            ?>
                            <img src=" <?php echo SITEURL; ?>images/shops/<?php echo $current_iamge; ?>" width = 200px>
                            <?php
                        }
                        else
                        {
                            echo "<div class = 'error'> Image not added </div>";
                        }



                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured==" No"){echo "checked";}?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($featured==" No"){echo "checked";}?>type="radio" name="active" value="No"> No
                    </td>
                </tr>


                <tr>

                    <td>
                        <input type="hidden" name="current_image" value ="<?php echo $current_image;?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Shop" class="btn-secondary">
                    </td>
                    
                </tr>


        </table>
    </form>

        <?php

            if(isset($_POST['submit']))    
            {
                //Reading values from the form
                $id = $_POST['id'];
                $title = $_POST['title'];
               /* $current_image = $_POST['current_image']; */
                $featured = $_POST['featured'];
                $active = $_POST['active'];


                //Uploading a new image
                //Checking if image has been selected
              /*  if(isset($_FILES['image']['name'])) //comment start
                {
                   $image_name = $_FILES['image']['name']; //Get image details
                   
                   if($image_name != "")
                   {
                    //Upload new image
                    $ext = end(explode('.', $image_name));  
                    
                    $image_name ="fishShop_".rand(000, 999).'.'.$ext;
                    
                    $source_path =$_FILES['image']['tmp_name'];

                    $destination_path="../Images/shops/".$image_name; 

                    $upload = move_uploaded_file($source_path,$destination_path); //Upload image

                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class = 'error'> Failed to upload image. </div>";

                        header('location:'.SITEURL.'admin/manage-shop.php');

                        //Stop process
                        die();
                    }

                    //Remove current image
                    if(current_image != "")
                    {
                        $remove_path = "../images/shops/".$current_image;

                        $remove = unlink($remove_path);
    
                        if($remove == false)
                        {
                            //Failed to remove image
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image</div>";
                            header('location:' .SITEURL.'admin/manage-shop.php');
                            die();
    
                        }
                    }
                   
                   



                   }
                   else
                   {
                    $image_name = $current_image;
                   }
                   
                }
                else
                {
                    $image_name = $current_image;
                } */ 

                //Updating database
                $sql2 = "UPDATE shop SET
                
                    title = '$title',
                    /*image_name = '$image_name',*/ 
                    featured= '$featured',
                    active = '$active'
                    WHERE id = $id
                    ";

                    //Execute query
                    $res2 = mysqli_query($conn,$sql2);

                    //redirection
                    if($res2 == true)
                    {
                        $_SESSION['update'] = "<div class = 'success'>Shop information updated successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-shop.php');
                    }
                    else
                    {
                        $_SESSION['error'] = "<div class = 'success'>Shop failed to update.</div>";
                        header('location:'.SITEURL.'admin/manage-shop.php');
                    }


            }           



        ?>


    
  </div>

</div>


<?php include('partials/footer.php');?>