<?php include('partials-front/menu.php'); ?>

    <!---search-->
    <section class="searchbox text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!---End search-->

    <!--food menu-->
    <section class="food-menu">
        <div class="container">

            <?php
                //display active foods
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

                //execute query
                $res=mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);
                
                //check wether the foods are available or not
                if($count>0)
                {
                    //food available
                    While($row=mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        //check  wether image  is available
                                        if($image_name=="")
                                        {
                                            //image not available
                                            echo "<div class='error'>Image not available.</div>";
                                        }
                                        else
                                        {
                                            //image available
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                            <?php
                                        }
                                    
                                    ?>
                                    
                                </div>
                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">₱<?php echo $price; ?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>
                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Add to Cart</a>

                                </div>
                            </div>

                        <?php 
                    }
                }
                else
                {
                    //food not available
                    echo"<div class='error'>Food not found.</div>";
                }
            
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!--end of food menu-->

    <?php include('partials-front/footer.php'); ?>