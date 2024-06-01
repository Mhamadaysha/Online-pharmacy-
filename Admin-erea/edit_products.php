<?php
include('includes/connect.php');

if (isset($_GET['edit_products'])) {
 $edit_id = $_GET['edit_products'];
  

    $get_product = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($con, $get_product);
    $row = mysqli_fetch_assoc($result);

    $products_title = isset($row['products_title']) ? $row['products_title'] : '';
    $product_description = isset($row['product_description']) ? $row['product_description'] : '';
    $product_keywords = isset($row['product_keywords']) ? $row['product_keywords'] : '';
    $category_id = isset($row['category_id']) ? $row['category_id'] : '';
    $product_image1 = isset($row['product_image1']) ? $row['product_image1'] : '';
    $product_price = isset($row['product_price']) ? $row['product_price'] : '';
    $date = isset($row['Date']) ? $row['Date'] : ''; // assuming this is a date column
    $brand_id = isset($row['brand_id']) ? $row['brand_id'] : '';
    $number_allowed= isset($row['number_allowed']) ? $row['number_allowed'] : '';

}
?>

<?php
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $purchasing_price = $_POST['purchasing_price'];
    $quantities = $_POST['quantities'];
    $number_allowed= $_POST['number_allowed'];
    $product_status = 'true';

    // Access images (check for existence before accessing)
    $product_image1 = isset($_FILES['product_image1']['name']) ? $_FILES['product_image1']['name'] : '';
   

    // Access temporary images (check for existence before accessing)
    $temp_image1 = isset($_FILES['product_image1']['tmp_name']) ? $_FILES['product_image1']['tmp_name'] : '';
   

    // Check if all required fields are filled
    if (
        $product_title == '' || $product_description == '' || $product_keyword == '' ||
        $product_category == '' || $product_price == '' ||
        $product_image1 == '' || $purchasing_price == '' || $quantities == ''|| $number_allowed == ''
    ) {
        echo "<script>alert('Please fill all the available fields');</script>";
        exit();
    } else {
        // Move uploaded images to the product_images directory
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
       

        // Prepare and execute the update query(database)
        $insert_products = "UPDATE products SET 
        products_title = '$product_title', 
        product_description = '$product_description', 
        product_keywords = '$product_keyword', 
        category_id = '$product_category', 
        prodcuct_image1 = '$product_image1', 
      
        product_price = '$product_price', 
        Date = NOW(), 
        status = '$product_status', 
        brand_id = '$product_brand',
        purchasing_price	 = '$purchasing_price', 
        quantities = '$quantities'
        number_allowed = '$number_allowed'
        WHERE product_id = $edit_id";

        $result_query = mysqli_query($con,$insert_products);

        if ($result_query) {
            echo "<script>alert('Product updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update product');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <h1 class="text-center mb-4">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="form-group mb-4">
                        <label for="product_title" class="form-label">Product Title</label>
                        <input type="text" value="<?php echo $products_title ?>" name="product_title"
                            id="product_title" class="form-control" placeholder="Enter product title"
                            autocomplete="off" required="required">
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_description" class="form-label">Product Description</label>
                        <input name="product_description" value="<?php echo $product_description ?>"
                            id="product_description" class="form-control" rows="4"
                            placeholder="Enter product description" required="required"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_keyword" class="form-label">Product keyword</label>
                        <input name="product_keyword" value="<?php echo $product_keywords ?>" id="product_keyword"
                            class="form-control" rows="4" placeholder="Enter product keyword"
                            required="required"></textarea>
                    </div>

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
                </div>

                <div class="form-group mb-4">
                    <label for="product_image1" class="form-label">Product Image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control"
                        required="required">
                </div>

               


                <div class="form-group mb-4">
                    <label for="product_price" class="form-price">Product price</label>
                    <textarea name="product_price" id="product_label" class="form-control"
                        rows="4" placeholder="product_price" required="required"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="purchasing_price" class="form-price">Purchasing price</label>
                    <input name="purchasing_price" id="purchasing_price" class="form-control"
                        rows="5" placeholder="Enter purchasing price" required="required"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="quantities" class="form-price">Quantity</label>
                    <textarea name="quantities" id="quantities" class="form-control" rows="5"
                        placeholder="Enter quantities" required="required"></textarea>
                </div>
                <div class="form-group mb-4">
                        <label for="number_allowed" class="form-price"> number_allowed</label>
                        <textarea name="number_allowed" id="number_allowed" class="form-control" rows="5" placeholder=" select the number allowed" required="required"></textarea>
                    </div>

                <div class="form-group mb-4">
                    <input type="submit" class="btn btn-primary" name="insert_product"
                        class="btn btn-info mb-3 px-3" value="Update Product"> 
                </div>
            </div>
    </div>
    </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-0s5Pmo8Cd3Y7fwhBPFR2f4pttng/jW3R3tdKdEjF8gFoaoaN2tHJq9cCk5xIM+IK"
        crossorigin="anonymous"></script>
</body>

</html>
