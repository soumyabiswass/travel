<?php
$insert = false;
if (isset($_POST['name'])) {
    $insert = true;
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "trip"; // Add your database name here

    // Create connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$con) {
        die("Connection to this database failed due to: " . mysqli_connect_error());
    }

    // Fetch form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];

    // Prepare SQL statement
    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

    // Uncomment this line for debugging
    // echo $sql;

    if ($con->query($sql) === true) {
        $submit = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" class="css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="BPPIMT">
    <div class="container">
        <h1>Welcome To BPPIMT US Trip Form</h1>
        <p>Enter Your Details and submit this form to Confirm Your Participation in the Trip</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" class="name" id="name" name="name" placeholder="Enter Your name">
            <input type="text" class="age" id="age" name="age" placeholder="Enter Your age">
            <input type="text" class="gender" id="gender" name="gender" placeholder="Enter Your gender">
            <input type="text" name="email" id="email" placeholder="Enter Your email">
            <input type="text" name="phone" id="phone" placeholder="Enter Your phone number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>
    <script src="index.js"> </script>
</body>
</html>
