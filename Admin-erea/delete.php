

<?php if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $delete_query = "DELETE FROM products WHERE product_id=' $delete_id'";
    $result = mysqli_query($con, $delete_query);

    if($result) {
        echo "<script>alert('Product deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete product');</script>";
    }

    echo "<script>window.location.href = 'index.php?view_products';</script>";
}?>
