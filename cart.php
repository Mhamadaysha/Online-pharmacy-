<?php  
include('includes/connect.php');
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
         <a class="nav-link" href="./Admin-erea/user-erea/user_registration.php">Registre</a>
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
         ?></sup></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Total price: <?php totale_cart_price();?></a>
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
<div class="row">
      <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
        <div class="site-block-cover-content text-center">
          
          <h1 >Cart items</h1>
        
        </div>
      </div>
    </div>
<!-- 4child-->
 <div class="row">
<div class="col-md-10">
<!--product-->
    
<div class="row">

</div>
</div>
</div>
   
   </div>


<style>
    .table-bordered-hover tbody tr:hover {
        background-color: #f5f5f5;
    }

    .table-bordered-hover tbody tr td {
        border: 1px solid #dddddd;
    }
</style>

<div class="container">
    <div class="row">
        <table class="table table-bordered-hover text-center">
      
           <?php 


global $con;
$get_ip_add = getIPAddress();
$total_price = 0;

// Query to select cart items
$cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
$result_query = mysqli_query($con, $cart_query);
$result_count = mysqli_num_rows($result_query);

if ($result_count >0) {
    echo "
    <thead>
        <tr>
            <th>Title</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
            <th>Operation</th>
            <th>prescreption</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>";

}
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $select_product = "SELECT product_price, products_title, prodcuct_image1,number_allowed FROM products WHERE product_id='$product_id'";
    $result_product_query = mysqli_query($con, $select_product);

    // Check if the product exists
    if (mysqli_num_rows($result_product_query) > 0) {
        $row_product_price = mysqli_fetch_assoc($result_product_query);
        // Retrieve product price
        $product_price = $row_product_price['product_price'];

        $products_title =  $row_product_price['products_title'];
        $prodcuct_image1 =  $row_product_price['prodcuct_image1'];
        $number_allowed=$row_product_price['number_allowed'];

        // Add the product price to the total price
        $total_price += $product_price ;



?>
<form method="post">
    <td><?php echo $products_title ?> </td>
    <td>
    <input type="number" name="qty" min="1" max="<?php echo $number_allowed; ?>"> Max: <?php echo $number_allowed; ?>
    </td>
    <?php 
    $get_ip_add = getIPAddress();

    if(isset($_POST['update_cart'])){
        $quantities = $_POST['qty'];
        // Assuming $con is your database connection object
        $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add'";
        $result_product_quantity = mysqli_query($con, $update_cart);
        // Assuming $total_price is defined somewhere in your code
        $total_price = $total_price * $quantities;
    }
    ?>
    <td><?php echo $product_price ?></td>
    <td>
  <input type="checkbox" name="remove_item[]" value="<?php echo $product_id; ?>" aria-value="<?php echo $product_id; ?>">
</td>
<td>
  <input type="submit" value="Update Cart" class="btn btn-info" name="update_cart">
  <input type="submit" value="Remove" class="btn btn-danger" name="remove_cart">
</td>
    <td>
    <a href="./file-erea/index.php" class="btn btn-info">Upload file</a>
</td>

    <td>
    <?php
    $sql = "SELECT status FROM files WHERE product_id = $product_id";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        // Output status for the specified product ID
        while($row = $result->fetch_assoc()) {
            echo  $row["status"];
        }
    } else {
        echo "No prescription found for Product ID $product_id";
    }
?>
    
</td>
</form>

<script>
    // JavaScript function to restrict input to a maximum of 3
    document.querySelector('input[name="qty"]').addEventListener('input', function() {
        if (this.value > 3) {
            this.value = 3;
        }
    });
</script>




                </tr>
                </form>

                <!-- <tr>
                    <td ><img src="product_images"><?php echo   $prodcuct_image1?> </td>
                    <td><input type="text"></input></td>
                    <td><?php echo   $product_price ?> </td>
         <td><input type="checkbox"></td>
                    <td><button class="btn btn-primary">Edit</button><button class="btn btn-primary" style="background-color: red;">Remove</button></td>
                </tr> -->
             <!-- Add more rows as needed -->
             <?php    }
} ?>
                </tbody>
        
            </table>
    </div>
</div>


      <!-- <div class="bg- p-3 text-center text-ligth">
       <p>all rigth reserved Designed by Mohamd-2024</p>
    </div> -->
    
</form>
           </div>
       </div>
       <h4 class="px-3 my-3">Subtotale:<strong class="text-info"><?php echo $total_price  ?></strong> $</h4>
                
    <a href="index.php"><button class="btn btn-outline-info ">continue shopping</button></a>
    <?php
$sql = "SELECT status FROM files WHERE product_id = $product_id";
$result = $con->query($sql);

// Check if the query executed successfully
if ($result) {
    // Fetch the status valueS
    $row = $result->fetch_assoc();

    // Check if $row is not null before accessing its elements
    if ($row !== null && isset($row["status"])) {
        $status = $row["status"];

        // Check the status and render the button accordingly
        if ($status == "Accepted") {
            echo '<a href="checkout.php"><button class="btn btn-outline-info">Checkout</button></a>';
        } else {
            echo '<button class="btn btn-outline-info" disabled>Checkout</button>';
        }
    } else {
        // Handle the case where the row is null or status is not set
        echo "No prescription found for this product.";
    }
} else {
    // Handle the case where the query failed
    echo "Error fetching status";
}
?>

<?php

// Function to remove selected items from cart
function remove_cart_items() {
  global $con; // Assuming $con holds your database connection

  // Check if "remove_cart" button is submitted
  if (isset($_POST['remove_cart'])) {

    // Check if any items are selected for removal
    if (isset($_POST['remove_item']) && is_array($_POST['remove_item'])) {
      $selected_items = $_POST['remove_item']; // Get the array of selected item IDs

      $delete_query = "DELETE FROM cart_details WHERE product_id IN (" . implode(',', $selected_items) . ")";

      // Prepare the query to prevent SQL injection (recommended)
      $stmt = mysqli_prepare($con, $delete_query);
      if ($stmt) {
        mysqli_stmt_execute($stmt); // Execute the prepared statement
        mysqli_stmt_close($stmt); // Close the statement
        echo "<script>window.open('cart.php','_self')</script>"; // Redirect to cart page
      } else {
        echo "Error preparing statement: " . mysqli_error($con); // Handle error
      }
    } else {
      echo "No items selected for removal."; // Inform user if no items were selected
    }
  }
}

// Call the function to process removal (assuming it's called from your cart page)
remove_cart_items();

?>



    <!-- <a href=""><button>Checkout</button></a> -->
    <style>.red-background {
        background-color: red;}
    </style>
    <?php 
    include("Admin-erea/footer.php");
    ?>
    </div>
   </nav> 
 </div>
 
</body>
</html>