<!-- Checks login fucntions and if successful then user is logged in .-->

<?php

if(isset($_POST["submit"])){

$email=$_POST["email"];
$password=$_POST["pwd"];

   require_once 'databaseconn.php';
   require_once 'Functions.php';


   if (emptyInputLogin($email,$password)!== false){
    header("location:Login.php?error=emptyinput");
    exit();
   }

   loginUser($conn,$email,$password);
}
 else{
    header("location:Login.php");
    exit();
 }

