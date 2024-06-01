<?php
include('Admin-erea/includes/connect.php');

session_start();

if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];

  $select_data = "SELECT * FROM `user_orders` WHERE order_id='$order_id'";
  $result = mysqli_query($con, $select_data);

  // Check if there are any rows returned
  if (mysqli_num_rows($result) > 0) {
    $row_data = mysqli_fetch_assoc($result);
    $invoice_product = $row_data['invoice_product'];
    $amount_due = $row_data['amount_due'];
  } else {
    echo "No data found for the specified order ID.";
    // Optionally, you can redirect to a different page here
  }
}

if (isset($_POST['confirm-payment'])) {
  $invoice_nb = $_POST['invoice_nb']; // Assuming the form field name is "invoice_product"
  // $order_id = $_POST['order_id']; // This line is commented out because you're already getting $order_id from $_GET

  $amount = $_POST['amount'];
  $payment_mode = $_POST['payment_mode'];

  // Ensure proper concatenation of values into the SQL query
  $insert_query = "INSERT INTO `user_paymnets`(order_id,invoice_product,amount_due,payment_mode) 
                   VALUES ('$order_id','$invoice_nb','$amount','$payment_mode')";
  $result = mysqli_query($con, $insert_query);
  if ($result) {
    echo "<h3 class='text center text-light'>Successfully</h3>";
  }
}

mysqli_close($con); // Close the database connection
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-secondary">
    <div class="container m-5">
        <h1>Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_nb" placeholder="Enter Invoice Number">
            </div>  
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="amount" placeholder="Enter Amount">
            </div> 
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="Paymnet_mode" placeholder="Enter Payment Mode">
            </div> 
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-control w-50 m-auto">
                    <option>Select payment</option>
                    <option>UPI</option>
                    <option>NETBANKING</option>
                    <option>paybal</option>
                    <option>cash on delivery</option>
                </select>
            </div> 
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm-payment"> 
            </div>    
        </form>
    </div>
</body>
</html>
