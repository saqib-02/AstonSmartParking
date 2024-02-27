<!-- Kills session when user logouts and then redirects to homepage-->

<?php

session_start();
session_unset();
session_destroy();

header("location:Login.php");
exit();
