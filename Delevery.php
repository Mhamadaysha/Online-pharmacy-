<?php
                    include('Admin-erea/includes/connect.php');
                    session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <style>
     body {
        padding:50px;
            background-color: black;
        }

        .gradient-custom {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .card-custom {
            
            border-bottom-left-radius: 10% 50%;
            border-top-left-radius: 10% 50%;
            background-color: gray;
        }

        .input-custom {
            background-color: white;
        }

        .white-text {
            color: hsl(52, 0%, 98%);
            font-weight: 100;
            font-size: 14px;
        }

        .back-button {
            background-color: hsl(52, 0%, 98%);
            font-weight: 700;
            color: black;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="row mt-3 mx-3" style="margin-top:25px;">
        <div class="col-md-3">
            <div style="margin-top: 50px; margin-left: 10px;" class="text-center">
                <i id="animationDemo" data-mdb-animation="slide-right" data-mdb-toggle="animation"
                    data-mdb-animation-reset="true" data-mdb-animation-start="onScroll"
                    data-mdb-animation-on-scroll="repeat" class="fas fa-3x fa-shipping-fast text-white"></i>
                <h3 class="mt-3 text-white">Welcome</h3>
                <p class="white-text">You are 30 seconds away from completing your order!</p>
            </div>
            <div class="text-center">
    <a href="index.php" class="btn btn-white btn-rounded back-button">Go back</a>
</div>
        </div>
        <div class="col-md-9 justify-content-center">
            <div class="card card-custom pb-4">
                <div class="card-body mt-0 mx-5">
                    <div class="text-center mb-3 pb-2 mt-3">
                        <h4 style="color:white;">Delivery Details</h4>
                    </div>
                    <form class="mb-0" method="POST" action="">
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form9Example1" class="form-control input-custom" name="user_name"/>
                                    <label class="form-label" for="form9Example1" required>First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form9Example3" class="form-control input-custom" name="city" />
                                    <label class="form-label" for="form9Example3" required>City</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form9Example3" class="form-control input-custom" name="user_number" />
                                    <label class="form-label" for="form9Example3">Phone number</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form9Example6" class="form-control input-custom"  name="user_address"/>
                                    <label class="form-label" for="form9Example6">Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <!-- Submit button -->
                            <button  type="submit" data-mdb-button-init data-mdb-ripple-init  class="btn btn-white btn-rounded back-button" name="User_Delivery" >Place order</button>
                       
                        </div>
                    </form>
                    <?php
                    
                    if(isset($_POST['User_Delivery'])) {
                        $user_username = $_POST['user_name'];
                        $city = $_POST['city'];
                        $user_address = $_POST['user_address'];
                        $user_number = $_POST['user_number'];

                        // Insert data into the database
                        $insert_query = "INSERT INTO `delevery` (First_name, City, Address, user_number) 
                                         VALUES ('$user_username', '$city', '$user_address', '$user_number')";
                        $sql_execute = mysqli_query($con, $insert_query);

                        // Check if the query was executed successfully
                        if($sql_execute) {
                            echo "<script>window.open('profile.php','_self')</script>";
                        } else {
                            // Display error message if the query failed
                            echo "<p>Error: " . mysqli_error($con) . "</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
