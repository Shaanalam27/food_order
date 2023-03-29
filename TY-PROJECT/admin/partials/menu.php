<?php 
include('../config/connection.php');
include('login-check.php');

?>

<html>
    <head>
    <title>wow food</title>
   <link rel="stylesheet" href="../css/main.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
     <div class="menu">
        <div class="wrapper">
            <ul>
               <li><a href="index.php">Home</a></li>
               <li><a href="manage-admin.php">Admin</a></li>
               <li><a href="manage-category.php">Category</a></li>
               <li><a href="manage-food.php">Food</a></li>
               <li><a href="manage-order.php">Order</a></li>
               <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
     </div>