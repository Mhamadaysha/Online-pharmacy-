<?php  
include('Admin-erea/includes/connect.php');
include('Admin-erea/common_function.php');
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

     <link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
   crossorigin="anonymous" 
   referrerpolicy="no-referrer" />
   <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
   </head>
<body>
   <!--bootsrap js -->

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
       crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
       integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   <!-- Custom CSS -->

   <style>
    /* Add your custom styles here */
  .logo{
    width:20%;
    weight:20%;
  }
 
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
     }
     

    .container-fluid {
        padding-top: 20px;
    }

    .navba1 {
        padding: 18px 0;
        margin-bottom: 30px; /* Add margin to separate from content */
    }


    .card {
        margin-bottom: 20px;
        transition: transform 0.3s;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
      
    }

    .card:hover {
        transform: translateY(-5px);
        background-color: #87CEEB; 
    }

    .card-title {
        font-weight: bold;
    }

    .card-text {
        color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    /* .btn-secondary:hover {
        background-color: #545b62;
        border-color: #545b62;
    }

    /* Style for the product cards */
    .card-img-top {
        height: 300px; /* Adjust height as needed */
        object-fit: cover; /* Ensure image covers entire space */
    }

    /* Style for the "Add to cart" and "View more" buttons */
    .btn-primary,
    .btn-secondary {
        width: 100%;
        margin-top: 10px;
    }

    /* Center align text */
    .text-center {
        text-align: center;
    }
</style>

 <!--Nav-->
 <section>
       <div class="container-fluid">
                 <!--first child-->
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
  
       <li class="nav-item">
         <a class="nav-link" href="display_all.php">product</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Cart</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
         cart_item() ;
         ?></sup>Cart</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Total price: <?php totale_cart_price();?></a>
       </li>
       <?php 
if (isset($_SESSION['username'])) {
  echo '<li class="nav-item">
  <a class="nav-link" href="./profile.php">My Account</a>
</li>';
}else{
  echo '<li class="nav-item">
  <a class="nav-link" href="./Admin-erea/user-erea/user_registration.php">Registre</a>
</li>';
}
  ?>   
       
     </ul>
     <form class="d-flex" role="search"  action="search_product.php" method="get">
       <input class="form-control me-2" type="search" placeholder="Search" aria-label="search_data" name="search_data">
       <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
       <input type="submit" value="search" class="btn btn-outline">

      </form>
   </div>
 </div>
</nav>

<!--calling cart function -->
<?php
cart();
?>
   
 <!-- 2child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto " >
  
  <?php 

if (!isset($_SESSION['username'])) {
  echo "
  
  <li class='nav-item'>
            <a class='nav-link active' href='#'>Welcome</a>
        </li>";
  echo "<li class='nav-item'>
            <a class='nav-link active' href='./Admin-erea/user-erea/user_Login.php'>Login</a>
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
</nav></br>

 


<!-- 4child-->
 <div class="row">
<div class="col-md-12">
<!--product-->
   
<div class="row">
<?php 
 get_all_products();



?>
    </div>
    
  </div>
</div>

    </ul>
   </div>


  

     
</form>
           </div>
       </div>
   </nav> 
 </div>
</body>
</html>