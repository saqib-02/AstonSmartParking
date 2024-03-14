<?php


?>



<!DOCTYPE html>
<title>Your Bookings| Aston Smart Parking</title>

<!-- header-->
<?php include('LoginCheck.php');?>


<!-- Welcome text-->
  <div class="wrapper">
  <?php
  if(isset($_SESSION["useremail"])) {
 echo "<h1>Your Upcoming Bookings,  ". $_SESSION["username"]."</h1>";
  }
  else{
    echo " <h1>Your Upcoming Bookings</h1>";
  }
  ?>
</div>


<div class="bookingstable">
    <table>
        <thead>
            <tr>
                <th>Car Park Name</th>
                <th>License Plate</th>
                <th>Arrival Time</th>
                <th>Departure Time</th>
                <th>Total Duration</th>
                <th>Total Cost</th>
                <th>Cancel</th>
            </tr>
        </thead>
        <tbody>
        <?php include('DisplayBookings.php'); ?>
         <?php DisplayUpcomingBookings()?>
        </tbody>
    </table>
</div>




<!-- footer-->

<?php include('Footer.php');?>



</html>
