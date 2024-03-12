<?php


?>
<!DOCTYPE html>
<html lang="en">
<title>Confirm Booking</title>
<?php include('LoginCheck.php');?> 

<section id="Welcome">
    <div class="banner">
        <div class="wrapper">
            <h1>Confirm Your Booking</h1>
        </div>
    </div>
</section>


<!-- Booking Form-->

<div class="ConfirmBookingBox">
<div class="CarParkName"> Sack of Potatoes Car  Park</div>

      <!-- Error Messages-->
      <div class="errormessage">
      <?php
 
if (isset($_GET["error"])){
    if($_GET["error"]=="bookingemptyinput"){
        echo"<p>Fill in all required fields!</p>";
    }
    else if($_GET["error"]=="departureisbeforearrival"){
      echo"<p>Depature time cannot be before arrival time!</p>";
   }
    else if($_GET["error"]=="invalidlicenseplate"){
        echo"<p> License Plate must have not whitespaces!</p>";
     }
     else if($_GET["error"]=="stmtfailed"){
        echo"<p>Booking Failed!</p>";
     }
     else if($_GET["error"]=="none"){
      echo"<p> Booking Successfully Added</p>";     
     }
}
 ?>   
 </div>
<!-- Error Messages-->


<div class="ConfirmBookingform">
    <form action="ConfirmBookingFCheck.php" method="post">
    <div class="CBpageinput-wrapper">
        <input type="text" name="licenseplate" placeholder="License Plate" class="input" required><span class="CBpageasterisk">*</span><br>
    </div>
    <div class="CBpageinput-wrapper">
        <label for="arrivaltime">Arrival Time:</label>
        <input type="datetime-local" id="arrivaltime" name="arrivaltime" placeholder="Arrival Time" class="input" required>
        <span class="CBpageasterisk">*</span><br>
    </div>
    <div class="CBpageinput-wrapper">
            <label for="departuretime">Departure Time:</label>
             <input type="datetime-local" id="departuretime" name="departuretime" placeholder="Departure Time" class="input"  required><span class="CBpageasterisk">*</span><br>
            </div>
     <div class="CBpageinput-wrapper">
         <label for="totalduration">Total Duration</label>
         <input type="text" id="totalduration" name="totalduration"  class="input" readonly><br>
        </div>
    <div class="CBpageinput-wrapper">
        <label for="totalcost">Total Cost</label>
        <input type="text" id="totalcost" name="totalcost" class="input" readonly>
    </div>
    <input type="hidden" id="priceperhour" value="3">
    <button type="submit" name="confirmbooking">Confirm Booking</button>
</form>
    </div>
</div>

<script>
    function calculateDurationandCost() {
        var arrivalTime = new Date(document.getElementById("arrivaltime").value);
        var departureTime = new Date(document.getElementById("departuretime").value);
        var durationInHours = (departureTime - arrivalTime) / (1000 * 60 * 60);
        var pricePerHour = parseFloat(document.getElementById("priceperhour").value);
        var totalCostField = document.getElementById("totalcost");

        document.getElementById("totalduration").value = durationInHours.toFixed()+ " hours";
        totalCostField.value = "£" +(durationInHours * pricePerHour).toFixed();
    }

    // Whenever the users changes the arrival or depature time the total duration is updated
    document.getElementById("arrivaltime").addEventListener("input", calculateDurationandCost);
    document.getElementById("departuretime").addEventListener("input", calculateDurationandCost);
</script>


<!-- page breaks-->
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
<?php include('Footer.php')?>

</html>