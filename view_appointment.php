<?php
include('dbconnect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointments</title>
    <style>
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #d79447;
            color: white;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Class Bookings</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Time</th>
            <th>Trainer</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>Class</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM class_bookings");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['fullname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phonenumber']}</td>
                    <td>{$row['booking_date']}</td>
                    <td>{$row['booking_time']}</td>
                    <td>{$row['trainer']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['class']}</td>
                    <td>{$row['message']}</td>
                    <td>
                        <a href='update_appointment.php?id={$row['id']}'>Edit</a> |
                        <a href='cancel_appointment.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to cancel this appointment?')\">Cancel</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
