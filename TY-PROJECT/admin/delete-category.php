<?php
include('../config/connection.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    if($image_name != "")
    {
        $path = "../images/category/".$image_name;

        $remove = unlink($path);

        if($remove==false)
        {
            $_SESSION['remove']="failed to remove the image";

            header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');

            die();
        }
    }

    $sql = "DELETE FROM category_tbl WHERE id=$id";

    $res= mysqli_query($con, $sql);
    
    if($res==TRUE)
    {
        $_SESSION['delete']="category deleted successfully";
        header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');

    }
    else
    {

        $_SESSION['delete']="category not deleted";
        header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');
    }
}

else
{
    header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');
}

?>