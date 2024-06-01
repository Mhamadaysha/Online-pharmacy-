<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Prescription</title>
    <link rel="stylesheet" href="styles.css"> <!-- You can link your CSS file here -->
</head>
<body>
    <div class="container">
        <h2>Upload Prescription</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prescription">Select Prescription:</label>
                <input type="file" name="prescription" id="prescription" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Upload</button>
            </div>
        </form>
    </div>

    <?php
    

        // Get customer ID (you may need to replace this with the actual customer ID from your session or authentication system)
        $customer_id = 1;

        $file_name = $_FILES['prescription']['name'];
        $file_tmp = $_FILES['prescription']['tmp_name'];

        // Upload directory
        $upload_dir = 'prescriptions/';

        // Move the uploaded file to the specified directory
        if(move_uploaded_file($file_tmp, $upload_dir.$file_name)){
            // Insert prescription data into database
            $sql = "INSERT INTO prescriptions (customer_id, file_name, status) VALUES (?, ?, 'pending')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $customer_id, $file_name);

            if ($stmt->execute()) {
                echo "<p>Prescription uploaded successfully.</p>";
            } else {
                echo "<p>Error uploading prescription.</p>";
            }
        } else {
            echo "<p>Error uploading prescription.</p>";
        }

        // Close connection
        $conn->close();
    
    ?>

</body>
</html>
