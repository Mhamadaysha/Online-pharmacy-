<?php  
include('../includes/connect.php');
include('../Admin-erea/common_function.php');
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<title>File upload </title>
</head>
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

  .btn-info {
    display: block;
    width: 100%;
    padding: 10px;
   
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn-info:hover {
    background-color: #0056b3;
  }</style>
<body>

<div class="container">
    <h2>Upload a file</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="file" class="form-label">Select file</label>
            <input type="file" class="form-control" name="file" id="file">
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Product ID</label>
            <!-- Use PHP to echo the product_id from session into the value attribute -->
            <input type="text" class="form-control" name="product_id" id="product_id">
        </div>
        <button type="submit" class="btn btn-info">Upload file</button>
        
    </form>
</div>
   

</body>
<?php
function upload() {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // File upload success, now store information in the database
            $filename = $_FILES["file"]["name"];
            $product_id = $_POST['product_id']; // Get the product_id from the form

            // Connect to the database
            $con = mysqli_connect('localhost', 'root', '', 'mystore');
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            // Check if the product_id exists in the products table
            $check_query = "SELECT product_id FROM products WHERE product_id = $product_id";
            $result = mysqli_query($con, $check_query);
            if (mysqli_num_rows($result) > 0) {
                // Insert the file information into the database along with the product ID
                $insert_query = "INSERT INTO files (product_id, filename) VALUES ('$product_id', '$filename')";
                if ($con->query($insert_query) === TRUE) {
                    echo "<script>alert('The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.');</script>";
					
                } else {
                    echo "<script>alert('Sorry, there was an error storing information in the database: ' . $con->error);</script>";
                }
            } else {
                echo "<script>alert('Product ID does not exist in the products table.');</script>";
            }

            $con->close();
        } else {
           echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    } else {
        echo "<script>alert('No File Uploaded');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    upload();
}
?>
<?php


if (isset($_GET['delete'])) {
    $product_id = intval($_GET['delete']);

    // Delete the file record from the database
    $delete_query = "DELETE FROM files WHERE product_id = ?";
    if ($stmt = $con->prepare($delete_query)) {
        $stmt->bind_param("i", $product_id);
        if ($stmt->execute()) {
            // Provide feedback to the user
            echo "<script>alert('File deleted successfully.');</script>";
            // Redirect to avoid resubmission of the form
            echo "<script>window.location.href = 'manager.php';</script>";
        } else {
            echo "<script>alert('Error deleting file.');</script>";
        }
       
    } else {
        echo "<script>alert('Error preparing statement.');</script>";
    }
}
?>


</html>