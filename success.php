<?php

$fname = "";
$lname = "";
$email = "";
$phone = "";
$user_message = "";

session_start();





$entered_details = array("First Name" => $_SESSION['fname'] ,"Last Name" => $_SESSION['lname'] ,"Email" => $_SESSION['email'],"Phone" => $_SESSION['phone']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Successfull</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/success.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h2>Your message has been Recieved</h2>
            
        
        
            <h4>The details you have entered are</h4>
        </div>
        <div class="details">
            <?php 
            $arrlength = count($entered_details);
            foreach ($entered_details as $entry => $info) {
                echo  "<p> $entry : $info </p>";
                
            }
            ?>
 
        </div>
             
         
        <div class="go-back-btn">

            <a href="index.php">Go back to porfolio page</a>
        </div>
    </div>
</body>
</html>