<!-- Signup Functions/errorshandlers-->

<?php


function emptyFields($email,$name,$password,$phonenumber) {
    $result;
    if (empty($email) || empty($name) || empty($password) || empty($phonenumber)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidPlate($vehicleplate){
    if(preg_match("/\s/",$vehicleplate)) {
        return true; 
    } else {
        return false; 
    }
}


function invalidEmailFormat($email){
    $result = false; 
    if (
        strpos($email, "@hotmail.co.uk") === false &&
        strpos($email, "@hotmail.com") === false &&
        strpos($email, "@gmail.com") === false &&
        strpos($email, "@aston.ac.uk") === false
    ) {
        $result = true; 
    }
    return $result;
}



function invalidPhoneNumber($phonenumber){
    $result;
    if(!preg_match("/^[0-9]*$/",$phonenumber)) {
 $result=true;
    }
    else {
     $result=false;
    }
return  
     $result;
}

function EmailAlreadyExists($conn,$email,$phonenumber) {
$sql = "SELECT usersName, usersEmail, usersPassword, usersID FROM users WHERE usersEmail=? OR usersPhonenumber=?";
$stmt= mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:Signup.php?error=stmtfailed");
     exit();
}


mysqli_stmt_bind_param($stmt,"ss",$email,$phonenumber);
mysqli_stmt_execute($stmt);
$resultData = mysqli_stmt_get_result($stmt);

if($row=mysqli_fetch_assoc($resultData)){
    return $row;

}
else{
    $result= false;
    return $result;
}
mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $phonenumber, $vehicleplate, $destination, $password) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersPhonenumber, usersPlate, usersDestination, usersPassword) VALUES (?, ?, ?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:Signup.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $phonenumber, $vehicleplate, $destination, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:Signup.php?error=none");
    exit();
}





// Login Function/errorhandlers
function emptyInputLogin($email,$password){
    $result;
    if(empty($email) || empty($password)){
    $result=true;
    }
    else{
        $result=false;
    }
return  
     $result;
}

function loginUser($conn,$email,$password,){

    $EmailExists= EmailAlreadyExists($conn,$email,$email);
  


    if($EmailExists===false){
        header("location:Login.php?error=wronglogin");
        exit();
    }

    $passwordHashed=$EmailExists["usersPassword"];
    $checkPassword= password_verify($password,$passwordHashed);

    if($checkPassword===false){
        header("location:Login.php?error=wronglogin");
        exit();
    }
    else if($checkPassword===true){

        session_start();
        $_SESSION["userid"] = $EmailExists["usersID"];
        $_SESSION["useremail"] = $EmailExists["usersEmail"];
        $_SESSION["username"] = $EmailExists["usersName"];


        $userId = $EmailExists["usersID"];
        $sql = "SELECT usersDestination FROM users WHERE usersID = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: BookParking.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                if (!empty($row["usersDestination"])) {
                    $_SESSION["destination"] = $row["usersDestination"];
                } else {
                    // If destination doesn't exist, set a default destination
                    $_SESSION["destination"] = "Default Location";
                }
            }
        }
       
        header("location:BookParking.php");
        exit();

    }

}
