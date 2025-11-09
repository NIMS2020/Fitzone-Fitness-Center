<?php
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = trim($_POST["id"]);
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $role = trim($_POST["role"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate role
    if (!in_array($role, [ 'staff', 'coustemer'])) {
        echo "❌ Invalid role selected.";
        exit();
    }

    // Password match check
    if ($password !== $confirm_password) {
        echo "❌ Passwords do not match!";
        exit();
    }

    // Check for existing email
    $check_sql = "SELECT * FROM coustemers WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo "❌ Email already registered.";
        exit();
    }

    

    // Insert new user
    $insert_sql = "INSERT INTO coustemers (id, fullname, email, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("issss", $id, $fullname, $email, $password, $role);

    if ($stmt->execute()) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["role"] = $role;

        // Redirect based on role
        if ($role === "coustemer") {
            header("Location: login.php");
        } else {
            header("Location: admin_staff_login.php");
        }
        exit();
    } else {
        echo "❌ Error: " . $stmt->error;
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
    <link rel="stylesheet" href="register.css">
    <link rel="shortcut icon" href="images/gym_arm1.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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

        select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
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
        }

        .admin-link {
            font-size: 13px;
            color: #888;
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

        .register-link {
            text-align: center;
            margin-top: 15px;
            color: #666;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
        }
        ?>
        <form class="login-form" action="register.php" method="POST">
            <div class="input-group">
                <input type="number" name="id" placeholder="Customer ID" required>
            </div>
            <div class="input-group">
                <input type="text" name="fullname" placeholder="Full Name" required>
            </div>
            <select name="role" required>
                <option value="">----Select Role----</option>
                <option value="staff">Staff</option>
                <option value="coustemer">Coustemer</option>
            </select>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="login-btn">Register</button>
            
            <p class="account-link">Already have an account? <a href="login.php">Login</a></p>
            <p class="home-link">Back to Home <a href="Fitzone.php">Click Here</a></p>
        </form>
    </div>
</body>
</html>