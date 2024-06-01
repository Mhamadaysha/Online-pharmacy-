<?php
include ('Admin-erea/includes/connect.php');
//include ('Admin-erea/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parmicy</title>
    <link rel="stylesheet" href="pharmacy.css">

    <!--bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--font awesome link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!--bootsrap js -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
<style>.navbar {
  background-color: #f8f9fa; /* Background color for the navbar */
  padding: 10px 20px; /* Padding for the navbar */
  border-bottom: 1px solid ; /* Border at the bottom of the navbar */
}

.nav-item {
  margin-right: 10px; /* Spacing between navigation items */
}

.nav-link {
  color: #007bff; /* Link color */
  text-decoration: none; /* Remove underline from links */
}

.nav-link:hover {
  color: #0056b3; }</style>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
 <div class="container-fluid">
 <!-- / <img src="omar.png"  alt=" "class="logo"> -->
 <i class="fa fa-heartbeat" style="font-size:48px"></i>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="index.php">Home</a>
       </li>
      
        
         
       
       
     </ul>
    
   </div>
 </div>



<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto " >
  
  <?php 

if (!isset($_SESSION['username'])) {
  echo "
  
  <li class='nav-item'>
            <a class='nav-link active' href='#'>Welcome</a>
        </li>";
  echo "<li class='nav-item'>
            <a class='nav-link active' href='user_Login.php'>Login</a>
        </li>";
} else {
  echo "<li class='nav-item'>
            <a class='nav-link active' href='logout.php'>Welcome, ".$_SESSION['username']."</a>
        </li>";
  echo "<li class='nav-item'>
            <a class='nav-link active' href='logout.php'>Logout</a>
        </li>";
}
//    <a class='nav-link'  href='./user-erea/user_Login.php'>Login</a>

?>
  </ul>
</nav></nav>
    <!--calling cart functioSADCAVn -->


    <!-- 2child-->

    <!-- 3child-->

    
    <!-- 4child-->
    <div class="row">
        <div class="col-md-10">
            <!--product-->
            <?php
            if (!isset($_SESSION['username'])) {
                ?>

                <div class="container-fluid m-4">
                    <h2 class="text-center">User Login</h2>
                    <div class="row d-flex align-items-center justify-content-center mt-5">
                        <div class="col-lg-12 col-xl-6">
                            <form action="" method="post">
                                <div class="form-outline mb-4">
                                    <label for="user_username" class="form-label"
                                        class="border border-success">Username</label>
                                    <input type="text" id="user-user_name" class="border border-success form-control"
                                        placeholder="Enter your username" autocomplete="off" required="required"
                                        name="user_username" />
                                </div>
                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <label for="user_password" class="form-label">Password</label>
                                    <input type="password" id="user_password" class="form-control" autocomplete="off"
                                        placeholder="Enter your password" required="required" name="user_password">
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Login" class="btn btn-primary px-5" name="user_login">
                                    <p class="small fw-bold mt-2 pt-1 mb-0">
                                        Don't have an account? <a href="user_registration.php"
                                            class="text-danger">Register</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php


                // Check if the login form is submitted
            

                // Assuming your database connection is already established ($con)
            
                if (isset($_POST['user_login'])) {
                    $user_username = $_POST['user_username'];
                    $user_password = $_POST['user_password'];

                    // Retrieve user data from database based on username
                    global $con;
                    $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_username'";
                    $result = mysqli_query($con, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $row_count = mysqli_num_rows($result); // Count rows returned from the query
            
                    if ($row_count > 0) {
                        $user_username = $_POST['user_username'];
                        // Verify password
                        if (password_verify($user_password, $row['user_password'])) {
                            // Password is correct
                            if ($row_count == 1) {
                                $user_username = $_POST['user_username'];
                                $_SESSION['username'] = $user_username;
                                echo "<script>alert('Login successful');</script>";
                                echo "<script>window.open('payment.php','_self')</script>";
                            }
                        } else {
                            // Password is incorrect
                            echo "<script>alert('Password is incorrect');</script>";
                        }
                    } else {
                        // User not found
                        echo "<script>alert('User not found');</script>";
                    }
                }



                ?>
                <?php
                // if (isset($_POST['username'])) {
                //     include ('user_Login.php');}

            } else {
                require ('payment.php');
            }

            ?>
            
    </div>

    </div>
    </div>

    </div>
    <!-- <div class="bg- p-3 text-center text-ligth">
       <p>all rigth reserved Designed by Mohamd-2024</p>
    </div> -->
   
    </form>
    </div>
    </div>
    
    </div>
</body>

</html>