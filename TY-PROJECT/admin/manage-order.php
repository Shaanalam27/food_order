<?php include('partials/menu.php') ?>
<div class="wrapper">
            <h1>Manage order</h1>
            <?php
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }
            ?>
            <table class="table table-bordered">
            <br><br>
                <tr>
                <th scope="col">id</th>
                <th scope="col">food</th>
                <th scope="col">price</th>
                <th scope="col">quantity</th>
                <th scope="col">total</th>
                <th scope="col">order date</th>
                <th scope="col">status</th>
                <th scope="col">customer name</th>
                <th scope="col">customer contact</th>
                <th scope="col">customer email</th>
                <th scope="col">customer address</th>
                <th scope="col">actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM order_tbl ORDER BY id DESC";
                    $res = mysqli_query($con,$sql);
                    $count = mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {   
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $food; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td><a class="btn btn-secondary btn-sm" href='http://localhost/TY-PROJECT/admin/update-order.php?id=<?php echo $id; ?>'>update order</a></td>
                               
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "order not available";
                    }
                ?>
                
        </div>

<?php include('partials/footer.php') ?>