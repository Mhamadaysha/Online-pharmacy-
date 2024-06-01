<?php
//session_start();

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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Head content -->
</head>
<body>
    <!-- HTML content -->
    <div class="container">
        <!-- Table content -->
        <table class="table table-striped table-dark">
            <!-- Table headings -->
            <thead>
                <tr>
                    
                    <th>Orders numbers</th>
                    <td> invoice number</td>
                    <td>Amount Due</td>
                    <th>Total Products</th>
                    <th>Date </th>
                   
                    <!-- <th>Action</th> -->
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
                    $invoice_product= $row_data['invoice_product'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $amount_due = $row_data['amount_due'];
                    $order_status = $row_data['order_status'];

                    // Display order details in table rows
                    echo "<tr>
                           
                            <td>$number</td>
                            <td> $invoice_product</td>
                            <td>$amount_due $</td>
                            <td>$total_products</td>
                            <td>$order_date</td>
                          
                          </tr>";
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional) -->
</body>
</html>
