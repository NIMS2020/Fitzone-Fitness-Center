<?php
include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Trainers - FitZone</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #d79447;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img.profile-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .back-links {
            text-align: center;
            margin-top: 30px;
        }

        .back-links a {
            text-decoration: none;
            color: #007bff;
            margin: 0 15px;
        }

        .back-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>All Registered Trainers</h2>

<table>
    <tr>
        
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Experience (Years)</th>
        <th>Profile Image</th>
    </tr>

    <?php
    $sql = "SELECT * FROM trainers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['phone_number']); ?></td>
            <td><?= htmlspecialchars($row['experience']); ?></td>
            <td>
                <?php if (!empty($row['profile_image'])): ?>
                    <img src="uploads/<?= $row['profile_image']; ?>" class="profile-img" alt="Trainer Image">
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>
        </tr>
    <?php
        endwhile;
    else:
        echo "<tr><td colspan='6'>No trainers found.</td></tr>";
    endif;
    ?>
</table>

<div class="back-links">
    <a href="admin_dashboard.php">Back to Admin Dashboard</a>
    <a href="add_trainer.php">Add Trainer</a>
    <a href="Fitzone.php">Home</a>
</div>

</body>
</html>
