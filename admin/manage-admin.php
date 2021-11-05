
<?php include('partials/menu.php'); ?>

    <!--Main Content section start-->
    <div class="main-content">
    <div class ="wrapper">
           <h1> MANAGE ADMIN </h1>

           <br /> 

           <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];// Display session msg
                unset($_SESSION['add']);//remove session msg
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];// Display session msg
                unset($_SESSION['delete']);//remove session msg
            }
        ?>
        <br> <br>

           <!-- Button to Add-->
           <a href="add-admin.php" class="btn-primary">Add admin</a>

           <br /> <br />
           
           <table class="tbl-full">
               <tr>
                   <th>S.No</th>
                   <th>Full name</th>
                   <th>Username</th>
                   <th>Action</th>
               </tr>

               <?php
                    //query to get all admin
                    $sql = "SELECT * FROM admin";
                    //execute the query
                    $res = mysqli_query($conn,$sql);

                    $sn = 1; //create a variable and assing the value
                    //check whether the query is execute or not
                    if ($res==TRUE)
                    {
                        //count rows to check wether we have data in databse or not
                        $count = mysqli_num_rows($res);//to get all rows in database
                        //check the num of rows
                        if ($count>0)
                        {
                            //data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loopto get all data in database
                                //get indivdual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username = $rows['username'];

                                //display the value in our table
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="#" class = "btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-admin.php? id=<?php echo $id; ?>" class = "btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //database is emty
                        }
                    }
               ?>
           </table>
           
        </div>
        
    </div>
    <!--Main Content section end-->

<?php include('partials/footer.php'); ?>