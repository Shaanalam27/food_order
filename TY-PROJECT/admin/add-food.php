<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <?php
        if(isset($_SESSION['upload']))
            {
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
            }
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }
            ?>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-2">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="enter your food title">
        </div>
        <div class="mb-2">
            <label  class="form-label">Discription</label>
            <input type="text" class="form-control" name="discription" placeholder="enter food discription">
        </div>
        <div class="mb-2">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" placeholder="enter food price">
        </div>
        <div class="mb-2">
            <label class="form-label">select image</label>
            <input type="file" class="form-control" name="image_name">
        </div>
        <div class="mb-2">
        <label class="form-label">category</label>
            <select class="px-3 py-1" name="category" >
            <?php
            $sql="SELECT * FROM category_tbl WHERE active='yes'";
            $res= mysqli_query($con,$sql);

            $count = mysqli_num_rows($res);
            
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    ?>
                    <option value="<?php echo $id;?>"><?php echo $title;?></option>
                
                    <?php
                }
            }
            else
            {
                ?>
                <option value="0">no categories found</option>
                <?php
            }
           ?>
            </select>
        </div>
        <div  class="featured">
        featured:
        <input type="radio" name="featured" value="yes">yes
        <input type="radio" name="featured" value="No">no
        </div>
        <div class="active">
        active:
        <input type="radio" name="active" value="yes">yes
        <input type="radio" name="active" value="No">no
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Add Food">
        </form>

        <?php
        if(isset($_POST['submit']))
        {

            $title = $_POST['title'];
            $discription = $_POST['discription'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if(isset($_POST['featured']))
            {
             $featured = $_POST['featured'];   
            }
            else
            {
                $featured = "no";   
            }
             if(isset($_POST['active']))
            {
             $active = $_POST['active'];   
            }
            else
            {
                $active = "no";   
            }

            
            if(isset($_FILES['image_name']['name']))
            {
             $image_name = $_FILES['image_name']['name'];
     
             if($image_name!="")
             {
     
                
                 $dst = "../images/food/".$image_name;
                 $upload = move_uploaded_file($_FILES['image_name']['tmp_name'],$dst);
                 if(upload==false)
                 {
                     $_SESSION['upload'] = "failed to upload the image";
                     header("location:".'http://localhost/TY-PROJECT/admin/add-food.php');
                     die();
                 }
             }
            }
            else
            {
             $image_name = "";
            }

        $sql2 = "INSERT INTO food_tbl SET
            title = '$title',
            discription = '$discription',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'
         ";
         $res2= mysqli_query($con,$sql2);
         
            if($res2 = TRUE)
            {
                $_SESSION['add']="data inserted successfully";
                header("location:".'http://localhost/TY-PROJECT/admin/manage-food.php');
            }
            else
            {
                $_SESSION['add']="failed to add food";
                header("location:".'http://localhost/TY-PROJECT/admin/manage-food.php');
            }
        }

        ?>
    </div>
</div>
<?php include('partials/footer.php') ?>