<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE ORDER</h1>

<!-- Button to Add-->
<br /> <br />

<?php 
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

?>

<br> <br>
<table class="tbl-full">
    <tr>
        <th>S.No</th>
        <th>Fish</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Order_Date</th>
        <th>Status</th>
        <th>Customer Name</th>
        <th>Customer Contact</th>
        <th>Customer Email</th>
        <th>Customer Address</th>
        <th>Action</th>
    </tr>

    <?php

        $sql= "SELECT * FROM tbl_order ORDER BY id DESC"; //Display the last order first

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        $sn =1; 

        if($count>0)
        { 

            while($row =mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $fish = $row['fish'];
                $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $order_date = $row['order_date'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];

            ?>
                <tr>
                    <td><?php echo $sn++;?></td>
                    <td><?php echo $fish;?></td>
                    <td><?php echo $price;?></td>
                    <td><?php echo $qty;?></td>
                    <td><?php echo $total;?></td>
                    <td><?php echo $order_date;?></td>

                    <td>
                        <?php 
                                //Ordered, On Delivary, Delivared, Canceled
                                if($status == "Ordered")
                                {
                                    echo "<lable style='color: #1FADCB'>$status</lable>";
                                }
                                elseif($status == "On Delivary")
                                {
                                    echo "<lable style='color: orange'>$status</lable>";
                                }
                                elseif($status == "Delivared")
                                {
                                    echo "<lable style='color: #13E51B '>$status</lable>";
                                }
                                elseif($status == "Canceled")
                                {
                                    echo "<lable style='color: red'>$status</lable>";
                                }
                                

                        ?>
                    </td>

                    <td><?php echo $customer_name;?></td>
                    <td><?php echo $customer_contact;?></td>
                    <td><?php echo $customer_email;?></td>
                    <td><?php echo $customer_address;?></td>
                    <td>
                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class = "btn-secondary">Update Order</a>
            
                    </td>
                </tr>

            <?php
            }
        }
        else
        {
            echo "<tr><td colsan ='12' class='error'>Order not Available</tr></td>";
        }

    ?>
    
    
</table>
    </div>
    
</div>
<?php include('partials/footer.php'); ?>