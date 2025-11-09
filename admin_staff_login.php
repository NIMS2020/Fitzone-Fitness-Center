<?php
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Validate role selection
    if ($role !== "admin" && $role !== "staff") {
        echo "❌ Invalid role selected.";
        exit();
    }

    // Prepare and execute query
    $sql = "SELECT * FROM users WHERE email = ? AND role = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Start session and redirect
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $role;

            if ($role === "admin") {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: staff_dashboard.php");
            }
            exit();
        } else {
            echo "❌ Incorrect password.";
        }
    } else {
        echo "❌ No user found with that role and email.";
    }

    $stmt->close();
    $conn->close();
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

select {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
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

select {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
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

/* Shared styles with login page */
.register-link, 
.home-link {
    text-align: center;
    margin-top: 10px;
    color: #666;
    font-size: 14px;
}

.register-link a, 
.home-link a {
    color: #007bff;
    text-decoration: none;
}

.home-link {
    margin-top: 20px;
    font-size: 14px;
}

</style>
<body>
    
    <div class="login-container">
        <h2>Login</h2>
        <h3>Admin or Staff</h3>
        <form class="login-form" action="admin_staff_login.php" method="POST" >
        <div class="input-group">
                <input type="number" name="id" placeholder="ID" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <select name="role" required>
                <option value="">----Select Role----</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
            <button type="submit" class="login-btn">Login</button>
            <p class="register-link">Don't have an account? <a href="register.php" onclick="showForm('Register-form')">Register</a></p>
            <p class="home-link">Back to Home  <a href="Fitzone.php" onclick="showForm('login-form')">Click here</a></p>
        </form>
    </div>

   
    </body>
    </html>