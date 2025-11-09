<?php
include('dbconnect.php');
$message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $originalName = $_POST['original_name']; // hidden input to identify trainer
    $newName = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone_Number'];
    $experience = $_POST['Experience'];


    // Handle profile image if uploaded
    if (!empty($_FILES['profile_image']['Name'])) {
        $imageName = $_FILES['profile_image']['Name'];
        $tempName = $_FILES['profile_image']['tmp_name'];
        $targetDir = "uploads/";
        $targetPath = $targetDir . basename($imageName);
        move_uploaded_file($tempName, $targetPath);
    } else {
        // Keep previous image if no new file
        $query = $conn->prepare("SELECT Profile_image FROM add_trainer WHERE Name=?");
        $query->bind_param("s", $originalName);
        $query->execute();
        $query->bind_result($imageName);
        $query->fetch();
        $query->close();
    }

    $stmt = $conn->prepare("UPDATE trainersm SET Name=?, Email=?, Phone_Number=?, Experience=?, Profile_image=? WHERE Name=?");
    $stmt->bind_param("ssssss", $newName, $email, $phone, $experience, $imageName, $originalName);

    if ($stmt->execute()) {
        $message = "Trainer updated successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
}

// Fetch trainer list for dropdown
$trainers = $conn->query("SELECT Name FROM add_trainer");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Trainer</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .container {
            max-width: 600px;
            background: white;
            margin: 30px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.2);
        }
        h2 { text-align: center; }
        .form-group { margin-bottom: 15px; }
        input, select {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            background: #007bff;
            color: white;
            border: none;
            font-size: 16px;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        .message {
            text-align: center;
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Trainer Information</h2>
    <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Select Trainer to Update:</label>
            <select name="original_name" required onchange="this.form.submit()">
                <option value="">-- Select Trainer --</option>
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
                <?php
                if ($trainers->num_rows > 0) {
                    while ($row = $trainers->fetch_assoc()) {
                        $selected = (isset($_POST['original_name']) && $_POST['original_name'] == $row['Name']) ? "selected" : "";
                        echo "<option value='" . htmlspecialchars($row['Name']) . "' $selected>" . htmlspecialchars($row['Name']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </form>

    <?php
    // If trainer is selected, show update form
    if (isset($_POST['original_name'])) {
        $selected = $_POST['original_name'];
        $stmt = $conn->prepare("SELECT * FROM add_trainer WHERE Name=?");
        $stmt->bind_param("s", $selected);
        $stmt->execute();
        $result = $stmt->get_result();
        $trainer = $result->fetch_assoc();
    ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="original_name" value="<?= htmlspecialchars($trainer['Name']) ?>">

        <div class="form-group">
            <label>Trainer Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($trainer['Name']) ?>" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($trainer['Email']) ?>" required>
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($trainer['Phone_Number']) ?>" required>
        </div>

        <div class="form-group">
            <label>Experience (years):</label>
            <input type="number" name="experience" value="<?= htmlspecialchars($trainer['Experience']) ?>" required>
        </div>

        <div class="form-group">
            <label>Profile Image:</label>
            <input type="file" name="profile_image">
            <?php if (!empty($trainer['Profile_image'])): ?>
                <p>Current Image: <img src="uploads/<?= $trainer['Profile_image'] ?>" width="100"></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn">Update Trainer</button>
    </form>

    <?php } ?>
</div>

</body>
</html>
