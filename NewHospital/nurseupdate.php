<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:nurseupdate.php");
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
    
    <title>Nurse -HMS</title>
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
                    <li class="non-active"><a href="doctor.php"> DOCTOR </a></li>
                    <li class="active"><a href="nurse.php"> NURSE </a></li>
                    <li class="non-active"><a href="staff.php"> STAFF </a></li>
                    <li class="non-active"><a href="allrecords.php"> All RECORDS </a></li>
					<a href="logout.php" id="signout"><i class="fa fa-sign-out"></i>Logout</a>
				</ul>
			</div>
		</div>





        <?php
        $con = mysqli_connect("localhost", "root", "", "hms");
        $n_id = $_GET['n_id'];
        $selectquerynurse = mysqli_query($con, "SELECT * from nurse where n_id = '$n_id'");
        $get = mysqli_fetch_assoc($selectquerynurse);
        $n_name = $get['n_name'];
        $n_dob = $get['n_dob'];
        $n_email = $get['n_email'];
        $n_cell = $get['n_cell'];
        $n_addr = $get['n_addr'];
        $n_ecell = $get['n_ecell'];
        $n_workingsince = $get['n_workingsince'];
        $n_lastwrokplace = $get['n_lastworkplace'];
        $n_referencename = $get['n_referencename'];
        $n_referencenum = $get['n_referencenum'];
        ?>



        
        <div id="appointment_home">
            
            <div id="a_h_left">
                <h2>NURSE INFORMATION</h2>
                <form action="" method="POST">

                    <div id="p_h_l_inputs">
                        <span>Nurse Name</span> <input type="text" placeholder="Jhon | Caroline" name="n_name" value="<?php echo $n_name?>"> <br>
                        <Span>Date of Birth </Span><input type="date" name="n_dob" value="<?php echo $n_dob?>"> <br>
                        
                        <Span>Email </Span><input type="email" placeholder="youremail@example.com" name="n_email" value="<?php echo $n_email?>"> <br>
                        <Span>Cell </Span><input type="tel" placeholder="xxx-xxxx-xxxx" name="n_cell" value="<?php echo $n_cell?>"> <br>
                        
                        <Span>Address </Span><input type="text" placeholder="Street no: xx || Area" name="n_addr" value="<?php echo $n_addr?>"> <br>
                        <Span>Emergency Number</Span><input type="text" placeholder="xxx-xxxx-xxxx" name="n_ecell" value="<?php echo $n_ecell?>"> <br>
                    </div>

                    <div id="diagnosis-inputs">
                        <h3>Work History</h3>
                        <Span>Last Workplace </Span><input type="text" placeholder="Eg: Saint Joseph Sanctuary" name="n_lastworkplace" value="<?php echo $n_lastwrokplace?>"> <br>
                        <Span>Working Since </Span><input type="date" name="n_workingsince" value="<?php echo $n_workingsince?>"> <br>
                        
                        <Span>References Name</Span><input type="text" placeholder="Walter White" name="n_referencename" value="<?php echo $n_referencename?>"> <br>
                        <Span>Reference Contact</Span><input type="tel" placeholder="xxx-xxxx-xxxx" name="n_referencenum" value="<?php echo $n_referencenum?>"> <br>
                        
                    </div>
                    <p id="outer_p_s"><button id="patient_sub" name="sub">Submit</button></p>
                </form>
            </div>


            <?php
            if(isset($_POST['sub']))
            {
                $n_name = $_POST['n_name'];
                $n_dob = $_POST['n_dob'];
                $n_email = $_POST['n_email'];
                $n_cell = $_POST['n_cell'];
                $n_addr = $_POST['n_addr'];
                $n_ecell = $_POST['n_ecell'];
                $n_lastworkplace = $_POST['n_lastworkplace'];
                $n_workingsince = $_POST['n_workingsince'];
                $n_referencename = $_POST['n_referencename'];
                $n_referencenum = $_POST['n_referencenum'];

                $con = mysqli_connect("localhost", "root", "", "hms");
                $updatequerynurse = mysqli_query($con, "UPDATE nurse set n_name = '$n_name', n_dob = '$n_dob', n_email = '$n_email', n_cell = '$n_cell', n_addr = '$n_addr', n_ecell = '$n_ecell', n_workingsince = '$n_workingsince', n_lastworkplace = '$n_lastworkplace', n_referencename = '$n_referencename', n_referencenum = '$n_referencenum'   where n_id = '$n_id'");
                if($updatequerynurse)
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