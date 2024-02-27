<!-- Checks if the user is logged in.-->
<?php
  session_start();
?>
<!-- Nav bar changes depending on if the user is logged in or not-->
<?php
if(isset($_SESSION["useremail"])) {
    include 'LogoutHeader.php';
}
else{
    include 'LoginHeader.php';
}

?>



  