<?php
include('includes/connect.php');

function getproducts()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM products order by rand() LIMIT 0,8";
            $result_query = mysqli_query($con, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $products_title = $row['products_title'];
                    $product_description = $row['product_description'];
                    $product_keywords = $row['product_keywords'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['prodcuct_image1']; // Fixed typo here
                   
                    $product_price= $row['product_price'];
                    $purchasing_price  = $row['purchasing_price'];
                
                    // Display product information here
                    echo "
        <div class='col-md-3 mb-2'><div class='card'
         style='width: 17rem;'>
    
      <img src=    './Admin-erea/product_images/$product_image1'  class='card-img-top'>
    
      <div class='card-body'>
        <h5 class='card-title'> $products_title</h5>
         <p class='card-text'>  $product_description</p>
        <p class='card-text'>price:$product_price$</p>
      
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add To cart</a>
      </div>
    </div></div>";
                }
            }
        }
   }
    function get_all_products(){
        global $con;
        if (!isset($_GET['category']) && !isset($_GET['brand'])) {
            $select_query = "SELECT * FROM products ORDER BY RAND()";
            $result_query = mysqli_query($con, $select_query);
            if (!$result_query) {
                // Error handling for query execution failure
                echo "Error: " . mysqli_error($con);
                return;
            }
            
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $products_title = $row['products_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $product_image1 = $row['prodcuct_image1']; // Fixed typo here
             
                $product_price= $row['product_price'];
                $purchasing_price  = $row['purchasing_price'];
                $quantities= $row['quantities'];
                // Display product information here
                echo "
    <div class='col-md-3 mb-2'><div class='card'
     style='width: 17rem;'>

  <img src=    './Admin-erea/product_images/$product_image1'  class='card-img-top'>

  <div class='card-body'>
    <h5 class='card-title'> $products_title</h5>
     <p class='card-text'>  $product_description</p>
    <p class='card-text'>price:$product_price $</p>
    

    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To cart</a>
  </div>
</div></div>";
            }
        }
    }
    

function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];

        $select_query = "SELECT * FROM products where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);//?
        if ($num_of_rows == 0) {
            echo "<div style='text-align: center; background-color: white; padding: 10px; margin-top: 20px;'>
            <h2 style='color: red;'>No stock for this categories</h2>
        </div>";          }


        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $products_title = $row['products_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $product_image1 = $row['prodcuct_image1']; // Fixed typo here
          
            $product_price= $row['product_price'];
            $purchasing_price  = $row['purchasing_price'];
            $quantities= $row['quantities'];
            // Display product information here
            echo "
<div class='col-md-3 mb-2'><div class='card'
 style='width: 17rem;'>

<img src=    './Admin-erea/product_images/$product_image1'  class='card-img-top'>

<div class='card-body'>
<h5 class='card-title'> $products_title</h5>
<p class='card-text'>  $product_description</p>
<p class='card-text'>price:$product_price $</p>


<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To cart</a>
</div>
</div></div>";
        }
    }
}




function get_unique_brands()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];

        $select_query = "SELECT * FROM products where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<div style='text-align: center; background-color: white; padding: 10px; margin-top: 20px;'>
            <h2 style='color: red;'>No stock for this brand</h2>
        </div>";        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $products_title = $row['products_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $product_image1 = $row['prodcuct_image1']; // Fixed typo here
           
            $product_price= $row['product_price'];
            $purchasing_price  = $row['purchasing_price'];
            $quantities= $row['quantities'];
            // Display product information here
            echo "
<div class='col-md-3 mb-2'><div class='card'
 style='width: 18rem;'>

<img src=    './Admin-erea/product_images/$product_image1'  class='card-img-top'>

<div class='card-body'>
<h5 class='card-title'> $products_title</h5>
<p class='card-text'>  $product_description</p>
<p class='card-text'>price:$product_price $</p>


<a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To cart</a>
</div>
</div></div>";
        }
    }
}








function getbrands()
{
    global $con;
    $select_brands = "Select * from brands";
    $result_brands = mysqli_query($con, $select_brands);
    $row_data = mysqli_fetch_assoc($result_brands);

    while ($row_data = mysqli_fetch_assoc(($result_brands))) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo  "<li class='nav-item text-light'>
        <a href='index.php?brand=$brand_id' class='nav-link text-ligth'><h4></h4> $brand_title</a>
        </li>";
    }
}
function getcategories()
{
    global $con;
    $select_categories = "Select * from categories";
    $result_categories = mysqli_query($con, $select_categories);
    //$row_data=mysqli_fetch_assoc($result_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo  "<li class='nav-item text-light'>
    <a href='index.php?category=$category_id' class=nav-link text-light'><h4> </h4> $category_title</a>
    </li>";
    }
}


function search_product(){
    global $con;
    if(isset($_GET['search_data'])){
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $products_title = $row['products_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
    //   $product_brand =  $row['product_brand'];   
            $product_price= $row['product_price'];

            $category_id = $row['category_id'];
           $prodcuct_image1 = $row['prodcuct_image1']; // Fixed typo here
        //     $product_image2 = $row['prodcuct_image2']; // Fixed typo here
        //   $product_image3 = $row['prodcuct_image3']; // Fixed typo here

            // Display product information here
            echo "
            <div class='col-md-3 mb-2'><div class='card' style='width: 18rem;'>
                <img src='./Admin-erea/product_images/$prodcuct_image1' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>$products_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>price:$product_price</p>

                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To cart</a>
                    </div>
            </div></div>";
        }
    }
}
// function view_details(){
//     global $con;
//     if(isset($_GET['product_id'])){
//         if (!isset($_GET['category'])) {
//             if (!isset($_GET['brand'])) {
//                 $product_id = $_GET['product_id'];

//                 // Execute the SQL query
//                 $select_query = "SELECT * FROM products WHERE product_id = '$product_id'";
//                 $result_query = mysqli_query($con, $select_query);

//                 // Check if the query executed successfully
//                 if ($result_query) {
//                     // Check if any rows were returned
//                     if (mysqli_num_rows($result_query) > 0) {
//                         while ($row = mysqli_fetch_assoc($result_query)) {
//                             $product_id = $row['product_id'];
//                             $products_title = $row['products_title'];
//                             $product_description = $row['product_description'];
//                             $product_keywords = $row['product_keywords'];
//                             $category_id = $row['category_id'];
//                             $prodcuct_image1 = isset($row['prodcuct_image1']) ? $row['product_image1'] : '';
//                             $product_image2 = isset($row['product_image2']) ? $row['product_image2'] : '';
//                             $product_image3 = isset($row['product_image3']) ? $row['product_image3'] : '';
//                             $product_brand = isset($row['product_brand']) ? $row['product_brand'] : '';
//                             $prodcuct_price= $row['prodcuct_price'];

//                             // Display product information
//                             echo "
//                             <div class='col-md-4 mb-2'>
//                                 <div class='card' style='width: 18rem;'>
//                                     <img src='./Admin-erea/product_images/$prodcuct_image1' class='card-img-top'>
//                                     <div class='card-body'>
//                                         <h5 class='card-title'>$products_title</h5>
//                                         <p class='card-text'>$product_description</p>
//                                         <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To cart</a>
//                                         <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
//                                 </div>
//                             </div>";

//                             // Display related product images
//                             echo "
//                             <div class='col-md-8'>
//                                 <div class='row'>
//                                     <div class='col-md-12'>
//                                         <h4 class='text-center text-info mb-5'>Related Products</h4>
//                                     </div>
//                                     <div class='col-md-4'>
//                                         <img src='omar.jpeg' class='card-img-top' alt='$products_title'>
//                                     </div>
//                                     <div class='col-md-4'>
//                                         <img src='./Admin-erea/product_images/$product_image3' class='card-img-top' alt='$products_title'>
//                                     </div>
//                                 </div>
//                             </div>";
//                         }
//                     } else {
//                         echo "No product found with the given ID.";
//                     }
//                 } else {
//                     // Handle error if query fails
//                     echo "Error: " . mysqli_error($con);

//                 }}}}}

                function getIPAddress() {  
                    //whether ip is from the share internet  
                     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                                $ip = $_SERVER['HTTP_CLIENT_IP'];  
                        }  
                    //whether ip is from the proxy  
                    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
                     }  
                //whether ip is from the remote address  
                    else{  
                             $ip = $_SERVER['REMOTE_ADDR'];  
                     }  
                     return $ip;  
                }  
                // $ip = getIPAddress();  
                // echo 'User Real IP Address - '.$ip;  

                function cart(){
                    if(isset($_GET['add_to_cart'])) {
                        global $con;
                        // Assuming you have a function named getIPAddress() defined somewhere in your code
                        $get_ip_add = getIPAddress();  
                        $get_product_id = $_GET['add_to_cart'];
                        
                        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
                        $result_query = mysqli_query($con, $select_query);
                        $num_of_rows = mysqli_num_rows($result_query);
                        
                        if ($num_of_rows > 0) {
                            echo "<script>alert('This item is already present in the cart')</script>";
                            echo "<script>window.open('index.php','_self')</script>";
                        } else {
                            // Using prepared statement to prevent SQL injection
                            $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES (?, ?, 0)";
                            $stmt = mysqli_prepare($con, $insert_query);
                            mysqli_stmt_bind_param($stmt, "is", $get_product_id, $get_ip_add);
                            $result_query = mysqli_stmt_execute($stmt);
                            echo "<script>alert(' item is added to the cart')</script>";
                            echo "<script>window.open('index.php','_self')</script>";
                            if($result_query) {
                                echo "<script>window.open('index.php','_self')</script>";
                            } else {
                                echo "<script>alert('Failed to add item to cart')</script>";
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                            mysqli_stmt_close($stmt);

                        }

                    }
                }

                function cart_item(){
                    if(isset($_GET['add_to_cart'])) {
                        global $con;
                        // Assuming you have a function named getIPAddress() defined somewhere in your code
                        $get_ip_add = getIPAddress();    
                        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'
                         ";
                        $result_query = mysqli_query($con, $select_query);
                        $count_cart_items = mysqli_num_rows($result_query);

                        } else {
                            global $con;
                            $get_ip_add = getIPAddress();    
                            $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'  ";
                            $result_query = mysqli_query($con, $select_query);
                            $count_cart_items = mysqli_num_rows($result_query);
                            } 
                            echo $count_cart_items;
                        }
                        function totale_cart_price() {
                            global $con;
                        
                            // Retrieve the IP address of the user
                            $get_ip_add = getIPAddress();
                        
                            // Initialize total price
                            $total_price = 0;
                        
                            // Construct the SQL query to select cart details for the given IP address
                            $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
                        
                            // Execute the SQL query
                            $result_query = mysqli_query($con, $cart_query);
                        
                            // Iterate over the rows in the result set
                            while ($row = mysqli_fetch_assoc($result_query)) {
                                // Retrieve the product_id from the cart_details table
                                $product_id = $row['product_id'];
                        
                                // Construct the SQL query to select product price based on product_id
                                $select_product = "SELECT product_price FROM products WHERE product_id='$product_id'";
                                $result_product_query = mysqli_query($con, $select_product);
                        
                                // Check if the product exists
                                if (mysqli_num_rows($result_product_query) > 0) {
                                    $row_product_price = mysqli_fetch_assoc($result_product_query);
                                    $product_price = $row_product_price['product_price'];
                             
                                    // Add the product price to the total price
                                  
                                    $total_price += $product_price;
                                }
                            }
                        
                            // Return the total price
                            echo $total_price;
                        }
                        

                   
                        function get_user_order(){  
                            global $con;
                            $user_username = $_SESSION['username']; 
                            $get_details = "SELECT * FROM user_table WHERE user_name='$user_username'";
                            $result_query = mysqli_query($con, $get_details);
                            while ($row = mysqli_fetch_array($result_query)){
                                $user_id = $row['user_id'];
                                // Check if 'edit_account' GET parameter is not set
                                if (!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete'])) {
                                    $get_orders = "SELECT * FROM user_orders WHERE user_id=$user_id AND order_status='pending'";
                                    $result_orders_query = mysqli_query($con, $get_orders);
                                    $row_count = mysqli_num_rows($result_orders_query);
                                    if ($row_count > 0) {
                                        echo "<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span>  orders</h3>";
                                        echo "<p class='text-center'><a href='profile.php?my_order' class='text-dark'>Order details</a></p>";
                                    } else {
                                        echo "<div class='text-center'>";
                                        echo "<h3 class='text-dark my-5'>You have zero orders</h3>";
                                        echo "<p class='text-center'><a href='./index.php' class='text-dark'>Explore</a></p>";
                                        echo "</div>";
                                    }
                                }
                            }
                        }     
                        

                  
                ?>
                

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <style>
        /* Card styling */
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            /* Adjust as needed */
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .btn {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            margin-right: 10px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        /* Column layout */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0 -15px;
            /* Adjust margin as needed */
        }

        .col-md-4 {
            flex: 0 0 calc(33.333% - 30px);
            /* Adjust width as needed */
            max-width: calc(33.333% - 30px);
            /* Adjust width as needed */
            margin: 0 15px;
            /* Adjust margin as needed */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-md-4 {
                flex: 0 0 calc(50% - 30px);
                max-width: calc(50% - 30px);
            }
        }

        @media (max-width: 576px) {
            .col-md-4 {
                flex: 0 0 calc(100% - 30px);
                max-width: calc(100% - 30px);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
        </div>
    </div>
    <?php     ?>