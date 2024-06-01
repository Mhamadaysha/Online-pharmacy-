<?php
include('includes/connect.php'); // Include the file with database connection details

// Function to sanitize input to prevent SQL injection
function sanitize_input($input) {
    global $con;
    return mysqli_real_escape_string($con, $input);
}

// Check if the edit_brand parameter is set
if(isset($_GET['edit_brand'])){
    $edit_brand = sanitize_input($_GET['edit_brand']);

    // Fetch brand details from the database
    $get_brand = "SELECT * FROM `brands` WHERE `brand_id`='$edit_brand'";
    $result = mysqli_query($con, $get_brand);

    // Check if the query was successful and fetch brand details
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $brand_title = isset($row['brand_title']) ? $row['brand_title'] : '';
        $brand_id = isset($row['brand_id']) ? $row['brand_id'] : '';

        // Display brand title in the form
        echo $brand_title;
    } else {
        // Handle error if brand is not found
        echo "<p class='text-danger'>$brand_title</p>";
        exit; // Stop script execution
    }
}

?>

<div class="container mt-3">
  <h1 class="text-center text-success mb-4">Edit Brand</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
      <label for="brand_title">Brand Title:</label>
      <input type="text" class="form-control w-100 m-auto" id="brand_title" name="brand_title" value="<?php echo $brand_title; ?>">
    </div>
    <input type="hidden" name="brand_id" value="<?php echo $brand_id; ?>"> <!-- Populate brand_id dynamically -->
    <input type="submit" value="Update" class="btn btn-success py-2 px-3 border-0" name="brand-update" id="update-btn">
  </form>
</div>

<?php
// Check if the form is submitted for brand update
if(isset($_POST['brand-update'])){
    $brand_title = sanitize_input($_POST['brand_title']);
    $brand_id = sanitize_input($_POST['brand_id']);

    // Update brand title in the database
    $update_query = "UPDATE `brands` SET `brand_title`='$brand_title' WHERE `brand_id`='$brand_id'";
    $update_result = mysqli_query($con, $update_query);

    // Check if the query was successful and provide feedback
    if($update_result){
        echo "<p class='text-success'>Brand updated successfully.</p>";
    } else {
        echo "<p class='text-danger'>Error updating brand.</p>";
    }
}
?>
