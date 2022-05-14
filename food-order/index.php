

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

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['update_user']))//checking wether the session is set
            {
                echo $_SESSION['update_user'];//display msg
                unset($_SESSION['update_user']);//display msg
            }
    ?>
  
     
   
    <!---Category-->
    <section class="categories">
        <div class="container">
            <h2 class="text-center color-yellow">Categories</h2>

            <?php 
                //create sql query to display
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

                //execute the query
                $res = mysqli_query($conn, $sql);
                //count rows to check if the category is available
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //categories
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values like title
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="<?php echo SITEURL; ?>category-food.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //check wether image is available
                                    if($image_name=="")
                                    {
                                        //display msg
                                        echo"<div class='error'>Image Not Available</div>";
                                    }
                                    else
                                    {
                                        //image is available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Chicken" class="img-responsive img-curve">
                                        <?php
                                    }

                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php

                    }

                }
                else
                {
                    //categories not available
                    echo"<div class='error'>Category not Added.</div>";
                }


            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!--- End Category-->

    <!-- Food menu -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center color-yellow">Food Menu</h2> 
            
            <?php
            
                //gettingfoods from database active and featured
                //sql query
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //countrows
                $count2 = mysqli_num_rows($res2);

                //check if food is available
                if($count2>0)
                {
                    //food available
                    While($row=mysqli_fetch_assoc($res2))
                    {
                        //get all values
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        //check wether image is available
                                        if($image_name=="")
                                        {
                                            //image not available
                                            echo"<div class='error'>Image not Available.</div>";
                                        }
                                        else
                                        {
                                            //image available
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
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
                    echo "<div class='error'>Food not available.</div>";
                }

            
            ?>


            <div class="clearfix"></div>

        </div>

    
    </section>
    <!-- end food menu -->

    <?php include('partials-front/footer.php'); ?>