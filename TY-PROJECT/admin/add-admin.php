<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" placeholder="enter your full name">
        </div>
        <div class="mb-3">
            <label  class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="enter your username">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="enter your password">
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Add Admin">
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php

// getting the data from form
if(isset($_POST['submit']))
{
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = md5($_POST['password']);
 
// saving the data in the database
$sql = "INSERT INTO admin_tbl SET 
        full_name = '$full_name',
        username = '$username',
        password = '$password'
";

$result = mysqli_query($con, $sql) or die(mysqli_error());

if($result==TRUE)
{
    $_SESSION['add']= "<div class='text-success'>new admin added successfully.</div>";
    header("location:".'http://localhost/TY-PROJECT/admin/manage-admin.php');
}
else{
    $_SESSION['add']="failed to add Admin";
    header("location:".'http://localhost/TY-PROJECT/admin/add-admin.php');
}
}

?>