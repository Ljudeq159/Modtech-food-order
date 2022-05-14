<?php include('../food-order/config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
    <link rel="stylesheet" href="../food-order/css/style.css">
</head>
<body class="body">
    <!--main content-->
    
    <div class="container1">
        <h1>User</h1>
        <br>
        <?php
            
            if(isset($_SESSION['Exist']))//checking wether the session is set
            {
                echo $_SESSION['Exist'];//display msg
                unset($_SESSION['Exist']);//display msg
            }
        ?>
            <!--login form-->

        <form action="" method="post">
            <div class="tbox">
            <input type="text" name="full_name" placeholder="Enter your Name">
            </div>
            <div class="tbox">
            <input type="text" name="contact" placeholder="Enter Contact">
            </div>
            <div class="tbox">
            <input type="text" name="username" placeholder="Enter Username">
            </div>
            <div class="tbox">
            <input type="password" name="password" placeholder="Enter Password">
            </div>
            
            <input type="submit" name="submit" value="Register" class="btn1">
              
        </form>
        
    </div>
<?php
    
    

    //process the value from form & save in database
    //check whether button is click/not
    if(isset($_POST['submit']))
{
        //button clicked
       // echo"button click";
       //check if user exist
       $sql3 = "SELECT * FROM tbl_user WHERE user = '".$_POST['username']."'";
       $select = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($select)) 
        {
            $_SESSION['Exist'] = "<div class='error'>User already Exist.</div>";
            //redirect page to add admin
            header("location:".SITEURL.'../food-order/register.php');
        }
        else
        {
           //get data from form
        $full_name = $_POST['full_name'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption md5
            
            // SQL query to save to database
            $sql = "INSERT INTO tbl_user SET
                user_name = '$full_name',  
                contact = '$contact',
                user = '$username',
                pass = '$password'
            ";
            
            // executing query and save data to database
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            //check whether the data is inserted or not
            if($res==TRUE)
            {
                //data inserted
                //echo "data inserted"
                //create a session variable to display message
                $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
                //redirect page to manage admin
                header("location:".SITEURL.'../food-order/login.php');
                
            }
            else
            {
                //failed to insert data
                //echo"fail, data not inserted";
                //create a session variable to display message
                $_SESSION['add'] = "<div class='error'>Failed to Add User.</div>";
                //redirect page to add admin
                header("location:".SITEURL.'../food-order/register.php');
            }
        }

}

    

?>
    <!--end main content-->

    
</body>
</html>

