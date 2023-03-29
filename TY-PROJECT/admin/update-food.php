<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
<h1>update food</h1>

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];

     $sql3 = "SELECT * FROM food_tbl WHERE id=$id";

     $res3 = mysqli_query($con,$sql3);

     $row3 = mysqli_fetch_assoc($res3);

        $title = $row3['title'];
        $discription = $row3['discription'];
        $price = $row3['price'];
        $current_image = $row3['image_name'];
        $current_category = $row3['category_id'];
        $featured = $row3['featured'];
        $active = $row3['active'];


    
}
else
{
    header("location:".'http://localhost/TY-PROJECT/admin/manage-food.php');
}

?>

<form  action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"  >
        </div>
        <div class="mb-3">
            <label class="form-label">Discription</label>
            <input type="text" class="form-control" name="discription" value="<?php echo $discription; ?>"  >
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="<?php echo $price; ?>"  >
        </div>
        <div class="mb-3">
            <label class="form-label" name="image_name">current image:</label>
            <?php
            if($current_image !="")
            {
                ?>
                <img src="http://localhost/TY-PROJECT/images/food/<?php echo $current_image; ?>" width="50px">
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">category</label>
            <select name="category">
            <?php
                $sql="SELECT * FROM category_tbl WHERE active='yes'";
                $res= mysqli_query($con,$sql);

                $count = mysqli_num_rows($res);
                
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {

                        $category_title = $row['title'];
                        $category_id = $row['id'];
                        ?>
                        <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                    
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
        <input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes">yes
        <input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="featured" value="No">no
        </div>
        <div class="active">
        active:
        <input <?php if($active=="yes"){echo "checked";} ?> type="radio" name="active" value="yes">yes
        <input <?php if($active=="no"){echo "checked";} ?> type="radio" name="active" value="No">no
        </div>
        <input type="hidden" name = "current_image" value="<?php echo $current_image; ?>" >
        <input type="hidden" name = "id" value="<?php echo $id; ?>" >
        <input type="submit" class="btn btn-secondary" name="submit" value="update food">
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $discription = $_POST['discription'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];


            $sql2 = "UPDATE food_tbl SET
                title = '$title',
                discription = '$discription',
                price = $price,
                category_id = $category,
                featured = '$featured',
                active = '$active'
                WHERE id=$id
            ";

            $res2 = mysqli_query($con, $sql2);

            if($res2==true)
            {
                $_SESSION['update'] = "food updated";
                header("location:".'http://localhost/TY-PROJECT/admin/manage-food.php');
            }
            else
            {
                $_SESSION['update'] = "failed to update food";
                header("location:".'http://localhost/TY-PROJECT/admin/manage-food.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php') ?>