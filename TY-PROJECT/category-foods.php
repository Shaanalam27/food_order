<?php include('frontend/menu.php') ?>
<?php
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];

        $sql = "SELECT title FROM category_tbl WHERE id=$category_id";

        $res = mysqli_query($con,$sql);

        $row = mysqli_fetch_assoc($res);

        $category_title = $row['title'];
    }
    else
    {
        header("location:".'http://localhost/TY-PROJECT/');
    }
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                <?php 
                
                $sql2 = "SELECT * FROM food_tbl WHERE category_id=$category_id";
                $res2 = mysqli_query($con,$sql2);

                 $count2 = mysqli_num_rows($res2);

                 if($count2>0)
                 {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $discription = $row2['discription'];
                        $image_name = $row2['image_name'];
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
                    echo "food not available";
                 }
                ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('frontend/footer.php') ?>