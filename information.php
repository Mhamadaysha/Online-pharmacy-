

<?php 
session_start();
if (isset($_SESSION['username'])) {
echo"Welcome  " .$_SESSION['username'];
echo"<br>";
echo "And Password is " .$_SESSION['password'];
echo"<br>";
echo"<br>";
echo "And  email is " .$_SESSION['email'];
} else {    echo "salam";}
?>