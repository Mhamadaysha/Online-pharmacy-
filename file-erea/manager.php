<?php
$con=mysqli_connect('localhost','root','','mystore');

if (mysqli_connect_errno()) {
    
    echo "Failed to connect to MySQL: " 
    . mysqli_connect_error();
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['status'])) {
    $product_id = $_POST['product_id'];
    $status = $_POST['status'];
    
    // Update the status in the database
    $updateQuery = "UPDATE files SET status='$status' WHERE product_id=$product_id";
    if (mysqli_query($con, $updateQuery)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
}
 $sql = "SELECT *FROM files";
 $result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
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
body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .section {
            margin-bottom: 40px;
        }
        .section h2 {
            margin-bottom: 20px;
            color: #17a2b8;
        }
        .table {
            margin-bottom: 0;
        }
        .total {
            font-weight: bold;
            margin-top: 20px;
        }

    </style>
     </style>

<!--bootsrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="../pharmacy.css">
 <!--font awesome link-->

 <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
crossorigin="anonymous" 
referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>


<div class="Container-fluid/>

<section>
   <div class="container-fluid">
             <!--first child-->
             <nav class="navbar navbar-expand-lg navbar-light bg-info">
<div class="container-fluid">
<!-- / <img src="omar.png"  alt=" "class="logo"> -->
<i class="fa fa-heartbeat" style="font-size:48px"></i>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
 <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<h1 class="text-center p-2">Manager Dashboard</h1>

</div>
</div>
</nav>

<!--last child -->
   
    <!--third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1">
            <div>
              
                <p class="text-ligth text-center"></p>
                <div class="button text-center">
                <a href="#prescriptions" class="btn btn-info text-light my-1">Prescriptions</a>
                    <a href="#profit" class="btn btn-info text-light my-1">Profit</a>
                    <a href="#inventory" class="btn btn-info text-light my-1">Inventory</a>
                    <a href="#users" class="btn btn-info text-light my-1">Users</a>
                    <a href="" class="btn btn-info text-light my-1">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    
</head>
<body>
   
   

   <section id="prescriptions" class="section">
    <h2>Prescriptions:</h2>

    <div class="container mt-5">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Upload date</th>
                    <th>Download</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the uploaded files and download links
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        ?>
                        <tr>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['upload_date']; ?></td>
                            <td><a href="<?php echo $file_path; ?>" class="btn btn-info text-light my-1" download>Download</a></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <button onclick="changeStatus(<?php echo $row['product_id']; ?>, 'Accepted')" class="btn btn-info text-light my-1">Accept</button>
                                <button onclick="changeStatus(<?php echo $row['product_id']; ?>, 'Rejected')" class="btn btn-danger text-light my-1">Reject</button>
                            </td>
                            <td>
                                <a href="index.php?delete=<?php echo $row['product_id']; ?>" class="text-light">
                                    <i class="fas fa-trash" style="font-size: 24px; color: red;"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">No files uploaded yet.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>


    <div class="container">
        <section id="profit" class="section">
            <h2>Profit:</h2>
            <?php
            // Establish database connection
        

            // Check connection
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            // SQL to select amount_due and total_products from user_orders
            $sql = "SELECT amount_due, total_products FROM user_orders";
            $result = $con->query($sql);

            if ($result === false) {
                // If the query failed, output the error message
                echo "Error: " . $con->error;
                exit();
            }

            $totalAmountDue = 0;
            $totalProducts = 0;
            $amountDueData = [];
            $totalProductsData = [];

            if ($result->num_rows > 0) {
                // Display table header
                echo '<table class="table table-striped table-bordered table-hover text-center">
                        <thead class="bg-info">
                            <tr>
                                <th>Profit</th>
                                <th>Saled Products/User</th>
                            </tr>
                        </thead>
                        <tbody class="bg-secondary text-light">';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Accumulate totals
                    $totalAmountDue += $row["amount_due"];
                    $totalProducts += $row["total_products"];

                    // Collect data for chart
                    $amountDueData[] = $row["amount_due"];
                    $totalProductsData[] = $row["total_products"];
                    
                    // Display row with amount_due and total_products
                    echo "<tr>
                            <td>$" . $row["amount_due"] . "</td>
                            <td>" . $row["total_products"] . "</td>
                        </tr>";
                }
                
                // Close table
                echo '</tbody></table>';
                
                // Display totals
                echo "<p class='total'>Total Profit: $ $totalAmountDue</p>";
                echo "<p class='total'>Total Saled Products: $totalProducts</p>";
            } else {
                echo "No data found";
            }
            ?>
            
        </section>

        <section id="inventory" class="section">
            <h2>Inventory:</h2>
            <?php
            $sql = "SELECT products_title, quantities FROM products WHERE quantities > 0";
            $result = $con->query($sql);

            $inventoryLabels = [];
            $inventoryData = [];

            if ($result->num_rows > 0) {
                // Display table header
                echo '<table class="table table-striped table-bordered table-hover text-center">
                        <thead class="bg-info">
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="bg-secondary text-light">';

                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $inventoryLabels[] = $row["products_title"];
                    $inventoryData[] = $row["quantities"];

                    echo "<tr>
                            <td>" . $row["products_title"] . "</td>
                            <td>" . $row["quantities"] . "</td>
                        </tr>";
                }
                
                echo '</tbody></table>';
            } else {
                echo "No items found";
            }
            ?>
           
        </section>

        <section id="users" class="section">
            <h2>Users:</h2>
            <table class="table table-striped table-bordered table-hover text-center">
                <thead class="bg-info">
                    <tr>
                        <th>No</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Address</th>
                        <th>User Mobile</th>
                    </tr>
                </thead>
                <tbody class="bg-secondary text-light">
                    <?php
                    $get_users = "SELECT * FROM user_table";
                    $result = mysqli_query($con, $get_users);
                    $row_count = mysqli_num_rows($result);

                    if ($row_count == 0) {
                        echo "<tr><td colspan='5' class='text-center text-danger mt-5'>No Users yet</td></tr>";
                    } else {
                        $number = 0;
                        while ($row_data = mysqli_fetch_assoc($result)) {
                            $number++;
                            echo  "<tr>
                                    <td>$number</td>
                                    <td>" . $row_data['user_name'] . "</td>
                                    <td>" . $row_data['user_email'] . "</td>
                                    <td>" . $row_data['user_address'] . "</td>
                                    <td>" . $row_data['user_mobile'] . "</td>
                                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    

    <script>
        // JavaScript function for changing file status
        function changeStatus(product_id, status) {
            var formData = new FormData();
            formData.append('product_id', product_id);
            formData.append('status', status);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Reload the page to reflect the changes
                        location.reload();
                    } else {
                        console.error('Error:', xhr.statusText);
                    }
                }
            };
            xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
            xhr.send(formData);
        }
       
    </script>
</body>
</html>