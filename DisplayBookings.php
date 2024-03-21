<?php



function DisplayUpcomingBookings (){
    require_once 'databaseconn.php';
    
    $userId = $_SESSION['userid'];

    $sql = "SELECT bookingid, licenseplate, arrivaltime, departuretime, totalduration, totalcost FROM confirmbooking WHERE user_id = ?    ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement preparation failed.";
        exit();
    }
    
   // Reference-CHATGPT- BUG FIX- data wasnt being extracted as i didnt have the below two lines.
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    // Reference-CHATGPT- BUG FIX

    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>Sack of Potatoes Car Park</td>";
            echo "<td>" . $row['licenseplate'] . "</td>";
            echo "<td>" . $row['arrivaltime'] . "</td>";
            echo "<td>" . $row['departuretime'] . "</td>";
            echo "<td>" . $row['totalduration'] . "</td>";
            echo "<td>" . $row['totalcost'] . "</td>";

            echo "<td><form action='CancelBooking.php' method='post'>";
            echo "<input type='hidden' name='bookingid' value='" . $row['bookingid'] . "'>";
            echo "<button type='submit' name='cancelbooking'>Cancel Booking</button>";
            echo "</form></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No bookings found for this user.</td></tr>";
    }
    

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
