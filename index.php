<?php
// Start the session
session_start();
include ('dbconnect.php');
// Check if the user is logged in
$isLoggedIn=isset($_SESSION['username']);
 // Assume 'username' is stored during login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Menu</title>
    <link rel="stylesheet" href="gym.css">
    <link rel="shortcut icon" href="C:\Users\nimesha\Desktop\WAD\html_all\gym_arm1.jpeg" type="image/x-icon">
    
</head>
<body>
    <form method="POST">
        <input type="text" name="query" placeholder="Enter service or facility..." required>
        <button type="submit" name="search">Search</button>
    </form> 

    <?php if ($isLoggedIn): ?>
        <!-- Show welcome message and menu for logged-in users -->
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> </h1>
        <ul>
            <li><a href="Fitzone.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
           
        </ul>
    <?php else: ?>
        <!-- Show menu for guests -->
        <ul>
            <li><a href="Fitzone.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            
        </ul>
    <?php endif; ?>
    
    <?php 
    if (isset($_POST['Search'])) {
        $query = trim($_POST['query']);

        // Check if the search term is for a specific page
        if (strtolower($query) == "yoga") {
            // Redirect to the YOGA page
            header("Location:includes/yoga.php");
            exit();
        } elseif (strtolower($query) == "cardio") {
            // Redirect to the cardio page
            header("Location:includes/cardio.php");
            exit();
        } else {
            echo "<p>No specific page found for this search term. Try searching 'yoga' or 'cardio'.</p>";
        }
    }
    ?>
</body>
</html>