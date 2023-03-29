<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        $id = $_GET['id'];

        $sql = "SELECT * FROM admin_tbl WHERE id=$id";
        
        $result = mysqli_query($con, $sql);

        if($result==TRUE)
        {
            $count = mysqli_num_rows($result);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($result);

                $full_name = $row['full_name'];
                $username = $row['username'];
            }
            else
            {
                header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
            }
        }
        ?>
        <form action="" method="POST">

<div class="mb-3">
    <label class="form-label">Full Name</label>
    <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
</div>
<div class="mb-3">
    <label  class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" class="btn btn-primary" name="submit" value="Update Admin">
</form>
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE admin_tbl SET
    full_name = '$full_name',
    username = '$username'
    WHERE id = '$id' ";

    $result = mysqli_query($con, $sql);
    
    if($result==TRUE)
    {
        $_SESSION['update']= "Admin updated succesfully";
        header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update']= "failed to delete admin";
        header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
    }
}
?>



<?php include('partials/footer.php') ?>