<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE ADMIN</h1>
        
            <br><br>
            
            <?php 
                //get the ID of select admin
                $id = $_GET['id'];

                $sql ="SELECT *FROM admin WHERE id =$id";

                $res = mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);

                    if($count == 1)
                    {
                        //echo "Admin Available";
                        $row = mysqli_fetch_assoc($res);
                        $full_name =$row['full_name'];
                        $username = $row['username'];
                    }
                    else
                    {
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                   
                }
            ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                        <td> Full Name :</td>
                        <td><input type="text" name="full_name" value ="<?php echo $full_name;?>"></td>
                </tr>
                <tr>
                        <td>User Name :</td>
                        <td><input type="text" name="username" value ="<?php echo $username;?>"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name ="id" value = "<?php echo $id?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
                
            </table>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        //echo "Buttom click";
        //get all value 
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //SQL query
        $sql = "UPDATE admin SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

        $res = mysqli_query($conn,$sql);
        if($res==true) {

            //query Executed and Admin Updated 
            $_SESSION['update'] ="<div class='success'>Admin Updated Successfully.</div>"; 
            //Redirect to Manage Admin Page 
            header('location:'.SITEURL. "admin/manage-admin.php");
        }
        else
        {
            
            //Failed to Update Admin
            
            $_SESSION['update'] ="<div class='error'>Failed to Delete Admin.</div>"; 
            //Redirect to Manage Admin Page
            header("location: ".SITEURL."admin/manage-admin.php");
        }
    }

?>

<?php include('partials/footer.php'); ?>