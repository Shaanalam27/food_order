<?php include('partials/menu.php') ?>
     <div class="main-content">
      <div class="wrapper">
        <h1>DASHBOARD</h1>
        <br>
        <?php
        if(isset($_SESSION['login']))
        {
          echo $_SESSION['login'];
          unset($_SESSION['login']);
        }
        
        ?>
        <br>
         <div class="box text-center" >
        <?php
        $sql = "SELECT * FROM category_tbl";
        $res = mysqli_query($con,$sql);
        $count = mysqli_num_rows($res);

        ?>

         <h1><?php echo $count;?></h1>
         Categories
         </div>
         <div class="box text-center" >
         <?php
        $sql2 = "SELECT * FROM food_tbl";
        $res2 = mysqli_query($con,$sql2);
        $count2 = mysqli_num_rows($res2);

        ?>
         <h1><?php echo $count2;?></h1>
         Food
         </div>

         <div class="box text-center" >
         <?php
        $sql3 = "SELECT * FROM order_tbl";
        $res3 = mysqli_query($con,$sql3);
        $count3 = mysqli_num_rows($res3);

        ?>
         <h1><?php echo $count3;?></h1>
         total orders
         </div>
         <div class="box text-center" >
         <?php
        $sql4 = "SELECT SUM(total) AS Total FROM order_tbl WHERE status='Delivered'";
        $res4 = mysqli_query($con,$sql4);
        
        $row4 = mysqli_fetch_assoc($res4);

        $total_revenue = $row4['Total'];

        ?>
         <h1>$<?php echo $total_revenue;?></h1>
         revenue generated
         </div>
         </div>
      <div class="clearfix"></div>
      
      </div>
     <?php include('partials/footer.php') ?>
    