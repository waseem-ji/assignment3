<?php
$id = "";
$fname = "" ;
$lname = "" ;
$email = "" ;
$phone = "" ;

$error_message = "";

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = val($_POST['fname']);
    $lname = val($_POST['lname']);
    $email = val($_POST['email']);
    $phone = val($_POST['phone']);
    $user_message = val($_POST['user_message']);

    do {
        if ( empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($user_message) ) {
            $error_message = "All Fields are required";
        }
    
        // Enter data into table
        $sql = "INSERT INTO feedback (firstname,lastname,email,phone,message) VALUES('$fname','$lname','$email','$phone','$user_message');";
        if ($conn->query($sql) == TRUE){
            
            echo "Your message has been recieved :)";
        }
        else {
            echo "ERROR: " . $sql . "<br>" . $conn->error;
        }

    }while(false);
    }






    

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 3</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php
    $education = array("HighSchool"=>"93.1%" , "Higher Secondary" => "80.1%" , "Btech" => "75%");
    $skills = array("python","django","mysql","git","postgres","HTML CSS JS Bootstrap");
    ?>
    <div class="container top">
        <header>
            <div class="title">
                <h1> WaseemJi's Porfolio </h1>
                <p> This page contains informations and descriptions   </p>
            </div>
            <div class="my-image">
    
            </div>
            <nav class="site-nav">
                <ul class="group">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Download CV</a></li>
                    <li><a href="contactus.php">Contact mE</a></li>
                </ul>
            </nav>

        </header>

    </div>
    <div class="container ">
        <div class="card">
            <div class="inner-card-1">
            <!-- <h3> Education</h3> -->
        <?php
        echo "<hr/> <h3>Education </h3>";
        foreach ($education as $school => $percent) {
            echo  "<p>$school " . ":" . "$percent </p>";
            
        }
        ?>

        </div>
        <div class="inner-card-2">
            <?php
            echo "<hr/> <h3>My Skills </h3>";
            $arrlength = count($skills);
            for ($i=0 ; $i < $arrlength ; $i++){
                echo $skills[$i] . "<br/>";
            }
            // var_dump($skills);
            ?>
            <hr>    
        </div>
        </div>
        

    </div>

</body>
</html>