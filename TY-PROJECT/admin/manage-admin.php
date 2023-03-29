<?php include('partials/menu.php') ?>
       
 <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

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

                if(isset($_SESSION['user-not-found']))
                {
                  echo $_SESSION['user-not-found'];
                  unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pass-not-matched']))
                {
                  echo $_SESSION['pass-not-matched'];
                  unset($_SESSION['pass-not-matched']);
                }
                if(isset($_SESSION['pass-matched']))
                {
                  echo $_SESSION['pass-matched'];
                  unset($_SESSION['pass-matched']);
                }
            ?>
            <br><br>

            <table class="table">
            <a class="btn btn-primary" href="add-admin.php" role="button">Add Admin</a>
            <br><br>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">username</th>
      <th scope="col">actions</th>
    </tr>

    <?php
    $sql = "SELECT * FROM admin_tbl";

    $result = mysqli_query($con, $sql);

    if($result==TRUE)
    {
      $count = mysqli_num_rows($result);
      if($count>0)
      {
        while($rows=mysqli_fetch_assoc($result))
        {
          $id=$rows['id'];
          $full_name=$rows['full_name'];
          $username=$rows['username'];

          ?>
          <tr>
      <td><?php echo $id ?></td>
      <td><?php echo $full_name ?></td>
      <td><?php echo $username ?></td>
      <td>
      <a class="btn btn-secondary btn-sm" href='http://localhost/TY-PROJECT/admin/update-admin.php?id=<?php echo $id; ?>' role="button">update</a>
      <a class="btn btn-danger btn-sm" href='http://localhost/TY-PROJECT/admin/delete-admin.php?id=<?php echo $id; ?>' role="button">delete</a>
      <a class="btn btn-primary btn-sm" href='http://localhost/TY-PROJECT/admin/update-password-admin.php?id=<?php echo $id; ?>' role="button">change password</a>
      </td>
    </tr>
          <?php
        }
      }
      else
      {

      }
    }
    ?>
</table>
        </div>
 </div>
     <?php include('partials/footer.php') ?>