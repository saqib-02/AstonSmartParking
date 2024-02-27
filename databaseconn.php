
<!-- connection to database-->

<?php

$serverName= "localhost:3306";
$dBUsername= "root";
$dBPassword= "";
$dBName= "astonsmartparking";

$conn= mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Connection failed:" .mysqli_connect_error());
}

