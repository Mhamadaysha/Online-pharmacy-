<?php  
include('../includes/connect.php'); 
include('../common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <!-- Custom CSS -->
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
           
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #1f293a;
        }

        .container {
            position: relative;
            width: 256px;
            height: 256px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container span {
            position: absolute;
            left: 0;
            width: 5px;
            height: 10px;
            background: #2c4766;
            border-radius: 8px;
            transform-origin: 128px;
            transform: scale(3) rotate(calc(var(--i) * (360deg / 50)));
            animation: animateBlink 3s linear infinite;
            animation-delay: calc(var(--i) * (3s / 50));
        }

        @keyframes animateBlink {
            0% {
                background: #0ef;
            }
            25% {
                background: #2c4766;
            }
        }

        .login-box {
            position: absolute;
            width: 400px;
        }

        .login-box form {
            width: 100%;
            padding: 0 50px;
        }

        h2 {
            font-size: 2em;
            color: #0ef;
            text-align: center;
        }

        .input-box {
            position: relative;
            margin: 25px 0;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: 2px solid #2c4766;
            outline: none;
            border-radius: 40px;
            font-size: 1em;
            color: #fff;
            padding: 0 20px;
            transition: .5s ease;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-color: #0ef;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #fff;
            pointer-events: none;
            transition: .5s ease;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: 1px;
            font-size: .8em;
            background: #1f293a;
            padding: 0 6px;
            color: #0ef;
        }

        .forgot-pass {
            margin: -15px 0 10px;
            text-align: center;
        }

        .forgot-pass a {
            font-size: .85em;
            color: #fff;
            text-decoration: none;
        }

        .forgot-pass a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 45px;
            background: #0ef;
            border: none;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 1em;
            color: #1f293a;
            font-weight: 600;
        }

        .signup-link {
            margin: 20px 0 10px;
            text-align: center;
        }

        .signup-link a {
            font-size: 1em;
            color: #0ef;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
        .input-box input[type="file"] {
    width: 100%;
    height: 50px;
    background: transparent;
    border: 2px solid #2c4766;
    outline: none;
    border-radius: 40px;
    font-size: 1em;
    color: #fff;
    padding: 0 20px;
    transition: .5s ease;
    position: relative;
    overflow: hidden;
}

.input-box input[type="file"]::-webkit-file-upload-button {
    background: #0ef;
    color: #1f293a;
    border: none;
    border-radius: 40px;
    padding: 10px 20px;
    cursor: pointer;
    position: absolute;
    right: 0;
    top: 0;
    transition: .3s;
}

.input-box input[type="file"]::-webkit-file-upload-button:hover {
    background: #1f293a;
    color: #0ef;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Registration</h2>
            <form action="" method="post" enctype="multipart/form-data"> 
                <div class="input-box">
                    <input type="text" name="user_name" id="user_name" placeholder="Username" required> 
                    <label for="user_username">Username</label>  
                </div>
                <div class="input-box">
                    <input type="email" name="user_email" id="user_email" placeholder="Email" required> 
                    <label for="user_email">Email</label>  
                </div>
                <div class="input-box">
                    <input type="file" name="user_image" id="user_image" required>
                    <label for="user_image">Your Image</label>  
                </div>
                <div class="input-box">
                    <input type="password" name="user_password" id="user_password" placeholder="Password" required>
                    <label for="user_password">Password</label>
                </div>
                <div class="input-box">
                    <input type="password" name="conf_user_password" id="conf_user_password" placeholder="Confirm Password" required>
                    <label for="conf_user_password">Confirm Password</label>
                </div>
                <div class="input-box">
                    <input type="text" name="user_address" id="user_address" placeholder="Address" required>
                    <label for="user_address">Address</label>
                </div>
                <div class="input-box">
                    <input type="text" name="user_contact" id="user_contact" placeholder="Contact" required>
                    <label for="user_contact">Contact</label>
                </div>
                <div class="text-center">
                    <input type="submit" value="Register" class="btn btn-info" name="user_Register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">
                        Already have an account? <a href="http://localhost/demo/user_Login.php" class="text-danger">Login</a>
                    </p>
                </div>
            </form>
        </div>
   


    <span style="--i:0;"></span>
    <span style="--i:1;"></span>
    <span style="--i:2;"></span>
    <span style="--i:3;"></span>
    <span style="--i:4;"></span>
    <span style="--i:5;"></span>
    <span style="--i:6;"></span>
    <span style="--i:7;"></span>
    <span style="--i:8;"></span>
    <span style="--i:9;"></span>
    <span style="--i:10;"></span>
    <span style="--i:11;"></span>
    <span style="--i:12;"></span>
    <span style="--i:13;"></span>
    <span style="--i:14;"></span>
    <span style="--i:15;"></span>
    <span style="--i:16;"></span>
    <span style="--i:17;"></span>
    <span style="--i:18;"></span>
    <span style="--i:19;"></span>
    <span style="--i:20;"></span>
    <span style="--i:21;"></span>
    <span style="--i:22;"></span>
    <span style="--i:23;"></span>
    <span style="--i:24;"></span>
    <span style="--i:25;"></span>
    <span style="--i:26;"></span>
    <span style="--i:27;"></span>
    <span style="--i:28;"></span>
    <span style="--i:29;"></span>
    <span style="--i:30;"></span>
    <span style="--i:31;"></span>
    <span style="--i:32;"></span>
    <span style="--i:33;"></span>
    <span style="--i:34;"></span>
    <span style="--i:35;"></span>
    <span style="--i:36;"></span>
    <span style="--i:37;"></span>
    <span style="--i:38;"></span>
    <span style="--i:39;"></span>
    <span style="--i:40;"></span>
    <span style="--i:41;"></span>
    <span style="--i:42;"></span>
    <span style="--i:43;"></span>
    <span style="--i:44;"></span>
    <span style="--i:45;"></span>
    <span style="--i:46;"></span>
    <span style="--i:47;"></span>
    <span style="--i:48;"></span>
    <span style="--i:49;"></span>
    </div>
</body>

</html>
<?php

if (isset($_POST['user_Register'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIpAddress();

    // Hash the password
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    // Check for existing user in both tables
    $select_query_user_table = "SELECT * FROM user_table WHERE user_name='$user_name' OR user_email='$user_email'";
    $select_query_users = "SELECT * FROM users WHERE user_name='$user_name' OR user_email='$user_email'";
    
    $result_user_table = mysqli_query($con, $select_query_user_table);
    $result_users = mysqli_query($con, $select_query_users);
    
    $row_count_user_table = mysqli_num_rows($result_user_table);
    $row_count_users = mysqli_num_rows($result_users);

    if ($row_count_user_table > 0 || $row_count_users > 0) {
        echo "<div class='alert alert-danger' role='alert'>Username or Email is already registered.</div>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script>alert('Passwords don\'t match');</script>";
    } else {
        // Move uploaded image file
        move_uploaded_file($user_image_tmp, './user_images/' . $user_image);

        // Insert user data into the user_table
        $insert_query_user_table = "INSERT INTO user_table (user_name, user_email, user_password, user_image, user_ip, user_address, user_mobile) 
                                    VALUES ('$user_name', '$user_email', '$hashed_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute_user_table = mysqli_query($con, $insert_query_user_table);

        // Insert user data into the users table
        $insert_query_users = "INSERT INTO users (user_name, user_email, user_password) 
                               VALUES ('$user_name', '$user_email', '$hashed_password')";
        $sql_execute_users = mysqli_query($con, $insert_query_users);

        if ($sql_execute_user_table && $sql_execute_users) {
            echo "<script>alert('User registered successfully');</script>";


        }
    }
}
?>