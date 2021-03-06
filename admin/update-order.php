<?php include('partials/menu.php') ; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                
                if($count==1){
                    $row = mysqli_fetch_assoc($res);
                    $food = $row['food'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                }else{
                    header('location:'.HOMEURL.'/admin/manage-order.php');
                }
            }else{
                header('location:'.HOMEURL.'/admin/manage-order.php');
            }
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><?php echo $food;?></td>
                </tr>
                <tr>
                    <td>Qty.</td>
                    <td><?php echo $qty;?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){ echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){ echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){ echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){ echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Order" class="btn btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php

            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $status = $_POST['status'];

                $sql2 = "UPDATE tbl_order SET status ='$status' WHERE id=$id";
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true){
                    $_SESSION['update'] = '<div class="success">Order Updated Succesfully.</div>';
                    header('location:'.HOMEURL.'admin/manage-order.php');
                }else{
                    $_SESSION['update'] = '<div class="error">Failed To Updated Order.</div>';
                    header('location:'.HOMEURL.'admin/manage-order.php');
                }
            }

        ?>
    </div>
</div>

<?php include('partials/footer.php') ; ?>