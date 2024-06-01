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
    width:7%;
    weight:7%
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
        background-color: #87CEEB; /* Darker blue on hover */
    }

    .card-title {
        font-weight: bold;
    }

    .card-text {
        color: #6c757d;
    }

    .btn-info {
       
        border-color: #007bff;
    }

    .btn-info:hover {
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
         width:100%;
        height: 300px; /* Adjust height as needed */
        object-fit: cover; /* Ensure image covers entire space */
    }

    /* Style for the "Add to cart" and "View more" buttons */
    .btn-info,
    .btn-secondary {
        width: 50%;
        margin-top: 15px;
    }

    /* Center align text */
    .text-center {
        text-align: center;
    }
    .site-section {
  padding: 60px 0;
}

.bg-image {
  background-size:100%;
  background-position: cover;
}

.banner-1 {
  position: relative;
  overflow: hidden;
  border-radius: 15px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s, box-shadow 0.3s;
}

.banner-1:hover {
  transform: scale(1.02);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
}

.banner-1-inner {
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  padding: 80px;
  border-radius: 15px;
}

.banner-1 h2 {
  color: #fff;
  font-weight: bold;
}

.banner-1 p {
  color: #ddd;
}

.site-footer {
  background: #333;
  color: #aaa;
  padding: 50px 0;
}

.footer-heading {
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
  color: #fff;
}

.block-7,
.block-5 {
  margin-bottom: 2rem;
}

.list-unstyled {
  padding-left: 0;
  list-style: none;
}

.list-unstyled li {
  margin-bottom: 0.75rem;
}

.list-unstyled a {
  color: #17a2b8;
  text-decoration: none;
  transition: color 0.3s;
}

.list-unstyled a:hover {
  color: #fff;
  text-decoration: underline;
}

.ratio {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; /* 16:9 ratio */
}

.ratio iframe {
  position: absolute;
  width: 100%;
  height: 100%;
  border: 0;
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
</nav>
 <!-- 3child-->


</section>

<!-- 4child-->
<section class="my-5" >
<div class="row">
    <div class="col-md-9">
        <!-- Product Display -->
        <div class="row">
            <?php 
             search_product();

            get_unique_categories();
            get_unique_brands();
            ?>
        </div>
    </div>
    <!-- Delivery Brands -->
    <div class="col-md-2 bg-secondary p-0">
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4> Brands</h4></a>
            </li>
            <?php
            getbrands();
            ?>
        </ul>
    
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light" ><h1>Categories</h1></a>
            </li>
            <?php
            getcategories();
            ?>
        </ul>
    </div>
</div></section>

     
    
</form>
           </div>
       </div>
   </nav> 
 </div>

 <div class="site-section bg-info bg-image" style="">
  <div class="container">
    <div class="row align-items-stretch">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <a href="#" class="banner-1 h-100 d-flex  bg-image" style="background-image: url('images/bg_2.jpg');">
          <div class="banner-1-inner align-self-center">
            <h3>Pharma Products</h3>
            <p>Shop confidently at our online pharmacy, where every product is meticulously selected and endorsed by experts to ensure the highest standards of quality and effectiveness.</p>
          </div>
        </a>
      </div>
      <div class="col-lg-6 mb-5 mb-lg-0">
        <a href="#" class="banner-1 h-100 d-flex bg-image" style="background-image: url('miu.jpg');">
          <div class="banner-1-inner ml-auto align-self-center">
            <h3>Rated by Experts</h3>
            <p>Discover a comprehensive range of pharmaceutical products available at our online pharmacy, providing you with convenient access to trusted medications and healthcare essentials.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
        <div class="block-7">
          <h3 class="footer-heading mb-4">About Us</h3>
          <p>"At our online pharmacy, we pride ourselves on delivering exceptional service and care. With a commitment to quality, safety, and customer satisfaction, we strive to provide you with the best healthcare experience possible."</p>
        </div>
      </div>
      <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
        <h3 class="footer-heading mb-4">Quick Links</h3>
        <ul class="list-unstyled">
          <li><a href="#">Supplements</a></li>
          <li><a href="#">Vitamins</a></li>
          <li><a href="#">Diet &amp; Nutrition</a></li>
          <li><a href="#">Tea &amp; Coffee</a></li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="block-5 mb-5">
          <h3 class="footer-heading mb-4">Contact Info</h3>
          <ul class="list-unstyled">
            <li class="address">Lebanon, Tripoli, Abou Samra</li>
            <li class="phone"><a href="tel://76316101">76316101</a></li>
            <li class="email">51930089@students.liu.edu.lb</li>
            <li class="phone"><a href="tel://70171399">70171399</a></li>
            <li class="email">92030299@students.liu.edu.lb</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
      <div class="ratio ratio-16x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25023.428814746825!2d35.81962281183345!3d34.433046880203676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1521f401dd856e5d%3A0x1429adeeb3dee51a!2sIslamic%20Charity%20Hospital%20(ICH)!5e1!3m2!1spl!2spl!4v1715244513361!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</footer>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

</body>
</html>
<?php 
    include("Admin-erea/footer.php");
    ?>