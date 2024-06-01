<?php
include('includes/connect.php'); // Include the file with database connection details

// Function to sanitize input to prevent SQL injection
function sanitize_input($input) {
    global $con;
    return mysqli_real_escape_string($con, $input);
}

// Check if the edit_category parameter is set
if(isset($_GET['edit_category'])){
    $edit_category = sanitize_input($_GET['edit_category']);

    // Fetch category details from the database
    $get_category = "SELECT * FROM `categories` WHERE `category_id`='$edit_category'";
    $result = mysqli_query($con, $get_category);

    // Check if the query was successful and fetch category details
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $category_title = isset($row['category_title']) ? $row['category_title'] : '';
        $category_id = isset($row['category_id']) ? $row['category_id'] : '';

        // Display category title in the form
        echo $category_title;
    } else {
        // Handle error if category is not found
        echo "<p class='text-danger'>Category not found.</p>";
        exit; // Stop script execution
    }
}

?>

<div class="container mt-3">
  <h1 class="text-center text-success mb-4">Edit Category</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
      <label for="category_title">Category Title:</label>
      <input type="text" class="form-control w-100 m-auto" id="category_title" name="category_title" value="<?php echo $category_title; ?>">
    </div>
    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>"> <!-- Populate category_id dynamically -->
    <input type="submit" value="Update" class="btn btn-success py-2 px-3 border-0" name="category-update" id="update-btn">
  </form>
</div>

<?php
// Check if the form is submitted for category update
if(isset($_POST['category-update'])){
    $category_title = sanitize_input($_POST['category_title']);
    $category_id = sanitize_input($_POST['category_id']);

    // Update category title in the database
    $update_query = "UPDATE `categories` SET `category_title`='$category_title' WHERE `category_id`='$category_id'";
    $update_result = mysqli_query($con, $update_query);

    // Check if the query was successful and provide feedback
    if($update_result){
        echo "<p class='text-success'>Category updated successfully.</p>";
    } else {
        echo "<p class='text-danger'>Error updating category.</p>";
    }
}
?>
