<!-- Checks the signup fucntions and if successful then creates account .-->

<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $phonenumber = $_POST["phonenumber"];
    $vehicleplate = $_POST["vplate"]; 
    $destination = $_POST["destination"]; 

    require_once 'databaseconn.php';
    require_once 'Functions.php';

    if (emptyFields($email,$name,$password,$phonenumber) !== false) {
        header("location:Signup.php?error=emptyinput");
        exit();
    }
    if (invalidPlate($vehicleplate) !== false) {
        header("location:Signup.php?error=invalidplate");
        exit();
    }

    if (invalidEmailFormat($email) !== false) {
        header("location:Signup.php?error=invalidemail");
        exit();
    }
    if (invalidPhoneNumber($phonenumber) !== false) {
        header("location:Signup.php?error=invalidphonenumber");
        exit();
    }

    if (EmailAlreadyExists($conn, $email, $phonenumber) !== false) {
        header("location:Signup.php?error=emailtaken");
        exit();
    }

    createUser($conn, $name, $email, $phonenumber, $vehicleplate, $destination, $password); 
} else {
    header("location:Signup.php");
    exit();
}


