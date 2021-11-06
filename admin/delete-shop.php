<?php
    //Include constants
    include('../config/constants.php');
    

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
       $id = $_GET['id'];
       $image_name = $_GET['image_name'];

       //Remove image file
       if($image_name != "")
       {
            $path="../images/shops/".$image_name;
            $remove = unlink($path); //remove image

            if(remove==false) //error message if failed to remove
            {
                $_SESSION['remove'] = "<div class = 'error'> Failed to delete shop image </div>";

                header('location:'.SITEURL.'admin/manage-shop.php');

                die();

            }
       
        }

            //Delete data from database
            $sql = "DELETE FROM shop WHERE id = $id"; //SQL query to delete data

            $res == mysqli_query($conn,$sql); //execute query

            if($res == false) 
            {
                //Success
                $_SESSION['delete'] = "<div class = 'success'>Shop deleted successfully</div>";
                header('location:'.SITEURL.'admin/manage-shop.php');
            }
            else
            {
                //Failiure
                $_SESSION['delete'] = "<div class = 'error'> Failed to Delete</div>"; 
                header('location:'.SITEURL.'admin/manage-shop.php');
            }


       

    }

    else
    {
        header('location:'.SITEURL.'admin/manage-shop.php');
    }

?>