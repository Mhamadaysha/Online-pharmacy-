<?php
session_start();

include('Admin-erea/includes/connect.php');

// Check if username is set in the session
if (isset($_SESSION['username'])) {
    $user_username = $_SESSION['username'];

    // Fetch user details
    $get_user = "SELECT * FROM `user_table` WHERE user_name='$user_username'";
    $result_query = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
} else {
    // Handle case when username is not set in session
    echo "Username not found in session.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">User Order</h1>
        <table class="table table-striped table-dark table-responsive">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Invoice Number</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                // Fetch user orders
                $get_user_details = "SELECT * FROM `user_orders` WHERE user_id='$user_id'";
                $result_orders = mysqli_query($con, $get_user_details);
                $number = 1;

                while ($row_data = mysqli_fetch_assoc($result_orders)) {
                    // Fetch order details
                    $order_id = $row_data['order_id'];
                    $invoice_product = $row_data['invoice_product'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $amount_due = $row_data['amount_due'];
                    $order_status = $row_data['order_status'];

                    // Display order details in table rows
                    echo "<tr>
                            <td>$number</td>
                            <td>$invoice_product</td>
                            <td>\$$amount_due</td>
                            <td>$total_products</td>
                            <td>$order_date</td>
                          </tr>";
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>

   </body>
</html>
