<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
<h1>update category</h1>

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM category_tbl WHERE id=$id";
    $res = mysqli_query($con, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $row= mysqli_fetch_assoc($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];
    }
    else
    {
        $_SESSION['no-category-found'] = "category not found";

        header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');
    }
}
else
{
    header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');
}

?>

<form  action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"  >
        </div>
        <div class="mb-3">
            <label class="form-label">current image:</label>
            <?php
            if($current_image !="")
            {
                ?>
                <img src="http://localhost/TY-PROJECT/images/category/<?php echo $current_image; ?>" width="50px">
                <?php
            }
            ?>
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
        <input type="submit" class="btn btn-secondary" name="submit" value="update Category">
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];


            $sql2 = "UPDATE category_tbl SET
                title = '$title',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
            ";

            $res2 = mysqli_query($con, $sql2);

            if($res2==true)
            {
                $_SESSION['update'] = "categories updated";
                header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');
            }
            else
            {
                $_SESSION['update'] = "failed to update category";
                header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php') ?>