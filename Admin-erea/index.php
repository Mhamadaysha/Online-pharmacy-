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
    <title>Document</title>
    <link rel="stylesheet" href="pharmacy.css">
    <style>
          .admin {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin: 10px auto;
            display: block;
        }

        /* Navbar styles */
        .navbar {
            background-color: #17a2b8;
        }

        .navbar .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #f8f9fa;
            text-decoration: underline;
        }

        /* Button styles */
        .button {
            text-align: center;
            margin-top: 20px;
        }

        .button button {
            background-color: #17a2b8;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button button:hover {
            background-color: #138496;
        }


    </style>

    <!--bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../pharmacy.css">
     <!--font awesome link-->

     <link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
   crossorigin="anonymous" 
   referrerpolicy="no-referrer" />
  

<body>


    <div class="Container-fluid/>

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
   <h1 class="text-center p-2">Admin Pharamcy</h1>
    
   </div>
 </div>
</nav>

  <!--last child -->
       
        <!--third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1">
                <div>
                  
                    <p class="text-ligth text-center"></p>
                    <div class="button text-center">
                    <a href="index.php?view_products" class="btn btn-info text-light my-1">View Products</a>
                        <a href="index.php?insert_category" class="btn btn-info text-light my-1">Insert Category</a>
                        <a href="index.php?view_orders" class="btn btn-info text-light my-1">View Orders</a>
                        <a href="index.php?view_Categories" class="btn btn-info text-light my-1">view Categories</a>
                         <a href="index.php?view_Brands" class="btn btn-info text-light my-1">view Brands</a>
                        <a href="index.php?insert_brand" class="btn btn-info text-light my-1">Insert Brand</a>
                        <a href="index.php?insert_product" class="btn btn-info text-light my-1">Insert Product</a>
                       
                        <a href="index.php?list_users" class="btn btn-info text-light my-1">List Users</a>
                        <a href="" class="btn btn-info text-light my-1">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--4 child -->
<div class="container">
    <?php 
    if(isset($_GET['insert_category'])){
      include('insert_categories.php');
    }
  
    if(isset($_GET['insert_brand'])){
      include('insert_brandes.php');
    }
    if(isset($_GET['view_products'])){
        include('view_products.php');
      }
    
    if(isset($_GET['insert_product'])){
        include('insert_product.php');
    }
    if(isset($_GET['edit_products'])){
        include('edit_products.php');
      } if(isset($_GET['delete'])){
        include('delete.php');
      }
      if(isset($_GET['list_users'])){
        include('list_users.php');
      }
      
  

    if(isset($_GET['view_Brands'])){
        include('view_Brands.php');
    }

    
    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    }

    if(isset($_GET['Delete_category'])){
        include('Delete_category.php');
    }

    if(isset($_GET['edit_brand'])){
        include('edit_brand.php');
    }
    
    if(isset($_GET['Delete_brand'])){
        include('Delete_brand.php');
    }

    if(isset($_GET['view_Categories'])){
        include('view_Categories.php');
    }

    if(isset($_GET['view_orders'])){
        include('view_orders.php');
    }

    if(isset($_GET['my_payment'])){
        include('my_payment.php');
    }


    if(isset($_GET['delete_order'])){
        include('delete_order.php');
    }
 
 ?>
    
</div>


</body>

</html>