<?php 
    include('partials/dashboard.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admindash.css">
    <title>Admin Panel</title>
</head>

<body>
    <!-- side bar-->
    <div class="side-menu">
        <div class="admin-name">
            <H1 class="">Mikay's Kitchen</H1>
        </div>
        <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-user.php">Users</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
            
        </ul>
    </div>
    <!-- end side bar-->
    <!--Nav bar-->
    <div class="container">
        <div class="header">
            
            <h1>DASHBOARD</h1>
            
        </div>
        <!--end nav-->
        <!--main content -->
        <div class="main-content">
        <div class="wrapper">
            
            <br><br>

            <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }     
            ?>
            <br><br>

            <div class="col-4 text-center">

                <?php
                    //sql query
                    $sql = "SELECT * FROM tbl_category";
                    //execute query
                    $res = mysqli_query($conn, $sql);
                    //count rows
                    $count = mysqli_num_rows($res);     
                ?>

                <h1><?php echo $count; ?></h1>
                <br>
                categories
            </div>

            <div class="col-4 text-center">
                <?php
                    //sql query
                    $sql2 = "SELECT * FROM tbl_food";
                    //execute query
                    $res2 = mysqli_query($conn, $sql2);
                    //count rows
                    $count2 = mysqli_num_rows($res2);     
                ?>
                <h1><?php echo $count2; ?></h1>
                <br>
                Foods
            </div>

            <div class="col-4 text-center">
                <?php
                    //sql query
                    $sql3 = "SELECT * FROM tbl_order";
                    //execute query
                    $res3 = mysqli_query($conn, $sql3);
                    //count rows
                    $count3 = mysqli_num_rows($res3);     
                ?>
                <h1><?php echo $count3; ?></h1>
                <br>
                Total Orders
            </div>

            <div class="col-4 text-center">
                <?php
                    //get sql query to get revenue
                    //aggregate function in sql
                    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                    //execute query
                    $res4 = mysqli_query($conn, $sql4);

                    //get the value
                    $row4 = mysqli_fetch_assoc($res4);

                    $total_revenue = $row4['Total'];

                ?>
                <h1>P<?php echo $total_revenue; ?></h1>
                <br>
                Revenue Generated
            </div>

            <div class="clearfix"></div>
            </div>
        </div>
        <!--end of main content-->
    </div>
</body>

</html>