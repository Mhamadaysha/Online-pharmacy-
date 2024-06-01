<?php
include('includes/connect.php'); // Include the file with database connection details

// Check if the Delete_category parameter is set
if(isset($_GET['Delete_category'])) {
    $Delete_category = $_GET['Delete_category'];

    // Sanitize input to prevent SQL injection
    $Delete_category = mysqli_real_escape_string($con, $Delete_category);

    // Prepare the delete query
    $delete_query = "DELETE FROM categories WHERE category_id ='$Delete_category'";

    // Execute the delete query
    $result = mysqli_query($con, $delete_query);

    // Check if the query was successful and display appropriate message
    if($result) {
        echo "<script>alert('Category deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete category');</script>";
    }

    // Redirect back to index.php
    echo "<script>window.location.href = 'index.php';</script>";
}
?>
