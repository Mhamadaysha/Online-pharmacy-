<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   <!--bootsrap css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
       <!--font awesome link-->

     <link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
   crossorigin="anonymous" 
   referrerpolicy="no-referrer" />

</head>
<body>
</br>
    <h1 class="text-center text-info">All Product</h1>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead class="bg-info">
            <tr>
            <th>Product ID</th>
                <th>Product Title</th>
                <th>Description</th>
                <th>Product Keyword</th>
              

                <th>Images</th>
                <th>Price</th>

               
                <th>Edit</th>
                <th>Delete</th>

        </thead>
        <tbody class="bg-secondary text-light">
        <?php
// Make sure $con is properly initialized with database connection

$select_query = "SELECT * FROM `products`";
$result_query = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $products_title = $row['products_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
   
    $product_image1 = $row['prodcuct_image1']; // Fixed typo here
    $product_price = $row['product_price'];

    // Count pending orders for the current product
    // $get_count = "SELECT COUNT(*) AS count FROM `orders_pending` WHERE product_id = ?";
    // $stmt = mysqli_prepare($con, $get_count);
    // mysqli_stmt_bind_param($stmt, "i", $product_id);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);
    // $row_count = mysqli_fetch_assoc($result)['count'];

    // Echoing table row with product information and pending orders count
    echo "<tr>";
    echo "<td>$product_id</td>";
    echo "<td>$products_title</td>";
    echo "<td>$product_description</td>";
    echo "<td>$product_keywords</td>";
   
    echo "<td><img src='./product_images/$product_image1' width='150px' height='150px'></td>";
    echo "<td>$product_price</td>";
    echo '<td style="padding: 10px;">
            <a href="index.php?edit_products=' . $product_id . '" class="text-light">
                <i class="fas fa-pen-square" style="font-size: 36px; color: blue;"></i>
            </a>
        </td>
        <td>
        <a href="index.php?delete=' . $product_id . '" class="text-light">
        <i class="fas fa-trash" style="font-size: 24px; color: red;"></i>
    </a>
        </td>';
    echo "</tr>";
}
?>

<!-- <td> <img src='./Admin-erea/product_images/'<?php echo $prodcuct_image1;?>></td>; -->




        </tbody>
    </table>
</body>
</html>
