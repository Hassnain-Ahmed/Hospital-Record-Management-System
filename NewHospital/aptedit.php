<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:aptedit.php");
}
$con = mysqli_connect("localhost","root","","hms");
$id = $_SESSION["login"];


$a_id = $_GET['a_id'];
$upd = mysqli_query($con, "SELECT * from appointment where a_id = '$a_id'");
$get = mysqli_fetch_assoc($upd);
$p_name = $get['p_name'];
$d_name = $get['d_name'];
$a_datetime = $get['a_date'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Appointment -HMS</title>
    <script src="Jquery/jquery.js"></script>
    <link rel="icon" href="src/Untitled-1.png">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="index.css">

    <style>
        #updatebox
        {
            position: absolute;
            top: 45%; left: 50%;
            transform: translate(-50%,-50%) scale(1.2);
            background-color: rgb(92, 118, 197, .6);
            z-index: 1;
            width: 500px; height: 265px;
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            font-family: product sans;
            color: #333;
            /* display: none; */
        }
        #updatebox .fa
        {
            position: absolute;
            top: 10px;
            right: 10px;
            color: rgba(255, 0, 0, 0.7);
            cursor: pointer;
        }
        #p_h_l_inputs-update
        {
            margin-left: -10px;
        }
        
        
        #p_h_l_inputs-update input
        {
            width: 300px; height: 30px;
            margin: 5px;
            float: left;
            padding: 5px;
            border: none;
            border-radius: 5px;
        }
        #p_h_l_inputs-update input:focus
        {
            outline: 1px solid rgb(92, 118, 197);
        }
        #p_h_l_inputs-update span
        {
            width: 160px;
            float: left;
            margin: 10px 0 0 0;
            text-align: right;
        }
    </style>
</head>
<body>



<div id="coverbg">

        <!-- HeadBar -->
        <div id="cover-head-bar">
            <div id="head-bar">
                <span><i class="fa fa-phone"></i>+92-311-234-5612</span>
                <span><i class="fa fa-envelope"></i>hms@gmail.com</span>
                <span id="time"><i class="fa fa-clock"></i>Time</span>
            </div>
        </div>



        

        <!-- Navbar -->
		<div id="cover-navbar">
			<div id="navbar">
				<a href="home.php"><h2 id="navbar-title">Hospital Management System</h2></a>
				<ul>
                    <li class="non-active"><a href="patient.php"> PATIENT </a></li>
                    <li class="active"><a href="appointment.php"> APPOINTMENT </a></li>
                    <li class="non-active"><a href="doctor.php"> DOCTOR </a></li>
                    <li class="non-active"><a href="nurse.php"> NURSE </a></li>
                    <li class="non-active"><a href="staff.php"> STAFF </a></li>
                    <li class="non-active"><a href="allrecords.php"> All RECORDS </a></li>
					<a href="logout.php" id="signout"><i class="fa fa-sign-out"></i>Logout</a>
				</ul>
			</div>
		</div>





        <div id="updatebox">
            <a href="appointment.php"><i class="fa fa-circle"></i></a>
            <form action="" method="POST">
            
                <div id="p_h_l_inputs-update">
                    <br><br>
                    <span>Patient Name</span> <input type="text" placeholder="For patient A" required name="p_name" class="p_name" value="<?php echo $p_name?>"> <br>
                    <span>Assigned Docter</span> <input type="text" placeholder="DOC-OCK"  name="d_name" required class="d_name" value="<?php echo $d_name?>"> <br>
                    <span>Date & Time</span> <input type="datetime-local" placeholder="For patient A" name="a_datetime" required class="a_datetime" value="<?php echo $a_datetime?>"> <br> <br>
                    <p id="outer_p_s" style="margin: 45px 0 0 -20px;">
                        <button id="patient_sub" name="sub">Update Record</button>
                    </p>
                </div>
                
            </form>
        </div>


        <?php
            if(isset($_POST['sub']))
            {
                $p_name = $_POST['p_name'];
                $d_name = $_POST['d_name'];
                $a_datetime = $_POST['a_datetime'];

                $con = mysqli_connect("localhost","root","","hms");
                $updatequery = mysqli_query($con, "UPDATE appointment set p_name = '$p_name', d_name='$d_name', a_date='$a_datetime' where a_id='$a_id'");
                if($updatequery)
                {
                echo "<script>window.location.href='appointment.php'</script>";
                }
            }
            ?>



        <script>

            $("#apt .fa").click(function(){
                $("#updatebox").stop().fadeIn(500);
                $("#coverbg").animate({opacity: "1" , opacity: ".5"},250);
                $("#updatebox .fa").click(function(){
                    $("#updatebox").stop().fadeOut(100);
                    $("#coverbg").animate({opacity: ".5" , opacity: "1"},500);
                })
                $("#patient_sub").click(function(){
                    $("#updatebox").hide();
                });
            });

        </script>

</div>





</body>
</html>