<?php
if(isset($_GET['edit_account'])){
    $user_session_username = $_SESSION['username']; 
    $select_query = "SELECT * FROM user_table WHERE user_name='$user_session_username'";
    $result_query = mysqli_query($con, $select_query);
    
    if($result_query) {
        // Check if any row is returned
        if(mysqli_num_rows($result_query) > 0) {
            $row_fetch = mysqli_fetch_assoc($result_query);
            // Assign values from the fetched row
            $user_id = $row_fetch['user_id'];
            $user_name = $row_fetch['user_name'];
            $user_email = $row_fetch['user_email'];
            $user_address = $row_fetch['user_address'];
            $user_mobile = $row_fetch['user_mobile'];
        }
    }

    if (isset($_POST['user-update'])) {
        $update_id = $user_id;
        $user_name = $_POST['user_username']; // Updated variable name to match the form field
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_contact']; // Updated variable name to match the form field
        
        // Handle file upload
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
 
        $update_cart = "UPDATE user_table SET user_name='$user_name', user_email='$user_email', user_mobile='$user_mobile', user_address='$user_address' WHERE user_id=$update_id";
        $result_update_query = mysqli_query($con, $update_cart);
        
        if($result_update_query){
            echo"<script>alert('Update successful.')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pharmacy</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- Font Awesome CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Custom CSS -->
   <link rel="stylesheet" href="pharmacy.css">
</head>
<body>
<h1 class="text-center text-success mb-4">Edit account </h1>
<form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-100 m-auto" name="user_username" value="<?php echo isset($user_name) ? $user_name : ''; ?>">
        </div>   
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-100 m-auto" name="user_email" value="<?php echo isset($user_email) ? $user_email : ''; ?>">
        </div> 
        <div class="form-outline mb-4">
            <input type="file" class="form-control w-100 m-auto" name="user_image">
            <img src="./user_images/<?php echo isset($user_image) ? $user_image : ''; ?>" alt="">
        </div> 
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-100 m-auto" name="user_address" value="<?php echo isset($user_address) ? $user_address : ''; ?>">
        </div> 
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-100 m-auto" name="user_contact" value="<?php echo isset($user_mobile) ? $user_mobile : ''; ?>">
        </div> 
        <input type="submit" value="update" class="btn btn-success py-2 px-3 border-0" name="user-update">
</form>
            <!-- Bootstrap JS (Optional) -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3
   /dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>