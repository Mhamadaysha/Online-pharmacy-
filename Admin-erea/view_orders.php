<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" />

    <!-- Custom CSS for table -->
    <style>
    .table-striped tbody tr:nth-child(odd) {
      background-color: #f5f5f5; /* Light gray for odd rows */
    }

    .edit-icon, .delete-icon {
      transition: transform 0.2s ease-in-out; /* Add hover animation */
    }

    .edit-icon:hover, .delete-icon:hover {
      transform: scale(1.1); /* Scale icons slightly on hover */
    }
  </style>
</head>
<body>
</br>
    <h1 class="text-center text-info">All Orders</h1>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead class="bg-info">
            <tr>
                <th scope="col">S1</th>
                <th scope="col">DUE Amount</th>
                <th scope="col">invoice number</th>
                <th scope="col">Total product</th>
                <th scope="col">Orders Date</th>
                
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Assuming $con is a valid mysqli connection object

            $select_car = "SELECT * FROM `user_orders`";
            $result = mysqli_query($con, $select_car);

            if (!$result) {
                echo "Error fetching orders: " . mysqli_error($con);
            } else {
                $row_count = mysqli_num_rows($result);

                if ($row_count == 0) {
                    echo "<h2 class='bg-danger text-center mt-5'>No Orders yet</h2>";
                } else {
                    $number = 0;
                    while ($row_data = mysqli_fetch_assoc($result)) {
                        $order_id = htmlspecialchars($row_data['order_id']); // Escape user data
                        $user_id = htmlspecialchars($row_data['user_id']);
                        $amount_due = htmlspecialchars($row_data['amount_due']);
                        $invoice_product = htmlspecialchars($row_data['invoice_product']);
                        $total_products = htmlspecialchars($row_data['total_products']);
                        $order_date = htmlspecialchars($row_data['order_date']);
                        $order_status = htmlspecialchars($row_data['order_status']);

                        echo "<tr>
                                <td>$order_id</td>
                                <td>$amount_due</td>
                                <td> $invoice_product</td>
                                <td>$total_products</td>
                                <td>$order_date</td>
                                
                                <td>
                                    <a href='index.php?delete_order=$order_id' class='text-light delete-icon' data-toggle='modal' data-target='#exampleModal'>
                                        <i class='fas fa-trash' style='font-size: 24px; color: red;'></i>
                                    </a>
                                </td>
                            </tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Are you sure you Want to delete this?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href='index.php?Delete_brand' class='btn btn-danger'>Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome Kit -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit-code.js" crossorigin="anonymous"></script>
</body>
</html>
