<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class ="wrapper">
        <h1>ADD ADMIN</h1>

        <br /> <br />

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);//remove session msg
            }
        ?>
        <br>

        <form action="" method ="POST">
            <table class="tbl-30">
                <tr>
                        <td> Full Name</td>
                        <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </tr>
            </table>
        </form>
    </div>
</div>
 <!--Main Content section end-->

 <?php include('partials/footer.php'); ?>

 <?php
    //process the value from form and save it in Database
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Button click
        //get data from fome
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption with md5
        
        //sql query to save data into database
        $sql="INSERT INTO admin SET 
        full_name = '$full_name', 
        username = '$username', 
        password='$password'
        ";
        
        //execute query and save data in database
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //check whether the (query is ececuted) data is inserted or not a and display msg
        if($res==TRUE)
        {
            //Data inserted
            //echo "Data inserted";
            //create a session variable todisplay mas
            $_SESSION['add']= "Data Added Successfully";
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Fail to insert data
            //echo "NOT Data inserted";
            $_SESSION['add']= "Failed Data to Added";
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }

    }
    
 ?>