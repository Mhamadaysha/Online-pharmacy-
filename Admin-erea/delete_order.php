<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
if(isset($_GET['delete_order'])) {
    $Delete_Ordres = $_GET['delete_order'];

    // Correcting mthe deletion query
    $delete_query = "DELETE FROM user_orders WHERE order_id = '$Delete_Ordres'";
    $result = mysqli_query($con, $delete_query);

    if($result) {
        echo "<script>alert('Order deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete order');</script>";
    }

    echo "<script>window.location.href ='index.php?view_orders';</script>";
}
?>

</body>
</html>
