
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                    echo "<script>window.open('cart.php','_self')</script>";
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
?>
