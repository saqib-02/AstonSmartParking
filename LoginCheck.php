<!-- Check if user is logged in.-->
<?php
  session_start();
?>
<?php
if(isset($_SESSION["useremail"])) {
}
else{
 echo "<script> alert('You need to Login to Book Parking'); window.location='Login.php'</script>";
}
?>

<?php
if(isset($_SESSION["useremail"])) {
    include 'LogoutHeader.php';
}
else{
    include 'LoginHeader.php';
}

?>