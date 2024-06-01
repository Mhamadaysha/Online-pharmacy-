
<?php  
include('includes/connect.php');
include('common_function.php');
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

    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .container-fluid {
        padding-top: 20px;
    }

    .navba1 {
        background-color: #007bff;
        padding: 18px 0;
        margin-bottom: 30px; /* Add margin to separate from content */
    }

    .navba1 a {
        color: #ffffff;
        text-decoration: none;
    }

    .bg-light {
        background-color: #f8f9fa;
        padding: 20px 0;
        margin-bottom: 20px;
    }

    .bg-secondary {
        background-color: #6c757d;
        padding: 10px;
    }

    .bg-info {
        background-color: #17a2b8;
        padding: 10px;
    }

    .text-light {
        color: #ffffff !important;
    }

    .card {
        margin-bottom: 20px;
        transition: transform 0.3s;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
        background-color: blanchedalmond; /* Blue background color */
    }

    .card:hover {
        transform: translateY(-5px);
        background-color: #0056b3; /* Darker blue on hover */
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

    .btn-secondary:hover {
        background-color: #545b62;
        border-color: #545b62;
    }

    /* Style for the product cards */
    .card-img-top {
        height: 200px; /* Adjust height as needed */
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
  <div>
 <!--Nav-->

       <div class="container-fluid">
                 <!--first child-->
                 <nav class="navbar navbar-expand-lg bg-body-tertiary">
 <div class="container-fluid">
 <!-- / <img src="omar.png"  alt=" "class="logo"> -->
   <a class="navbar-brand" href="#">Navbar</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="index.php">Home</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="index.php">Registre</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="display_all.php">product</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Cart</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Total price</a>
       </li>
       
       
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
get_all_products() ;
?>
   
 <!-- 2child-->
<nav class="navba1">
  <ul class="navbar-nav me-auto " >
  <?php 

if (!isset($_SESSION['username'])) {
  echo " <li class='nav-item'>
  //    <a class='nav-link'  href='./user-erea/user_Login.php'>Login</a>
  </li>";
}else {
    " <li class='nav-item'>
    <a class='nav-link'  href='logout.php'>logout</a>
    </li>";
}?>
  </ul>
</nav>
 <!-- 3child-->

<div class="bg-ligth">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication between user and pharmacy</p>
</div>
<!-- 4child-->
 <div class="row">
<div class="col-md-10">
<!--product-->
    <div class="col-md-4">
<div class='card'>
    <img src='omar.png'  class='card-img-top'> 
<div class='card-body'>
<?php
// Assuming $products_title, $product_description, and $product_id are PHP variables containing product information
?>
<div class='card'>
  <div class='card-body'>
    <h5 class='card-title'><?php echo $products_title; ?></h5>
    <p class='card-text'><?php echo $product_description; ?></p>
    <a href='#' class='btn btn-primary'>Add To Cart</a>
    <a href='product_details.php?product_id=<?php echo $product_id; ?>' class='btn btn-secondary'>View More</a>
  </div>
</div>

    <div class="col-md-8">
<div class="row">
    <div class="col-md-12">
        <h4 class="text-cenrter text-info mb-5">Related product</h4>

    </div>
<div class="col-md-6">
<img src='omar.png'  class='card-img-top'
 alt='$products_title'>

</div>
<div class="col-md-6">
<img src='omar.png'  class='card-img-top'
 alt='$products_title'>

</div>
</div>


<?php 
view_details();
get_unique_categories();
get_unique_brands();
?>
    </div>

  </div>
</div>
<div class="col-md-2 bg-secondary p-0">
<ul class="navbar-nav me-auto center">
    <li class="nav-item bg-info">
<a href="#" class="nav-link text-ligth"><h4>Delivery Brands</h4></a>
</li>
<?php
getbrands();
?>
</div>
</div>
</div>
    <ul class="nabar-nav me-auto">
    <li class="nav-item">
         <a class="nav-link" href="#"><h1>categories</h1></a>
       </li>
       <?php
getcategories();


?>
    </ul>
   </div>
      <!-- <div class="bg- p-3 text-center text-ligth">
       <p>all rigth reserved Designed by Mohamd-2024</p>
    </div> -->
    <?php 
    include("footer.php");
    ?>
</form>
           </div>
       </div>
   </nav> 
 </div>
</body>
</html>