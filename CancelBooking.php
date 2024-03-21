<?php

session_start();

function CancelBooking() {
    if (isset($_POST['cancelbooking'])) {
        $bookingId = $_POST['bookingid'];

      //Reference: https://www.scaler.com/topics/alert-in-php/ 

        echo '<script>
                var confirmation = confirm("Are you sure you want to cancel this booking?");
                if (confirmation) {
                    window.location.href = "ConfirmCancellation.php?bookingid=' . $bookingId . '";
                } else {
                    window.location.href = "UpcomingBookings.php";
                }
              </script>';
         //Reference: https://www.scaler.com/topics/alert-in-php/ 

    } else {
        header("Location: UpcomingBookings.php");
        exit();
    }
}

CancelBooking();
