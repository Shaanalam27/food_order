<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
            <h1>Add Category</h1>

            <?php
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
            }
            ?>
            <br>
       
        <form  action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="category title">
        </div>
        <div class="mb-3">
            <label class="form-label">select image</label>
            <input type="file" class="form-control" name="image" placeholder="category title">
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
        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    $title = $_POST['title'];

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

        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name !="")
            {

            

            $ext = end(explode('.',$image_name));

            $image_name = "Food_Category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/".$image_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload==FALSE)
            {
                $_SESSION['upload'] = "failed to upload the image";
                header("location:".'http://localhost/TY-PROJECT/admin/add-category.php');
                die();
            }
            }
        }
        else
        {
            $image_name = "";
        }

    $sql = "INSERT INTO category_tbl SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
    ";

    $result= mysqli_query($con,$sql);

    if($result==TRUE)
    {
        $_SESSION['add'] = "category added succesfully!!";
        header("location:".'http://localhost/TY-PROJECT/admin/manage-category.php');
    }
    else
    {
        $_SESSION['add'] = "failed to add the category!!";
        header("location:".'http://localhost/TY-PROJECT/admin/add-category.php');
    }
}


?>
<?php include('partials/footer.php') ?>