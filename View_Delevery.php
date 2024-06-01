<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../pharmacy.css">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #007bff;
        }

        section {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <!-- <img src="omar.png" alt="" class="logo"> -->
                <i class="fa fa-heartbeat" style="font-size:48px"></i>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <h1 class="text-center p-2">Delivery Dashboard</h1>
                </div>
            </div>
        </nav>

        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1">
                <div>
                    <p class="text-light text-center"></p>
                    <div class="button text-center">
                        <h1 class="text-center text-info">All User_Delivery</h1>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered mt-5">
            <thead class="bg-info">
                <tr>
                    <th>user_ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>View order</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                include('includes/connect.php');

                // Make sure $con is properly initialized with database connection
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $select_query = "SELECT * FROM `delevery`";
                $result_query = mysqli_query($con, $select_query);

                if ($result_query) {
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $user_id = $row['user_id'];
                        $First_name = $row['First_name'];
                        $City = $row['City'];
                        $Address = $row['Address'];
                        $user_number = $row['user_number'];

                        echo "<tr>";
                        echo "<td>$user_id</td>";
                        echo "<td>$First_name</td>";
                        echo "<td>$City</td>";
                        echo "<td>$Address</td>";
                        echo "<td>$user_number</td>";
                        echo "<td><a href='d_orders.php' class='btn btn-info'>View order</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No records found or query failed: " . mysqli_error($con) . "</td></tr>";
                }

                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ppGZjAipnHeVtSD3tV9DZ5q5XZkKrvqHn1Tw+7MnQ+FXfmyUTwVdF9yKuOh9w8pz" crossorigin="anonymous"></script>
</body>

</html>
