<?php

    require_once("conn/connMini.php");
    // process the form vars from memberJoin.php
    // pass the incoming form vars to "regular" vars
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    // query the db to insert the new mbr
    // do NOT insert the regular pswd -- use hashed version !!!
    $query = "INSERT INTO members(firstName, lastName, email) 
    VALUES('$firstName', '$lastName', '$email')";

    mysqli_query($conn, $query);

    // if it worked, make folders for the new member
    if(mysqli_affected_rows($conn) == 1) { // if it worked
        
        // if we got this far, let's tell the user:
        $msg = "Welcome " . $firstName . "! Thank you for joining! You will now be redirected to the Login 
        page!";
        // redirect to login page in 5 seconds
        header("Refresh:5; url=index.php", true, 303);
        
    } else { // it failed
        
        $msg = "Sorry! Couldn't sign you up! Please try again!";
        header("Refresh:5; url=index.php", true, 303);

    }

?>

<!DOCTYPE html>
<html lang="en-us">

<head>

    <meta charset="utf-8">
    <title>Member Join Processor</title>
    
</head>
    
<body>
    
    <h1 align="center"><?php echo $msg; ?></h1>

</body>

</html>