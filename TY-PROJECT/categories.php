<?php include('frontend/menu.php') ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            $sql = "SELECT * FROM category_tbl WHERE active='yes'";
            $res = mysqli_query($con,$sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                    <a href="http://localhost/TY-PROJECT/category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                    if($image_name=="")
                            {
                                echo  "image not available";  
                            }
                            else
                            {
                                ?>
                             <img src="http://localhost/TY-PROJECT/images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
        
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                    </a>

                    <?php
                }
            }
            else
            {
                echo "category not added";
            }
            ?>
           
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('frontend/footer.php') ?>