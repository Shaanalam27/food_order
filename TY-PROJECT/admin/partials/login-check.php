<?php 
if(!isset($_SESSION['user']))
{

    $_SESSION['no-login-message']="please login to access Admin";
    
    header("location:".'http://localhost/TY-PROJECT/admin/login.php');
}

?>