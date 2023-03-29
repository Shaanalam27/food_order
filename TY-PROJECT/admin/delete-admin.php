<?php 
include('../config/connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM admin_tbl WHERE id=$id";

$result = mysqli_query($con, $sql);

if($result==TRUE)
{
    $_SESSION['delete'] = "<div class='text-danger'> Admin deleted successfully</div>";
    
    header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');   
}
else
{
    $_SESSION['delete'] = "failed to delete Admin..";
    
    header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php'); 
}

?>