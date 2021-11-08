<?php include('partials/menu.php'); ?>

<?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 ="SELECT * FROM fish_items WHERE id=$id";

        $res2 = mysqli_query($conn,$sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['fish_title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['shop_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else
    {
        header('location:'.SITEURL.'admin/manage-fish-items.php');
    }

?>

<div class = "main-content">
    <div class ="wrapper">
    
        <h1>Update Fish Items</h1>
        <br> <br>

        <form action="" method ="POST" enctype="multipart/form-data">
        
            <table class ="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value = <?php echo $title;?>>
                    </td>
                </tr>


                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows ="5"><?php echo $description;?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price : </td>
                    <td>
                        <input type="number" name="price"  value = <?php echo $price;?>>
                    </td>
                </tr>

                <tr>
                    <td>Current_Image: </td>
                    <td>
                        <?php
                            if($current_image == "")
                            {
                                echo "<div class='error'>Image notfound.</div>";
                            }
                            else
                            {
                                ?>
                                    <img src="<?php echo SITEURL;?>Images/fishes/<?php echo $current_image; ?>"width ="80p">
                                <?php

                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Select_New_Image: </td>
                    <td>
                        <input type="file" name ="image">
                    </td>
                </tr>

                <tr>
                    <td>Shop : </td>
                    <td>
                        <select name="category">
                            <option value="0">Text Category</option>

                            <?php
                                    $sql = "SELECT * FROM shop WHERE active='Yes'";

                                    $res = mysqli_query($conn, $sql);

                                    $count = mysqli_num_rows($res);

                                    if($count>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $category_id = $row['id'];
                                            $category_title = $row['title'];

                                            
                                            //echo "<option value = '$category_id'><$category_title></option>";
                                            ?>
                                                <option <?php if($current_category == $category_id){echo "selected";}?> value = "<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                            <?php


                                            
                                        }

                                    }
                                    else
                                    {
                                        echo "<option value = '0'>Shop Not Available</option>";
                                        
                                    }
                                ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured : </td>
                    <td>
                        <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value ="Yes"> Yes
                        <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value ="No"> No
                    </td>
                </tr>


                <tr>
                    <td>Active : </td>
                    <td>
                        <input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value ="Yes"> Yes
                        <input <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value ="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type = "submit" name="submit" value="Update Fish Item" class="btn-secondary">
                    </td>
                </tr>
            </table>
    </form>

    <?php

       if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if(isset($_FILES['image']['name']))
            {
                $image_name = $_FILES['image']['name'];

                if($image_name!="")
                {
                    $ext = end(explode('.',$image_name));

                    $image_name = "Fish-Name-".rand(0000,9999).'.'.$ext;

                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../Images/fishes/".$image_name;

                    $upload = move_uploaded_file($src_path,$dest_path);

                    if($upload == false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to Uploard new Image</div>";
                        header('location:'.SITEURL.'admin/manage-fish-items.php');
                        die();
                    }
                    if($current_image!= "")
                    {
                        $remove_path = "../Images/fishes".$current_image;

                        $remove = unlink($remove_path);

                        if($remove == false)
                        {
                            $_SESSION['remove-faile']= "<div class='error'>Failed to remove current image</div>";
                            header('location:'.SITEURL.'admin/manage-fish-items.php');
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
            }

            //Update the Fishitems
            $sql3 = "UPDATE fish_items SET
            fish_title = '$title',
            description = '$description',
            price = '$price',
            image_name = '$image_name',
            shop_id = '$category_id',
            featured = '$featured',
            active = '$active'
            WHERE id=$id
            ";

            $res3 =  mysqli_query($conn,$sql3);

            if($res3==true)
            {
                $_SESSION['update'] = "<div class='success'>Fish Item Updated Successfully.</div>";
                //header('location:'.SITEURL.'admin/manage-fish-items.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='error'>Failed to Updated.</div>";
                header('location:'.SITEURL.'admin/manage-fish-items.php');
            }
        }

    ?>
    </div>
</div>

<?php include('partials/footer.php');?>