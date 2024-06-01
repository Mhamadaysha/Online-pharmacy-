
<?php 
// Start the session
session_start();

// Set session variables
$_SESSION['username'] = "omar";
$_SESSION['password'] = "coding";
$_SESSION['email'] = "coding@gmail.com";

echo "Saved"; // Display confirmation that session variables are saved
?> 