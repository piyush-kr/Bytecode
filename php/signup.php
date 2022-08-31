<?php
$showAlert = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../partials/_dbconnect.php';
    $username = $_POST["full-name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // $userCheck = "SELECT * FROM `users` WHERE `email` = '$email' ";

    $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'");


    if (mysqli_num_rows($select)) {
        $showAlert = 1;
    } else {
        $sql = "INSERT INTO `users` (`username`, `email`, `password`, `dt`) VALUES ('$username', '$email', '$password', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = 2;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require '../partials/_head.php' ?>

    <link rel="stylesheet" href="/ByteCode/styles/sign-up-bg.css">

    <title>Sign-Up</title>
</head>

<body>

    <?php
    if ($showAlert == 2) {
        echo '<h1 style="text-align: center; color: white;">Success. You can now Log in </h1>';
    } elseif ($showAlert == 1) {
        echo '<h1 style="text-align: center; color: white;">Email id is already in use </h1>';
    }
    ?>
    <div class="full-page sign-up-page">

        <div class="sign-up-left">
            <div class="left-down">
                <h1 class="dirt sign-up-h1"><a href="/ByteCode/index.php" style="text-decoration: none; color: white">BYTE<span class="og-brand-color">CODE</span></a></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam iure illum aliquam accusamus impedit magni soluta vero saepe voluptatem nemo.</p>
                <div class="account"><a href="/ByteCode/php/signin.php" class="have-account">Already have an account?</a></div>
            </div>
        </div>
        <div class="sign-up-container">
            <form action="/ByteCode/php/signup.php" method="post">
                <h1>Hello <span style="color: orange;">There!</span></h1>
                <h2>Create new Account</h2>
                <input type="text" name="full-name" id="name" placeholder="Full Name" class="ip-field">
                <input type="email" name="email" id="email" placeholder="Email ID" class="ip-field">
                <input type="password" name="password" id="password" placeholder="Password" class="ip-field">
                <button type="submit" class="reg-btn">Register</button>
            </form>

        </div>

    </div>





</body>

</html>