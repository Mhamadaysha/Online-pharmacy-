
</br>
<h1 class="text-center text-info">All Payment</h1>
<table class="table table-striped table-bordered table-hover text-center">
  <thead class="bg-info">
    <tr>
      <th scope="col">S1</th>
      <th scope="col">DUE Amount</th>
      <th scope="col">Invoice nb</th>
      <th scope="col">Totale product</th>
      <th scope="col">Orders Date</th>
      <th scope="col">Status</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
    // Assuming $con is a valid mysqli connection object

    $select_car = "SELECT * FROM `user_paymnets`";
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
          $payment_id = isset($row_data['payment_id']) ? htmlspecialchars($row_data['payment_id']) : '';
          $invoice_product = htmlspecialchars($row_data['invoice_product']);
          $amount_due = htmlspecialchars($row_data['amount_due']);
          $payment_mode = htmlspecialchars($row_data['payment_mode']);
          $date = htmlspecialchars($row_data['date']);

          echo "<tr>
                  <td>$order_id</td>
                  <td>$payment_id</td>
                  <td>$invoice_product</td>
                  <td>$amount_due</td>
                  <td>$payment_mode</td>
                  <td>$date</td>
                  <td><a href='delete_order.php?order_id=$order_id'>Delete</a></td> </tr>";
        }
      }
    }
  ?>
  </tbody>
</table>
