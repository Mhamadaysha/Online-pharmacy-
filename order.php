<?php  
include('Admin-erea/includes/connect.php');
include('Admin-erea/common_function.php');
session_start();
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Get the user's IP address
    $get_ip_add = getIPAddress();
    $total_price = 0;

    // Query to select items in the user's cart based on their IP address
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result_cart_price = mysqli_query($con, $cart_query);

    // Check if cart query is successful
    if (!$result_cart_price) {
        die("Cart query failed: " . mysqli_error($con));
    }

    // Generate a random invoice number
    $invoice_number = mt_rand();
    $status = 'pending';

    // Count the number of products in the cart
    $count_product = mysqli_num_rows($result_cart_price);

    // Loop through each item in the cart to calculate total price and update product quantities
    while ($row_price = mysqli_fetch_assoc($result_cart_price)) {
        $product_id = $row_price['product_id'];
        $quantity = $row_price['quantity']; // Get the quantity of the product being purchased

        // Fetch product details
        $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
        $run_price = mysqli_query($con, $select_product);

        // Check if product query is successful
        if (!$run_price) {
            die("Product query failed: " . mysqli_error($con));
        }

        // Fetch product price and calculate total price
        while ($row_product_price = mysqli_fetch_array($run_price)) {
            $product_price = $row_product_price['product_price'];
            $total_price += $product_price * $quantity; // Calculate total price based on quantity
        }

        // Fetch the current quantity of the product
        $sql = "SELECT quantities FROM products WHERE product_id = $product_id";
        $result = mysqli_query($con, $sql);

        // Check if quantity query is successful
        if (!$result) {
            die("Quantity query failed: " . mysqli_error($con));
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $current_quantity = $row["quantities"];

            // Calculate the new quantity
            $new_quantity = $current_quantity - $quantity; // Decrease the quantity by the purchased amount

            // Update the product quantity in the database
            $update_sql = "UPDATE products SET quantities = $new_quantity WHERE product_id = $product_id";
            if (mysqli_query($con, $update_sql) === true) {
                echo "Product quantity updated successfully for product ID: $product_id.<br>";
            } else {
                echo "Error updating product quantity for product ID: $product_id: " . mysqli_error($con) . "<br>";
            }
        } else {
            echo "Product not found for product ID: $product_id.<br>";
        }
    }

    // Insert order details into the user_orders table
    $subtotal = $total_price; // Total price already considers quantity
    $insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_product, total_products, order_date, order_status) 
                      VALUES ('$user_id', '$subtotal', '$invoice_number', '$count_product', NOW(), '$status')";
    $result_query = mysqli_query($con, $insert_orders);

    if ($result_query) {
        echo "<script>alert('Order submitted successfully!')</script>";
        echo "<script>window.open('delevery.php','_self')</script>";
    } else {
        echo "Error submitting order: " . mysqli_error($con);
    }
}
?>
