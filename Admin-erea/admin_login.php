<?php  
include('includes/connect.php'); 
include('common_function.php'); 

?>
<style>
        /* Additional CSS styles for hover and cover effects */
        .btn-submit {
            background-color: blue; /* Green color as the default background */
            color: white; /* Text color */
            transition: background-color 0.3s ease; /* Smooth transition for background color */
            border: 2px solid green; /* Green border */
            cursor: pointer; /* Change cursor to pointer on hover */
            padding: 10px 20px; /* Padding for the button */
            border-radius: 5px; /* Rounded corners */
        }

        /* Hover effect */
        .btn-submit:hover {
            background-color: #218838; /* Darker green on hover */
        }

        /* Cover effect on click */
        .btn-submit:active {
            background-color: #1e7e34; /* Darker green when button is clicked */
            box-shadow: 0 5px #000; /* Add black shadow when button is clicked */
            transform: translateY(4px); /* Move button down slightly when clicked */
        }
        .alert {
  padding: 15px;
  border: 1px solid #d32f2f;
  border-radius: 4px;
  background-color: #f44336;
  color: white;
  margin-bottom: 15px;
}
    </style>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<!-- Custom CSS -->
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Admin Login</p>
                <form class="mx-1 mx-md-4" method="post" action="">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="admin_name"  autocomplete="off" required="required"  />
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>
                 
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="admin_password" autocomplete="off" required="required" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>
                  
                  
                  <div class="text-center">
                        <input type="submit" value="Login" class="btn btn-primary px-5" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">
                            Don't have an account? <a href="admin_registration.php" class="text-danger">Register</a>
                        
</p>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


// Assuming your database connection is already established ($con)
<?php
if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    // Retrieve user data from database based on username
    global $con;
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
    $result = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result); // Count rows returned from the query

    if ($row_count > 0) {
        $_SESSION['admin_name'] = $admin_name;
        // Verify password
        if (password_verify($admin_password, $row['admin_password'])) {
            // Password is correct
            if ($row_count == 1) {
                $admin_name = $_POST['admin_name'];
                $_SESSION['admin_name'] = $admin_name;
                echo "<script>alert('Login successful');</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } 
        } else {

            // Password is incorrect
            echo "<script>alert('Password is incorrect');</script>";
        }
    } else {
        // User not found
        echo "<script>alert('admin not found');</script>";
    }
}



?>
