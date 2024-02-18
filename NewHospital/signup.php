<?php
echo '<script src="" type="text/javascript"></script>';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Signup -HMS</title>
    <script src="Jquery/jquery.js"></script>
    <link rel="icon" href="src/Untitled-1.png">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="index.css">

    


</head>
<body style="background-image: linear-gradient(rgb(0,0,0, .1),rgb(0,0,0, .7)), url(src/index.jpg); background-size:cover; backdrop-filter: blur(15px);">
        


    <form action="" method="post">
        <div id="login_form" class="signup">
            <h2 style="margin-top: 15px;">Signup</h2>
            <p>Enter Details to signup</p>
            <input type="text" placeholder="Name" id="si_name" required value="" name="si_name">
            <input type="email" placeholder="Email" id="si_email" value="" required name="si_email">
            <input type="text" placeholder="Username" id="si_username" value="" required name="si_username">
            <input type="password" placeholder="Password" id="si_pass" value="" required name="si_pass"> <br>
            <input type="password" placeholder="Confirm Password" id="si_confirm_pass" value="" required name="si_confirm_pass"> <br>
            <button type="submit" id="signup" name="signup">Signup</button>
            <p style="font-size: 13px">Have and Account? <a href="index.php">Login</a></p>
        </div>
    </form>


    <?php
    $con = mysqli_connect("localhost","root","","hms");
    if(isset($_POST['signup']))
    {
        $si_name = $_POST['si_name'];
        $si_email = $_POST['si_email'];
        $si_username = $_POST['si_username'];
        $si_pass = $_POST['si_pass'];
        $si_confirm_pass = $_POST['si_confirm_pass'];

        if($si_pass == $si_confirm_pass)
        {
            if($si_name and $si_email and $si_pass and $si_username)
            {
                $query = mysqli_query($con, "INSERT into signup values('','$si_name', '$si_email', '$si_username', '$si_pass')");
                if($query)
                {
                    echo "<script>window.location.href='index.php'</script>";
                }
            }
        }
        else 
        {
            echo "Password does not match";
        }
    }
    ?>







    <script>
        let si_name = $("#si_name");
        let si_email = $("#si_email");
        let si_username = $("#si_username");
        let si_pass = $("#si_pass");
        let si_confirm_pass = $("#si_confirm_pass");
        $("#signup").click(function(){
            if(si_name.val() == "") { $(si_name).css("border","1px solid red") } else{ $(si_name).css("border","1px solid transparent"); }
            if(si_email.val() == "") { $(si_email).css("border","1px solid red") } else{ $(si_email).css("border","1px solid transparent"); }
            if(si_username.val() == "") { $(si_username).css("border","1px solid red") } else{ $(si_username).css("border","1px solid transparent"); }
            if(si_pass.val() == "") { $(si_pass).css("border","1px solid red") } else{ $(si_pass).css("border","1px solid transparent"); }
            if(si_confirm_pass.val() == "") { $(si_confirm_pass).css("border","1px solid red") } else{ $(si_confirm_pass).css("border","1px solid transparent"); }
        });
    </script>

</body>
</html>