<?php

session_start();
// initializevalues
$fname = "";
$lname = "";
$email = "";
$phone = "";

$user_message = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['fname'] = $fname = $_POST['fname'];
    $_SESSION['lname'] = $lname= $_POST['lname'];
    $_SESSION['email'] = $email = $_POST['email'];
    $_SESSION['phone'] = $phone = $_POST['phone'];
    $_SESSION['user_message'] = $user_message = $_POST['user_message'];

    do {    
        if ( empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($user_message)) {
            echo " All fields are required ";
            break;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Enter a valid Email";
            break;
        }

        if (!preg_match('/^[0-9]{10}+$/',$phone)) {
            echo "Enter a valid phone number";
            break;
        }



        $delimiter = ",";
        $filename = "feedbacksWithoutMysql.csv";

        $file = fopen("$filename","a");

        $lineData = array($fname, $lname , $email, $phone, $user_message);
        fputcsv($file,$lineData,$delimiter);

        fseek($file,0);
        header("location: /assignment4/success.php");

    } while(false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me!!</title>
</head>
<body>
    <h2>We would like to hear from you </h2>
    <br>
    <form action="" method = "post" id="feedback">
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
                <td><input type="hidden" value= <?php echo $email;?>></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td>Message</td>
                
            </tr>
            <input type="submit" value="  submit  ">
        </table>
    </form>
    <textarea rows="4" cols="50" name="user_message" form="feedback"></textarea><br>
</body>
</html>