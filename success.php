<?php

$fname = "";
$lname = "";
$email = "";
$phone = "";
$user_message = "";

session_start();




$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$user_message = $_SESSION['user_message'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Successfull</title>
</head>
<body>
    <h2>Your message has been Recieved</h2>

    <h4>The details you have entered are</h4>
    <table>
        <tr>
            <td> First Name</td>
            <td><?php echo $fname?></td>
        </tr>
        <tr>
            <td>Last name</td>
            <td><?php echo $lname?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><?php echo $phone?></td>
        </tr>
        <tr>
            <td>Message</td>
            <td><?php echo $user_message?></td>
        </tr>
    </table>
</body>
</html>