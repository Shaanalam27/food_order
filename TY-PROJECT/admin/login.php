<?php include('../config/connection.php'); ?>
<html>
    <head>
        <title>Admin - Login</title>
        <link rel="stylesheet" href="../css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
    <div class="wrapper">
        <h1 class="text-center text-danger">Login</h1>
        <br>
        <?php
        if(isset($_SESSION['login']))
        {
          echo $_SESSION['login'];
          unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
          echo $_SESSION['no-login-message'];
          unset($_SESSION['no-login-message']);
        }
        
        ?>
        <form action="" method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username"  placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="LOGIN">
        </form>
    </div>
    </body>
</html>

<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql ="SELECT * FROM admin_tbl WHERE username='$username' AND password='$password'";

    $result = mysqli_query($con, $sql);

    $count = mysqli_num_rows($result);
    
    if($count==1)
    {
        $_SESSION['login']= "login succesfull";
        $_SESSION['user']= $username; //to check whether the user is logged in or not
        header("location:".'http://localhost/TY-PROJECT/admin/index.php'); 
    }
    else
    {
        $_SESSION['login']= "username or password is incorrect";
        header("location:".'http://localhost/TY-PROJECT/admin/login.php'); 
    }
}

 ?>