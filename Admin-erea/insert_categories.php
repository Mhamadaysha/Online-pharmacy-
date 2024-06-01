
<?php
include('includes/connect.php');

if (isset($_POST['insert_cart'])) {
  $category_title = $_POST['cat_title'];
  echo $category_title;
  $result = mysqli_query($con,"INSERT INTO `categories`(`category_title`) VALUES ('$category_title')");
  if ($result) {
    echo "<script>alert('Category has been inserted successfully')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add your CSS file or style here -->
<style>
  

  .container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  .form-group input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  .btn-submit {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn-submit:hover {
    background-color: #0056b3;
  }

</style>

<body>
<div class="container">
  <br><h2 style="text-align: center;">Insert Category</h2></br>
  <form action="" method="POST">
    <div class="form-group">
      <label for="cat_title">Category Title:</label>
      <input type="text" id="cat_title" name="cat_title" placeholder="Enter Category Title" required>
    </div>
    <button type="submit" class="btn-submit" name="insert_cart">Insert Category</button>
  </form>
</div>
</body>
</html>
