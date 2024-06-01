   <!-- Bootstrap CSS --
<form action="" method="" class="mb-2">-->
<?php
include('includes/connect.php');

if (isset($_POST['insert_cart'])) {
  $brand_title = $_POST['cat_title'];

  $result = mysqli_query($con,"INSERT INTO `brands`(`brand_title`) VALUES ('$brand_title')");
  if ($result) {
    echo "<script>alert('Brand has been inserted successfully')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<title>Insert Brands</title>
<!-- Bootstrap CSS -->

</head>
<body>
<div class="container">
  <h2 class="text-center">Insert Brands</h2></br>
  <form action="" method="post">
    <div class="input-group mb-3">
      <span class="input-group-text bg-info">
        <i class="fa-solid fa-receipt"></i>
      </span>
      <input type="text" class="form-control" name="cat_title" placeholder="Brand Name" aria-label="Brand Name" aria-describedby="basic-addon1">
    </div>

    <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn-submit" name="insert_cart">Insert Brand</button>
      </div>
      
    </div>
  </form>
</div>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>