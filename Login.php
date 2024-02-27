<?php


?>
<!DOCTYPE html>
<title> Login</title>
  
<!-- header-->
<?php include('Header.php');?>

<!-- Welcome text-->
<section id="Welcome">
 <div class="banner">
  <div class="wrapper">
 
  <h1>Welcome to Aston Smart Parking</h1>
  <h2>
    Welcome to the Official Aston Smart Parking Website.
    See all avaliable car park near Aston University. Book Easily and Securely!
</h2>
</div>
</div>
</section>

<!-- Login Form-->
<div class="LoginBox">
      <div class="Login">Log In</div>

      <div class="errormessage">
      <?php
if (isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo"<p>Fill in all fields!</p>";
    }
    else if($_GET["error"]=="wronglogin"){
        echo"<p>Email or Password is incorect</p>";
     }
}
 ?>   
 </div>
<!-- Error Messages-->
<!-- Login Form-->
      <div class="Login-form">
      <form action="LoginFCheck.php" method="post">
          <input type="text"  name="email" placeholder="Email" class="input"><br />
          <input type="password" name="pwd" placeholder="Password" class="input"><br />
          <button type="submit" name="submit"> Login</button>
          <span><a href="Signup.php"> Not Registered? Click here to SignUp </a></span>
       </div>
      
    </div>
<!-- page breaks-->
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
<!-- footer-->
<?php include('Footer.php');?>

</html>