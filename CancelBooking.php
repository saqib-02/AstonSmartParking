<?php

session_start();

function CancelBooking (){
    require_once 'databaseconn.php';
    $userId = $_SESSION['userid'];

    if (isset($_POST['cancelbooking'])) {
  
        $bookingId = $_POST['bookingid'];
    
        // Prepare SQL statement to delete the booking
        $sql = "DELETE FROM confirmbooking WHERE bookingid = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement preparation failed.";
            exit();
        }
    
        // Bind the booking ID parameter and execute the statement
        mysqli_stmt_bind_param($stmt, "i", $bookingId);
        mysqli_stmt_execute($stmt);
    
        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    
        // Redirect back to the page displaying upcoming bookings
        header("Location: UpcomingBookings.php");
        exit();
    } else {
        // Redirect to the page displaying upcoming bookings if the form was not submitted properly
        header("Location: UpcomingBookings.php");
        exit();
    }

}

CancelBooking();