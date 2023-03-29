<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
            <h1>Manage food</h1>
            
            <?php
        if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }
            ?>
            <br>
      <a class="btn btn-primary" href="add-food.php" role="button">Add Food</a>
            <table class="table">
            <tr>
        <th scope="col">S.No</th>
        <th scope="col">title</th>
        <th scope="col">price</th>
        <th scope="col">image</th>
        <th scope="col">featured</th>
        <th scope="col">active</th>
        <th scope="col">actions</th>
        </tr>
            <?php
            $sql = "SELECT * FROM food_tbl";

            $res = mysqli_query($con,$sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
              while($row=mysqli_fetch_assoc($res))
              {
                $id = $row['id'];
              $title = $row['title'];
              $price = $row['price'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];
                ?>
                <tr>
                  <td><?php echo $id;?></td>
                  <td><?php echo $title;?></td>
                  <td><?php echo $price;?></td>
                  <td>
                  <?php 
                            if($image_name!="")
                            {
                                ?>
                                <img src="http://localhost/TY-PROJECT/images/food/<?php echo $image_name; ?>" width="50px">
                                <?php
                            }
                            else
                            {
                                echo "image not added";
                            }
                            ?>

                  </td>
                  <td><?php echo $featured;?></td>
                  <td><?php echo $active;?></td>
                  <td>
                        <a class="btn btn-secondary btn-sm" href='http://localhost/TY-PROJECT/admin/update-food.php?id=<?php echo $id; ?>'>update food</a>
                        <a class="btn btn-danger btn-sm" href='http://localhost/TY-PROJECT/admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>'>remove food</a>
                  </td>
               </tr>
                <?php
              }
            }
            else
            {

            }
            ?>
        
            </table>
    </div>
 </div>

<?php include('partials/footer.php') ?>