<?php
session_start();
require_once 'databaseconn.php';

if (isset($_GET['bookingid'])) {
    $bookingId = $_GET['bookingid'];

    $sql = "DELETE FROM confirmbooking WHERE bookingid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $bookingId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        // Redirects to UpcomingBookings.php after booking is deleted
        header("Location: UpcomingBookings.php");
        exit();
    } else {
        echo "SQL statement failed.";
        exit();
    }
} else {
    header("Location: UpcomingBookings.php");
    exit();
}
