<?php
//include constents.php file here
include('../config/constants.php');

// get the ID of a admin to be delete
echo $id = $_GET['id'];

//create SQL query
$sql = "DELETE FROM admin WHERE id = $id";

//execute the query
$res = mysqli_query($conn, $sql);

//check whether the query exected successfully
if($res==TRUE)
{
    //echo "Admin Delete";
    $_SESSION['delete'] = "<div class = 'success'>Admin Delete Successfully. </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //echo "Fail to Delete Admin";
    $_SESSION['delete'] = "<div class = 'error'>Faile to Delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

//Massge 

?>