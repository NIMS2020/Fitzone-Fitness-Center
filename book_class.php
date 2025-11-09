<?php
// book_class.php
include('dbconnect.php');
$message = "";

// Handle booking submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];
    $date = $_POST['booking_date'];
    $time = $_POST['booking_time'];
    $trainer = $_POST['trainer'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    $msg = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO class_bookings (fullname, email, phonenumber, booking_date, booking_time, trainer, gender, age, class, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $fullname, $email, $phone, $date, $time, $trainer, $gender, $age, $class, $msg);

    if ($stmt->execute()) {
        $message = "Class booked successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center - Book a Class</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            max-width: 500px;
            margin: 30px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #007bff;
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background: #0056b3;
        }

        .account-link {
            text-align: center;
            margin-top: 15px;
        }

        .account-link a {
            color: #007bff;
            text-decoration: none;
        }

        .message {
            text-align: center;
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Book a Class</h2>
    <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>
    <form class="login-form" method="POST" action="book_class.php">
        <div class="input-group">
            <input type="text" name="fullname" placeholder="Full Name" required>
        </div>
        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <input type="text" name="phonenumber" placeholder="Phone Number" required>
        </div>
        <div class="input-group">
            <input type="date" name="booking_date" required>
        </div>
        <div class="input-group">
            <input type="time" name="booking_time" required>
        </div>
        <div class="input-group">
            <select name="trainer" required>
                <option value="">----Select Trainer----</option>
                <?php
                $query = "SELECT name FROM trainers";
                $result = $conn->query($query);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['name']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                } else {
                    echo "<option value=''>No trainers found</option>";
                }
                ?>
            </select>
        </div>
        <div class="input-group">
            <select name="gender" required>
                <option value="">----Select Gender----</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="input-group">
            <select name="age" required>
                <option value="">----Select Age Category----</option>
                <option value="child">Child</option>
                <option value="teenage">Teenage</option>
                <option value="middleage">Middle Age</option>
                <option value="after55">After 55</option>
            </select>
        </div>
        <div class="input-group">
            <select name="class" required>
                <option value="">----Select Class Category----</option>
                <option value="Individual Strength Training">Individual Strength Training</option>
                <option value="Individual Physical Fitness">Individual Physical Fitness</option>
                <option value="Individual Fat loss">Individual Fat loss</option>
                <option value="Individual Weight gain">Individual Weight gain</option>
                <option value="Group Strength Training">Group Strength Training</option>
                <option value="Group Physical Fitness">Group Physical Fitness</option>
                <option value="Group Fat loss">Group Fat loss</option>
                <option value="Group Weight gain">Group Weight gain</option>
                <option value="Neutrition councelling-Individual">Neutrition councelling-Individual</option>
                <option value="Neutrition councelling-Group">Neutrition councelling-Group</option>
            </select>
        </div>
        <div class="input-group">
            <input type="text" name="message" placeholder="Message (Optional)">
        </div>
        <button type="submit" class="login-btn">Make Appointment</button>

        <p class="account-link">Back to appointment page <a href="programs.php">Click here</a></p>
        <p class="account-link">Back to home <a href="Fitzone.php">Click here</a></p>
        <p class="account-link">View Appointment <a href="view_appointment.php">View</a></p>
        <p class="account-link">Update Appointment <a href="update_appointment.php">Update</a></p>
    </form>
</div>

</body>
</html>
