<?php
$login = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../partials/_dbconnect.php';
    $email = $_POST["username"];
    $password = $_POST["password"];

    // $userCheck = "SELECT * FROM `users` WHERE `email` = '$email' ";

    $sql = "Select * from users where email = '$email' and password = '$password' ";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = 1;
    } else {
        $login = 2;
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

    <link rel="stylesheet" href="../styles/sign-in-bg.css">

    <title>Sign-In</title>
</head>

<body>


    <div class="full-page sign-in-page">
        <?php
        if ($login == 1) {
            echo '<h1 style="text-align: center; color: white;">Success. You have successfully logged in </h1>';
        } elseif ($login == 2) {
            echo '<h1 style="text-align: center; color: white;">Email or Password doesnot match </h1>';
        }
        ?>
        <div class="sign-in-container">
            <div class="sign-in-form">
                <h1 class="dirt sign-in-h1"><a href="../index.php" style="text-decoration: none; color: white">BYTE<span class="og-brand-color">CODE</span></a></h1>
                <div class="sign-in-content">
                    <div class="sign-in-left">
                        <h1 style="font-weight: bold;">Welcome!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam iure illum aliquam accusamus impedit magni soluta vero saepe voluptatem nemo.</p>
                        <button><a href="../php/signup.php" style="text-decoration: none; color: white">Register Now</a></button>
                    </div>
                    <form class="sign-in-form-post" action="../php/signin.php" method="post">
                        <div class="sign-in-right">

                            <div class="sign-in-box">
                                <h1>Sign <span style="color: orangered;">In</span></h1>

                                <div class="data">
                                    <!-- <label class="form-label" for="sign-in-username">Email address</label> -->
                                    <input name="username" type="email" id="sign-in-username" placeholder="Email address" />
                                </div>
                                <div class="data">
                                    <!-- <label class="form-label" for="sign-in-password">Password</label> -->
                                    <input name="password" type="password" id="sign-in-password" placeholder="Password" />
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
    <div id='title'>
        <span>
        </span>
        <br>
        <span>

        </span>
    </div>



    </div>





</body>

</html>