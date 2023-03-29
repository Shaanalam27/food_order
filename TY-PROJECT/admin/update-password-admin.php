<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <br><br>
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id']; 
        }
        ?>

        <form action="" method="POST">
       
        <div class="mb-3">
            <label class="form-label">Old Password</label>
            <input type="password" class="form-control" name="old_password" placeholder="enter your old password">
        </div>
        <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password" placeholder="enter your new password">
        </div>
        <div class="mb-3">
            <label class="form-label">confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="re-enter your password">
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" class="btn btn-primary" name="submit" value="change password">
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql= "SELECT * FROM admin_tbl WHERE id=$id and password='$old_password'";

    $result = mysqli_query($con, $sql);

    if($result==TRUE)
    {

        $count = mysqli_num_rows($result);

        if($count==1)
        {
            if($new_password==$confirm_password)
            {
                $sql2 = "UPDATE admin_tbl SET password = '$new_password'";
                $result2 = mysqli_query($con, $sql2);

                if(result2==TRUE)
                {
                    $_SESSION['pass-matched'] = "password changed successfully";
                    header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
                }
                else
                {
                    $_SESSION['pass-matched'] = "failed to change the password";
                    header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
                }
            }
            else
            {
                $_SESSION['pass-not-matched'] = "password not matched";
            header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
            }
        }
        else
        {
            $_SESSION['user-not-found'] = "id or password not correct";
            header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
        }
    }

}

?>

<?php include('partials/footer.php') ?>