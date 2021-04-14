<?php include('partials/menu.php'); ?>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes'";
                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2>0){
                    while($row2=mysqli_fetch_assoc($res2)){
                        $id= $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name']
                        ?>
                        <form action="managecart.php" method="POST">
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                    if($image_name==""){
                                        echo '<div class="error">Image not available</div>';
                                    }else{
                                        ?>
                                        <img src="<?php echo HOMEURL;?>/images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                    ?>
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price"><?php echo $price;?> rs</p>
                                    <p class="food-detail">
                                        <?php echo $description;?>
                                    </p>
                                    <br>

                                    <a href="<?php echo HOMEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                                    <!-- <button type="submit" name="add-to-cart"  class="btn btn-add-to-cart">Add to Cart</button> -->
                                    <input type="hidden" name="item_name" value="<?php echo $title;?>">
                                    <input type="hidden" name="item_price" value="<?php echo $price;?>">
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }else{
                    echo '<div class="error">Foods are not available.</div>';
                }

            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials/footer.php'); ?>

</body>
</html>