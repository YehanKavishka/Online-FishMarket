<?php
    include('../config/constants.php');

    if(isset($_GET['id'])&& isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        /*if($image_name != "")
        {
            $path ="../Images/fishes/".$image_name;

            $remove =unlink($path);

            if($remove==false)
            {

                $_SESSION['upload'] = "<div class = 'error'>Faile to Remove Image.</div>";
                header('location:'.SITEURL.'admin/delete-fish-items.php');
                die();
            }
        }*/


        $sql = "DELETE FROM fish_items WHERE id = $id";

        $res = mysqli_query($conn, $sql);

            if($res==true)
                {
                    //echo "Admin Delete";
                    $_SESSION['delete'] = "<div class = 'success'>Fish Item Delete Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-fish-items.php');
                }
                else
                {
                    //echo "Fail to Delete Admin";
                    $_SESSION['delete'] = "<div class = 'error'>Faile to Delete Fish Item.</div>";
                    header('location:'.SITEURL.'admin/manage-fish-items.php');
                }

    }
    else
    {
        //echo "redirect";
        $_SESSION['unauthorized'] = "<div class = 'error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-fish-items.php');
    }

    

?>