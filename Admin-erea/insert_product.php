<?php
include('includes/connect.php');

if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
  //$product_brand==''|| 
    $product_price = $_POST['product_price'];
    $purchasing_price= $_POST['purchasing_price'];
    $quantities= $_POST['quantities'];
    $number_allowed= $_POST['number_allowed'];
    $product_status = 'true';

    // Access images
    $product_image1 = $_FILES['product_image1']['name'];
   

    // Access temporary images
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
   

    // Check if all required fields are filled
    if($product_title == '' || $product_description == '' || $product_keyword == '' || 
       $product_category == '' ||  $product_price == '' ||
       $product_image1 == '' || $purchasing_price== ''||$quantities== ''||$number_allowed== '') {
        echo "<script>alert('Please fill all the available fields');</script>";
        exit();
    } else {
        // Move uploaded images to the product_images directory
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
      

        // Prepare and execute the insert query(database)
        $insert_products = "INSERT INTO products (products_title, product_description, product_keywords, 
        category_id,  prodcuct_image1, product_price, Date, status, brand_id,purchasing_price,quantities,number_allowed) 
        VALUES ('$product_title', '$product_description', '$product_keyword',
         '$product_category', '$product_image1',  '$product_price', NOW(), '$product_status','$product_brand','$purchasing_price','$quantities','$number_allowed')";
        $result_query = mysqli_query($con, $insert_products);

        if($result_query) {
            echo "<script>alert('Product inserted successfully');</script>";
        } else {
            echo "<script>alert('Failed to insert product');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="pharmacy.css">
    <style>
        body {
            background-color:#f2f2f2;
           
        }

        /* Hover style for form inputs */
        .form-group input[type="text"]:hover,
        .form-group textarea:hover,
        .form-group select:hover {
            background-color: #fff;
            color: #000;
        }

        /* Hover style for submit button */
        .form-group button:hover {
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add Medicans</h1>
        <form action method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="product_title" class="form-label">Product Title</label>
                        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
                    </div>

                    <!-- <div class="form-group mb-4">
                        <label for="product_brand" class="form-label">Product brand</label>
                        <input type="text" name="product_brand" id="product_brand" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
                    </div> -->
                    <div class="form-group mb-4">
                        <label for="product_description" class="form-label">Product Description</label>
                        <textarea name="product_description" id="product_description" class="form-control" rows="4" placeholder="Enter product description" required="required"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_keyword" class="form-label">Product keyword</label>
                        <textarea name="product_keyword" id="product_keyword" class="form-control" rows="4" placeholder="Enter product keyword" required="required"></textarea>
                    </div>


<!-- 
                 <div class="form-group mb-4">
                        <label for="product_category" class="form-label">Product Category</label>
                        <select name="product_category" id="product_category" class="form-select">
                            <option value="panadol">Panadol</option>
                             <option value="otrivine">Otrivine</option>
                            <option value="paracetamol">Paracetamol</option>
                            <option value="maxi-d">Maxi-D</option>
                            <option value="feroxyl">FEROXYL</option>
                            <option value="feroyl">FEROYL</option> 
                            <?php
// $select_brands="SELECT * FROM brands";
// $result_query=mysqli_query($con,$select_query);
// $row_data=mysqli_fetch_assoc($result_brands);

// while($row_data=mysqli_fetch_assoc(( $result_query)) ){
//   $brand_title=$row_data['brand_title'];
//   $brand_id=$row_data['brand_id'];
//   echo       "<option value='$brand_title'>$brand_title</option>";
// }
?>
                        </select>
                    </div> -->


                    <div class="form-group mb-4">
    <label for="product_category" class="form-label">Product Category</label>
    <select name="product_category" id="product_category" class="form-select">
        <!-- Add a default option -->
        <option value="">Select Category</option>

        <?php
        // Fetch categories from the database
        $select_categories = "SELECT * FROM categories";
        $result_categories = mysqli_query($con, $select_categories);

        // Loop through the fetched categories and populate the select menu
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        }
        ?>
    </select>
</div>

<div class="form-group mb-4">
    <label for="product_brand" class="form-label">Product Brand</label>
    <select name="product_brand" id="product_brand" class="form-select">
        <!-- Add a default option -->
        <option value="">Select Brand</option>

        <?php
        // Fetch brands from the database
        $select_brands = "SELECT * FROM brands";
        $result_brands = mysqli_query($con, $select_brands);

        // Loop through the fetched brands and populate the select menu
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>";
        }
        ?>
    </select>
</div>

                            <!-- <option value="otrivine">ghasool</option>
                            <option value="paracetamol">salr</option>
                            <option value="maxi-d">Maxi-D</option>
                            <option value="feroxyl">FEROXYL</option>
                            <option value="feroyl">Happis</option> -->
                        </select>
                    </div>



                    <div class="form-group mb-4">
                        <label for="product_image1" class="form-label">Product Image</label>
                        <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                    </div>

                    
                   

                    <div class="form-group mb-4">
                        <label for="product_price" class="form-price">Product price</label>
                        <textarea name="product_price" id="product_label" class="form-control" rows="4" placeholder="product_price" required="required"></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="purchasing_price" class="form-price">purchasing_price</label>
                        <textarea name="purchasing_price" id="product_label" class="form-control" rows="5" placeholder="Enter  purchasing_price" required="required"></textarea>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="quantities" class="form-price"> Quantity</label>
                        <textarea name="quantities" id="product_label" class="form-control" rows="5" placeholder=" select quantities" required="required"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="number_allowed" class="form-price"> number_allowed</label>
                        <textarea name="number_allowed" id="number_allowed" class="form-control" rows="5" placeholder=" select the  number allowed" required="required"></textarea>
                    </div>
                 
                    <div class="form-group mb-4">
                        <input type="submit" class="btn btn-primary" name="insert_product" class="btn btn-info mb-3 px-3" value="insert product">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0s5Pmo8Cd3Y7fwhBPFR2f4pttng/jW3R3tdKdEjF8gFoaoaN2tHJq9cCk5xIM+IK" crossorigin="anonymous"></script>
</body>

</html>