<?php
include('dbconnect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM class_bookings WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Appointment cancelled successfully!'); window.location.href='view_appointment.php';</script>";
    } else {
        echo "Error deleting appointment: " . $stmt->error;
    }
} else {
    echo "Invalid ID.";
}
?>
