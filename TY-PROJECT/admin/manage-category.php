<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Categories</h1>
        <br>

        <?php 
        if(isset($_SESSION['add']))
        {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove']))
        {
          echo $_SESSION['remove'];
          unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete']))
        {
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
        }
        if(isset($_SESSION['no-category-found']))
        {
          echo $_SESSION['no-category-found'];
          unset($_SESSION['no-category-found']);
        }
        if(isset($_SESSION['update']))
        {
          echo $_SESSION['update'];
          unset($_SESSION['update']);
        }
        if(isset($_SESSION['upload']))
        {
          echo $_SESSION['upload'];
          unset($_SESSION['upload']);
        }
        if(isset($_SESSION['upload-failed']))
        {
          echo $_SESSION['upload-failed'];
          unset($_SESSION['upload-failed']);
        }
         ?>
         <br>
         <a class="btn btn-primary" href="add-category.php" role="button">Add Categories</a>
     <table class="table">
            <br><br>
        <tr>
        <th scope="col">S.No</th>
        <th scope="col">title</th>
        <th scope="col">Image</th>
        <th scope="col">featured</th>
        <th scope="col">active</th>
        <th scope="col">actions</th>
        </tr>

        <?php
            $sql = "SELECT * FROM category_tbl";

            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];

                    ?>
                     <tr>
                        <td><?php echo $id?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                            <?php 
                            if($image_name!="")
                            {
                                ?>
                                <img src="http://localhost/TY-PROJECT/images/category/<?php echo $image_name; ?>" width="50px">
                                <?php
                            }
                            else
                            {
                                echo "image not added";
                            }
                            ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                        <a class="btn btn-secondary btn-sm" href='http://localhost/TY-PROJECT/admin/update-category.php?id=<?php echo $id; ?>'>update category</a>
                        <a class="btn btn-danger btn-sm" href='http://localhost/TY-PROJECT/admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>'>remove category</a>
                        </td>
                     </tr>
                    <?php
                }   
            }
            else
            {
                ?>
                <tr>
                    <td colspan="6">no categories added</td>
                </tr>
                <?php
            }
        
        ?>

    </table>
    </div>
</div>
<?php include('partials/footer.php') ?>