
<?php
include('partials-front/session.php'); 
include('partials-front/login-check.php');
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!---nav-->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive img-curve">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>food.php">Foods/Menu</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/login.php">Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>../food-order/user-prof.php">User</a>
                        
                    </li>
                    
                    
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!---End nav-->
    

<!--main content-->
<div class="body2">

    
            <?php
                $sql="SELECT * FROM tbl_user where id=$loggedin_id";
                $res=mysqli_query($conn,$sql);
            ?>
            <?php
                while($rows=mysqli_fetch_array($res)){
            ?>

            <form action="" method="POST" id="signin" id="reg">
            <div class="head">Your Profile</div>
                <table>
                    <tr >
                        <td class="text1"> <div align="left">Full-Name:</div> </td>
                        <td class="text2"><?php echo $rows['user_name']; ?></td>
                    </tr>
                    <tr >
                        <td class="text1"><div align="left">Username:</div></td> 
                        <td class="text2"><?php echo $rows['user']; ?></td>
                    </tr>
                    <tr >
                        <td class="text1"><div align="left">Contact:</div></td>
                        <td class="text2"><?php echo $rows['contact']; ?></td>
                    </tr>
                    <tr>
                        <td>
                        <a class="btn2 float-left" href="<?php echo SITEURL; ?>../food-order/logout.php">Logout</a>
                        </td>
                        <td>
                        <a class="btn2" href="<?php echo SITEURL; ?>../food-order/update-user.php">Edit Profile</a>
                        </td>
                    </tr>
                     
                    
                </table>
            </form>
            <?php
             }
        ?>

      <div class="fixclear"></div>                          

</div>

        


                                        
    

    
     

<!--main content-->

<?php include('partials-front/footer.php'); ?>
