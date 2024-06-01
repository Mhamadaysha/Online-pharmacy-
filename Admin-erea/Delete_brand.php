<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Order</title>
</head>
<body>
<?php 
if(isset($_GET['Delete_brand'])) {
    $Delete_Ordres = $_GET['Delete_brand'];
    $brand_id = $_GET['delete_order'];
    // Correcting the deletion query
    $delete_query = "DELETE FROM brands WHERE brand_id = '$brand_id'";
    
    $result = mysqli_query($con, $delete_query);


    if($result) {
        echo "<script>alert('$Delete_Ordre');</script>";
    } else {
        echo "<script>alert('Failed to delete order');</script>";
    }

    echo "<script>window.location.href ='http://localhost/demo/admin-erea/index.php?view_Brands';</script>";
}
?>

</body>
</html>