<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE FISH ITEMS</h1>

        <br /> <br />

<!-- Button to Add-->
<a href="<?php echo SITEURL; ?>admin/add-fish.php" class="btn-primary">Add Fish Items</a>

<br /> <br />

<?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset ($_SESSION['delete']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }

        if(isset($_SESSION['unauthorized']))
        {
            echo $_SESSION['unauthorized'];
            unset ($_SESSION['unauthorized']);
        }
?>



<table class="tbl-full">
    <tr>
        <th>S.No</th>
        <th>Fish Title</th>
        <th>Price Rs.</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
    <?php

        $sql = "SELECT * FROM fish_items";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        $sn = 1;

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['fish_title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                        
                            <tr>
                                <td><?php echo $sn++;?>.</td>
                                <td><?php echo $title;?></td>
                                <td>Rs.<?php echo $price;?></td>
                                <td>
                                    <?php 
                                        if ($image_name=="")
                                        {
                                            echo "<div class='error'>Image not added.</div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src ="<?php echo SITEURL;?>images/fishes/<?php echo $image_name;?>"width="50p">
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                <td>
                                    <a href="#" class = "btn-secondary">Update Items</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-fish-items.php?id=<?php echo $id; ?>&image_name=id=<?php echo $image_name; ?>" class = "btn-danger">Delete Items</a>
                                </td>
                            </tr>

                        

                        <?php
                    }
                }
                else
                {
                    echo "<tr><td colspan = '7' class = 'error'>Food not add yet. </td></tr>";
                }
    ?>
    
    
</table>
    </div>
    
</div>
<?php include('partials/footer.php'); ?>