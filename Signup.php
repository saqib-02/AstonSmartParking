<?php


?>
<!DOCTYPE html>
<html lang="en">
<title> Register</title>
<?php include('Header.php');?>



<!-- Signup Form-->

<div class="SignUpBox">

      <div class="SignUp"> Register</div>
      <!-- Error Messages-->
      <div class="errormessage">
      <?php
 
if (isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo"<p>Fill in all fields!</p>";
    }
    else if($_GET["error"]=="emailtaken"){
      echo"<p>Email or PhoneNumber already taken!</p>";
   }
    else if($_GET["error"]=="invalidplate"){
        echo"<p>Plate must have not whitespaces!</p>";
     }
     else if($_GET["error"]=="invalidphonenumber"){
        echo"<p>Enter a valid number!</p>";
     }
     else if($_GET["error"]=="wrongemailformat"){
        echo"<p>Wrong email format!</p>";
     }
     else if($_GET["error"]=="stmtfailed"){
        echo"<p>Something went wrong!</p>";
     }
     else if($_GET["error"]=="none"){
      echo'<p style="color:green;"> Registered Successfully!Please Login</p>';     
     }
}
 ?>   
 </div>
<!-- Error Messages-->
<!-- sign up fields-->

<div class="SignUp-form">
    <form action="Signupfcheck.php" method="post">
        <div class="input-wrapper">
            <input type="text" name="name" placeholder="Full Name" class="input" required><span class="asterisk">*</span><br>
        </div>
        <div class="input-wrapper">
            <input type="text" name="email" placeholder="Email" class="input" required><span class="asterisk">*</span><br>
        </div>
        <div class="input-wrapper">
            <input type="password" name="pwd" placeholder="Password" class="input" required><span class="asterisk">*</span><br>
        </div>
        <div class="input-wrapper">
            <input type="Phonenumber" name ="phonenumber" placeholder="PhoneNumber" class="input" maxlength="11" required><span class="asterisk">*</span><br>
        </div>
        <div class="input-wrapper">
            <input type="text" name="vplate" placeholder="Vehicle Plate" class="input"><br> 
        </div>
        <div class="input-wrapper">
            <input type="text" name="destination" placeholder="Destination" class="input"><br> 
        </div>
        <button type="submit" name="submit">Create Account</button>
        <span><a href="Login.php"> Already Registered? Click here to Login </a></span>
    </form>
</div>


<!-- page breaks-->
<br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
<?php include('Footer.php')?>

</html>