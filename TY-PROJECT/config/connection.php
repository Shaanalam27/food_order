<?php

// creating session
session_start();
// creating connection and selecting database

$con = mysqli_connect('localhost:3306','root','') or die(mysqli_error());
$db_select = mysqli_select_db($con, 'food-order') or die(mysqli_error());
?>