<!-- Checks the bookings fucntions and if successful then creates the booking  .-->


<?php

var_dump($_POST);

session_start();
require_once 'databaseconn.php';
require_once 'Functions.php';



if (isset($_POST["confirmbooking"])) {
    $userId = $_SESSION["userid"];
    $licenseplate = $_POST["licenseplate"];
    $arrivaltime = $_POST["arrivaltime"];
    $departuretime = $_POST["departuretime"];
    $totalduration = $_POST["totalduration"];
    $totalcost = $_POST["totalcost"];

    if (BookingEmptyFields($licenseplate, $arrivaltime, $departuretime)) {
        header("location:ConfirmBooking.php?error=bookingemptyinput");
        exit();
    }
    if (DepartureIsBeforeArrival($arrivaltime, $departuretime)) {
        header("location:ConfirmBooking.php?error=departureisbeforearrival");
        exit();
    }

    if (invalidLicensePlate($licenseplate)) {
        header("location:ConfirmBooking.php?error=invalidlicenseplate");
        exit();
    }

    if (BookingInfo($conn,$userId, $licenseplate, $arrivaltime, $departuretime, $totalduration, $totalcost)) {
        header("location:ConfirmBooking.php?error=none");
        exit();
    } else {
        header("location:ConfirmBooking.php?error=stmtfailed");
        exit();
    }
} else {
    header("location:ConfirmBooking.php");
    exit();
}

