<?php
echo '<script src="" type="text/javascript"></script>';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login -HMS</title>
    <script src="Jquery/jquery.js"></script>
    <link rel="icon" href="src/Untitled-1.png">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="index.css">




</head>

<body
    style="background-image: linear-gradient(rgb(0,0,0, .1),rgb(0,0,0, .7)), url(src/index.jpg); background-size:cover; backdrop-filter: blur(15px);">


    <?php
    $con = mysqli_connect("localhost", "root", "", "hms");
    $trigger = 0;
    $trigger2 = 0;
    if (isset($_POST['sub'])) {
        session_start();


        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username && $password) {
            $query = mysqli_query($con, "SELECT * from signup WHERE si_username = '$username' AND si_password ='$password'");
            $result = mysqli_num_rows($query);
            if ($result) {
                $get = mysqli_fetch_assoc($query);
                $id = $get['si_id'];
                $_SESSION['login'] = $id;
                header("Location:home.php");
            } else {
                $trigger = 1;
            }
        } else {
            $trigger2 = 1;
        }
    }
    ?>


    <form action="" method="POST">
        <div id="login_form">
            <h2>Login</h2>
            <p>Enter credentails to Operate</p>
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password"> <br>

            <div id='login-msg-box'>
                <?php
                if ($trigger == 1) {
                    echo "<span class='red'>Incorrect Username or Password</span>";
                } else if ($trigger2 == 1) {
                    echo "<span class='red'>Enter Username and Password</span>";
                }
                ?>
            </div>

            <button id="login_btn" type="submit" name="sub">Login</button>
            <a href="signup.php"><button id="signup_btn" type="button">Signup</button> </a>
            <p style="font-size: 13px">Forgot Password ?<a href="">Click Here</a></p>
        </div>
    </form>

</body>

</html>