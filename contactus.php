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
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contactus.css">
</head>
<body>
    <div class="container">

        <h2>We would like to hear from you </h2>
        <br>
        <form action="" method = "post" id="feedback">
            <div class="user-input">
                <div class="user-info">
                    <label for="fname">First Name</label>  
                    <input type="text" name="fname" id="fname"> 
        
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname"> 
                    
                    
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"> 
                    <!-- <input type="hidden" value= <?php echo $email;?>>  -->
                    
                    
                    <label for="phone">Phone</label> 
                    <input type="text" name="phone" id="phone"> 
                </div>
    
                
                <div class="user-message">
                    <label for="user_message">Message</label> 
                    <input type="text" name="user_message" id="user_message" class="user_message-input">
                    <input type="submit" value="  submit  " class="submit">
                </div>
            </div>
            
             
        </form>
        
    </div>
</body>
</html>