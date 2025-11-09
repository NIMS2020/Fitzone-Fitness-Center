<?php
include('dbconnect.php'); // Ensure this file connects $conn to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone_Number'];
    $experience = $_POST['Experience'];
  
    
     //Handle file upload
    $target_dir = "uploads/"; // Create this folder if it doesn't exist
    $image_name = basename($_FILES["Profile_image"]["name"]);
    $target_file = $target_dir . $image_name;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image is actual image or fake
    $check = getimagesize($_FILES["Profile_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($_FILES["Profile_image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only specific image file types
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move uploaded file
        if (move_uploaded_file($_FILES["Profile_image"]["tmp_name"], $target_file)) {
            // Insert data into the database
            $stmt = $conn->prepare("INSERT INTO trainers (name, email, phone_number, experience, profile_image) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssis", $name, $email, $phone, $experience, $image_name);

            if ($stmt->execute()) {
                echo "Trainer added successfully!";
            } else {
                echo "Database error: " . $stmt->error;
            }
        } else {
            echo "Error uploading file.";
        }
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
</head>
<style>
:root {
  --primary-color: #111317;
  --primary-color-light: #1f2125;
  --primary-color-extra-light: #35373b;
  --secondary-color: #f9ac54;
  --secondary-color-dark: #d79447;
  --text-light: #d1d5db;
  --white: #ffffff;
  --max-width: 1200px;
}

    .login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 30px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
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
/* Shared styles with login page */


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

.register-link {
    text-align: center;
    margin-top: 15px;
    color: #666;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
}
</style>
<body>
    <div class="login-container">
        <h2>Add Trainer</h2>
        <form class="login-form" action="add_trainer.php" method="POST" enctype="multipart/form-data">

            <div class="input-group">
                <input type="text" name="Name" placeholder="Name" required>
            </div>
            <div class="input-group">
                <input type="email" name="Email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="phone number" name="Phone_Number" placeholder="Phone Number" required>
            </div>
            <div class="input-group">
                <input type="number" name="Experience" placeholder="Experience" required>
            </div>
            <div class="input-group">
                <input type="file" name="Profile_image" placeholder="Profile image">
            </div>
           
            
            <button type="submit" class="login-btn"  target="_blank"> Add Trainer</button>
            
            
            <p class="account-link">Back to Admin page    <a href="admin_dashboard.php">Click here</a></p>
            <p class="account-link">Back to home    <a href="Fitzone.php">Click here</a></p>
            <p class="account-link">View Trainers    <a href="admin_dashboard.php">View</a></p>
            <p class="account-link">Update Trainers    <a href="admin_dashboard.php">Upadte</a></p>
        </form>
    </div>

    </body>
    </html>