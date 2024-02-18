<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:appointment.php");
}
$con = mysqli_connect("localhost","root","","hms");
$id = $_SESSION["login"];
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






        
        <div id="appointment_home">
            
            <div id="a_h_left">
                <h2>APPOINTMENT</h2>
                <form action="" method="POST">

                    <div id="p_h_l_inputs">
                        <br><br>
                        <span>Patient Name</span> <input type="text" placeholder="For patient A" required name="p_name" class="p_name"> <br>
                        <span>Assigned Docter</span> <input type="text" placeholder="DOC-OCK"  name="d_name" required class="d_name"> <br>
                        <span>Date & Time</span> <input type="datetime-local" placeholder="For patient A" name="a_datetime" required class="a_datetime"> <br> <br>
                        <p id="outer_p_s" style="margin: 45px 0 0 -20px;"><button id="patient_sub" name="sub">Create Appointment</button></p>
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
                $insertquery = mysqli_query($con, "insert into appointment(a_id, p_name, d_name, a_date) values('', '$p_name', '$d_name', '$a_datetime')");
            }
            ?>


            <div id="a_h_right">

                <?php
                $con = mysqli_connect("localhost","root","","hms");
                $retrive = mysqli_query($con, "SELECT a_id , p_name, d_name, a_date from appointment order by a_id desc");
                while($get = mysqli_fetch_assoc($retrive))
                {
                    $a_id = $get['a_id'];
                    $p_name = $get['p_name'];
                    $d_name = $get['d_name'];
                    $a_datetime = $get['a_date'];

                    echo
                        "
                        <div id='apt' >
                            <i class='fa fa-hospital-user'></i>
                            <div>                            
                                <a href='aptedit.php?a_id=$a_id' title='Edit'><i class='fa fa-circle' style='color: rgba(65, 105, 225, 0.7)'></i></a>
                                <a href='aptdel.php?a_id=$a_id'  title='Delete'><i class='fa fa-circle' ></i></a>
                            </div>
                            <p>$p_name</p>
                            <p>$d_name</p>
                            <p>$a_datetime</p>
                        </div> 
                        "
                    ;
                }
                ?>
                
            </div>

        </div>
        
    </div>

        




        <script>

            $("#apt .fa").click(function(){
                $("#incfile").stop().fadeIn(500);
                $("#coverbg").animate({opacity: "1" , opacity: ".5"},250);
                $("#incfile .fa").click(function(){
                    $("#incfile").stop().fadeOut(100);
                    $("#coverbg").animate({opacity: ".5" , opacity: "1"},500);
                })
                $("#patient_sub").click(function(){
                    $("#incfile ").hide();
                });
            });

        </script>
                










    <script src="script.js" type="text/javascript"></script>




</body>
</html>