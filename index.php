<?php
$insert = false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
//echo "Successfully connected to the database."

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$desc = $_POST['desc'];


$sql = "INSERT INTO `test`. `test` (`name`, `phone`, `email`, `gender`, `description`, `date`) VALUES ('$name', '$phone', '$email', '$gender', '$desc', current_timestamp());";

//echo $sql;

if($con->query($sql) == true){
   // echo "Data inserted successfully";
   $insert = true;
}
else{
    echo "Error : $sql <br> $con->error";
}

$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Membership form</h1>
        <?php
        if($insert == true)
        echo "<p>Form Submitted successfully.</p>"
        
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="phone" id="phone" placeholder="Enter phone number">
            <input type="email" name="email" id="email" placeholder="Enter email">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Any comments...."></textarea>
            <button>Submit</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>