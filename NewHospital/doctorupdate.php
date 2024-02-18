<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:doctotupdate.php");
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
    
    <title>Doctor -HMS</title>
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
                    <li class="non-active"><a href="appointment.php"> APPOINTMENT </a></li>
                    <li class="active"><a href="doctor.php"> DOCTOR </a></li>
                    <li class="non-active"><a href="nurse.php"> NURSE </a></li>
                    <li class="non-active"><a href="staff.php"> STAFF </a></li>
                    <li class="non-active"><a href="allrecords.php"> All RECORDS </a></li>
					<a href="logout.php" id="signout"><i class="fa fa-sign-out"></i>Logout</a>
				</ul>
			</div>
		</div>





        <?php
        $con = mysqli_connect("localhost","root","","hms");
        $d_id = $_GET['d_id'];
        $selectquery = mysqli_query($con,"SELECT * from doctor where d_id = '$d_id'");
        $get = mysqli_fetch_assoc($selectquery);
        $d_name = $get['d_name'];
        $d_dob = $get['d_dob'];
        $d_email = $get['d_email'];
        $d_cell = $get['d_cell'];
        $d_addr = $get['d_addr'];
        $d_ecell = $get['d_ecell'];
        $d_special = $get['d_special'];
        $d_workingsince = $get['d_workingsince'];
        $d_lastworkplace = $get['d_lastworkplace'];
        ?>



        <div id="doctor_home">
            <div id="d_h_left">
                <h2>DOCTER INFORMATION</h2>
                <form action="" method="POST">
                    <div id="p_h_l_inputs">
                        <h3>Doctor Information</h3>
                        <Span>Doctor Name </Span><input type="text" placeholder="Eg: Jhon Smith" required name="d_name" value="<?php echo $d_name?>"> <br>
                        <Span>Date of Birth </Span><input type="date" name="d_dob" value="<?php echo $d_dob?>"> <br>
                        
                        <Span>Email </Span><input type="email" placeholder="youremail@example.com" name="d_email" value="<?php echo $d_email?>"> <br>
                        <Span>Cell </Span><input type="tel" placeholder="xxx-xxxx-xxxx" name="d_cell" value="<?php echo $d_cell?>"> <br>
                        
                        <Span>Address </Span><input type="text" placeholder="Street no: xx || Area" name="d_addr" value="<?php echo $d_addr?>"> <br>
                        <Span>Emergency Number</Span><input type="text" placeholder="xxx-xxxx-xxxx" name="d_ecell" value="<?php echo $d_ecell?>"> <br>
                    </div>

                    <div id="diagnosis-inputs">
                        <h3>Additional Information</h3>
                        <Span>Specailization </Span><input type="text" placeholder="Eg: Dentist Surgeon" required name="d_special" value="<?php echo $d_special?>"> <br>
                        <Span>Working Since </Span><input type="date" name="d_workingsince" value="<?php echo $d_workingsince?>"> <br>
                        
                        <Span>Last Workplace </Span><input type="text" placeholder="Hospital Name" name="d_lastworkplace" value="<?php echo $d_lastworkplace?>"> <br>
                        
                    </div>
                    <p id="outer_p_s"><button id="patient_sub" type="submit" name="sub">Update</button></p>
                </form>
            </div>

            

            <?php
            if(isset($_POST['sub']))
            {
                $d_name = $_POST['d_name'];
                $d_dob = $_POST['d_dob'];
                $d_email = $_POST['d_email'];
                $d_cell = $_POST['d_cell'];
                $d_addr = $_POST['d_addr'];
                $d_ecell = $_POST['d_ecell'];
                $d_special = $_POST['d_special'];
                $d_workingsince = $_POST['d_workingsince'];
                $d_lastworkplace = $_POST['d_lastworkplace'];

                $con = mysqli_connect("localhost","root","","hms");
                $updatequerydoctor = mysqli_query($con, "UPDATE doctor set d_name = '$d_name', d_dob = '$d_dob', d_email = '$d_email', d_cell = '$d_cell', d_addr = '$d_addr', d_ecell = '$d_ecell', d_special = '$d_special', d_workingsince = '$d_workingsince', d_lastworkplace = '$d_lastworkplace' where d_id = '$d_id'");
                if($updatequerydoctor)
                {
                    echo "<script>window.location.href='allrecords.php'</script>";
                }
            }
            ?>

        </div>
 


    </div>







<script src="script.js" type="text/javascript"></script>




</body>
</html>