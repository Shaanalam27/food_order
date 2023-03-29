<?php include('frontend/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="http://localhost/TY-PROJECT/food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
             $sql = "SELECT * FROM food_tbl WHERE active='yes'";
             $res = mysqli_query($con,$sql);
             $count = mysqli_num_rows($res);
             if($count>0)
             {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $discription = $row['discription'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                    if($image_name=="")
                    {
                        echo "image not available";
                    }
                    else
                    {
                        ?>
                        <img src="http://localhost/TY-PROJECT/images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        <?php
                    }
                    ?>
                    
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail">
                    <?php echo $discription; ?>
                    </p>
                    <br>

                    <a href="http://localhost/TY-PROJECT/order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
                </div>
                    <?php
                }

             }
             else
             {
                echo "food not added";
             }
 
            ?>
            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('frontend/footer.php') ?>