
<?php
include('dbconnect.php');
session_start();
session_destroy();
echo '<script>
    alert("You are now logged out. See you again soon!");
    window.location.href = "Fitzone.php";
</script>'; // Redirect to home page
exit;
?>