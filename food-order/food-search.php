<?php include('partials-front/menu.php'); ?>

    <!-- food search -->
    <section class="food-search text-center">
        <div class="container"> 
            <div class="food-search-msg">
                <?php     

                    //get the search keyword
                    //$search = $_POST['search'];
                    $search = mysqli_real_escape_string($conn, $_POST['search']);

                ?>

                <h2>Foods on Your Search <a href="#" class="color-yellow"><?php echo $search; ?></a></h2>
            </div>          
        </div>
    </section> 
    <!-- end food search-->

    <!--food menu-->
    <section class="food-menu">
        <div class="container">

            <h2 class="text-center color-yellow">Food Menu</h2>

            <?php
            
            //sql query to get food base on search
            //$search = burger'
            //"SELECT * FROM tbl_food WHERE title LIKE '&burger'&' or  description like'%burger%'";
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //execute the query
            $res = mysqli_query($conn, $sql);
            
            //count Rows
            $count =  mysqli_num_rows($res);

            //check wether food is available
            if($count>0)
            {
                //food available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get details
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    //check if image is available
                                    if($image_name=="")
                                    {
                                        //image not available
                                        echo "<div class='error'>Image not Available.</div>";
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

                            </div>
                        </div>

                    <?php

                }
            }
            else
            {
                //food not available
                echo "<div class='error'>Food not Found.</div>";
            }


            ?>
    

            <div class="clearfix"></div>

        </div>
    </section>
    <!--end of food menu-->

    <?php include('partials-front/footer.php'); ?>