<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE SHOPS</h1>

        <br /> <br />
    <?php
    
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['remove']))
    {
        echo $_SESSION['remove'];
        unset ($_SESSION['remove']);
    }

    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset ($_SESSION['delete']);
    }

    if(isset($_SESSION['no-shop-found']))
    {
        echo $_SESSION['no-shop-found'];
        unset ($_SESSION['no-shop-found']);
    }

    if (isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    if(isset($_SESSION['failed-remove']))
    {
        echo $_SESSION['failed-remove'];
        unset($_SESSION['failed-remove']);
    }
   

?>
<br><br>

<!-- Button to Add-->
<a href="<?php echo SITEURL;?>admin/add-shop.php" class="btn-primary">Add Shop</a>

<br /> <br />
<table class="tbl-full">
    <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
    <?php
    
    //Query to get all data from the database
    $sql = "SELECT * FROM shop";

    $res = mysqli_query($conn,$sql); //Execute

    $count = mysqli_num_rows($res); //count rows

    $sn = 1; //ID

    if($count>0) //Check for data in database
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $title =$row['title'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];

            ?>
             <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td>
                        <?php 
                            if($image_name!="")
                            {
                                ?>
                                <img src ="<?php echo SITEURL;?>Images/shops/<?php echo $image_name;?>" width="100px">
                                <?php

                            }
                            else
                            {
                                echo "<div class = 'error'> Image unavailable.</div>";
                            }
                         ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-shop.php?id=<?php echo $id; ?>" class = "btn-secondary">Update Shop</a>
                        <a href="<?php echo SITEURL;?>admin/delete-shop.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class = "btn-danger">Delete Shop</a>
                    </td>
            </tr>

            <?php
        }

    }
    else //When there is no data
    {
        ?>
        <tr>
            <td colspan ="6">
              <div class = "error ">No Shops added </div>
            </td>
        </tr>
        <?php
    }

    
    ?>
   
   
</table>
    </div>
    
</div>
<?php include('partials/footer.php'); ?>