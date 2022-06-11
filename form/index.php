<?php
$submit = false;
if (isset($_POST['name'])) {

    $server = 'localhost';
    $username = 'root';
    $password = '';

    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die('connection to this server is failed due to ' . mysqli_connect_error());
    }
    // echo 'Sucessfully conect database';

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $other = $_POST['desc'];

    $sql = "INSERT INTO `participants`.`students` (`name`, `age`, `gender`, `email`, `number`, `others`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";
    //echo $sql;

    if ($con->query($sql) == true) {
        //echo 'Sucessfully inserted';
        $submit = true;
    } else {
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form: Tech Club</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <img class="bardewa" src="bardewa.jpg" alt="Bardewa's Kingdom">
    <div class="container">
        <h1>Welcome to Tech Club of Trinity International College</h1>
        <p>Enter your details to confirm your particitation</p>
        <?php
        if ($submit == true) {
            echo "<p class='comment'>Thank you for filling out the form. We are delighted to have you join us.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="number" id="number" placeholder="Enter your number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>
    </div>

    <script src="index.js"></script>
</body>

</html>

