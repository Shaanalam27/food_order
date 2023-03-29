<?php
include('../config/connection.php');

session_destroy();

header("location:".'http://localhost/TY-PROJECT/admin/login.php');
?>