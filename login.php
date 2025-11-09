

<?php
session_start(); // Make sure session is started
include("dbconnect.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT * FROM coustemers WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $customer = mysqli_fetch_assoc($result);

        if ($password === $customer['password']) {
            header("Location: login_user_dashboard.php");
            echo " Password Correct";
            $_SESSION["customer_email"] = $customer['email'];
            $_SESSION["user"] = $customer['fullname'];

           
            exit();
        } else {
            echo "<script>console.log('❌ Incorrect password');</script>";
            echo "❌ Incorrect password.";
        }
    } else {
        echo "<script>console.log('❌ User not found');</script>";
        echo "❌ User not found.";
    }
}


?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center</title>
    <link rel="shortcut icon" href="C:\Users\nimesha\Desktop\WAD\gym_arm1.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="php" href="dbconnect.php">
    
</head>
<style>
    .login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 30px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
}

.login-container h2 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 15px;
}

.input-group input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    outline: none;
    transition: border 0.3s;
}

.input-group input:focus {
    border-color: #007bff;
}

.login-btn {
    width: 100%;
    padding: 12px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

select {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 15px;  /* space between select role vs login btn */
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: white;
    color: #333;
    outline: none;
}

select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.login-btn:hover {
    background: #0056b3;
}

.register-link ,.admin_staff_login-link{
    text-align: center;
    margin-top: 15px;
    color: #666;
}

.register-link a ,.admin_staff_login-link a{
    color: #007bff;
    text-decoration: none;
}

/* Shared styles with login page */
.account-link, 
.admin-link, 
.home-link {
    text-align: center;
    margin-top: 10px;
    color: #666;
    font-size: 14px;
}

.account-link a, 
.admin-link a, 
.home-link a {
    color: #007bff;
    text-decoration: none;
}

.home-link {
    margin-top: 20px;
    font-size: 14px;
}

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}
.popup.active {
    display: block;
}

</style>
<body>
    
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="login.php" method="POST" >
            <!-- <div class="input-group">
                <input type="number" name="id" placeholder="Coustermer ID" required>
            </div> -->
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
            

            <p class="admin_staff_login-link">Admin or Staff? <a href="admin_staff_login.php" onclick="showForm('Login-form')">Login</a></p>
            <p class="register-link">Don't have an account? <a href="register.php" onclick="showForm('Register-form')">Register</a></p>
            <p class="home-link">Back to Home <a href="Fitzone.php" >Click Here</a></p>
            
        </form>
    </div>

   
    </body>
    </html>