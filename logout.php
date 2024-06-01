


<?php 
// Start the session again (if not started already)
session_start();


session_unset();
session_destroy();
echo "<script>window.open('./index.php','_self')</script>";

