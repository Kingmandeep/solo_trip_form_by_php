<?php
$insert = false;
if(isset($_POST['name'])){

$server = "https://kingmandeep.github.io/solo_trip_form_by_php/";
$username = "root";
$password = "";

$conn = mysqli_connect($server,$username,$password);

if(!$conn){
    die("connection to this databse failed due to ".mysqli_connect_erro());
}

// echo "Success connecting to the databse";
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$other = $_POST['desc'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$sql = "INSERT INTO `solotrip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";


if($conn->query($sql)== true){
    // echo "Successfully inserted";
    $insert = true;
}else{
    echo "Error : .$sql <br> $conn->error";
}

$conn->close();
}

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>welcome to travel form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@300;400;500&family=Roboto&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <img class="bg" src="https://images3.alphacoders.com/658/thumb-1920-658828.jpg" alt="solo" style="
        width: 100%;
        position: absolute;
        z-index: -1;
        opacity: 0.9;
         ">
        <div class="container">
            <h1>Welcome to Mandeep Solo trip</h1>
            <p>Enter your details to conform your participation in this trip</p>
            <?php
            if($insert == true){
                echo "<p class='submitmsg'>Thanks for submitting your form.  we are happy to see you joining for the solo trip.</p>";
            }
            
            ?>
            <form action="index5.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name" required><br>
                <input type="text" name="age" id="age" placeholder="Enter your age" required><br>
                <input type="text" name="gender" id="gender" placeholder="Enter your gender" required><br>
                <input type="email" name="email" id="email" placeholder="Enter your email" required><br>
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" required><br>
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea><br>
                <button class="btn">Submit</button>
                
            </form>
            
        </div>
        
        <script src="index.js" async defer></script>
    </body>
</html>