<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>update order</h1>
        <br><br>
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $sql = "SELECT * FROM order_tbl WHERE id=$id";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {   

                $row= mysqli_fetch_assoc($res);
                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
            }
            else
            {
                header("location:".'http://localhost/TY-PROJECT/admin/manage-order.php');
            }
        }
        else
        {
            header("location:".'http://localhost/TY-PROJECT/admin/manage-order.php');
        }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label>food name</label>
                <input type="text" class="form-control" name="food" value="<?php echo $food; ?>" readonly>
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $price; ?>" readonly>
            </div>
            <div class="form-group">
                <label>quantity</label>
                <input type="number" class="form-control" name="qty" value="<?php echo $qty; ?>" readonly>
            </div>
            <div class="form-group">
                <label >status</label>
                <select class="form-control" name="status">
                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered" >Ordered</option>
                <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div class="form-group">
                <label>customer name</label>
                <input type="text" class="form-control" name="customer_name" value="<?php echo $customer_name; ?>" >
            </div>
            <div class="form-group">
                <label>customer contact</label>
                <input type="text" class="form-control" name="customer_contact" value="<?php echo $customer_contact; ?>">
            </div>
            <div class="form-group">
                <label>customer email</label>
                <input type="text" class="form-control" name="customer_email" value="<?php echo $customer_email; ?>">
            </div>
            <div class="form-group">
                <label>customer address</label>
                <input type="text" class="form-control" name="customer_address" value="<?php echo $customer_address; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if(isset($_POST['submit']))
        {   
            $id = $_POST['id'];
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;

            $status =  $_POST['status'];
            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];

            $sql2 = "UPDATE order_tbl SET
            qty = $qty,
            total = $total,
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
            WHERE id=$id
            ";
            $res2 = mysqli_query($con,$sql2) or die(mysqli_error());

            if($res2==true)
                {
                    $_SESSION['update'] = "order successfully updated";
                    header("location:".'http://localhost/TY-PROJECT/admin/manage-order.php');
                }
                else
                {
                    $_SESSION['update'] = "failed to update order";
                    header("location:".'http://localhost/TY-PROJECT/manage-order.php');
                }
        }
            ?>
        </div>
</div>
