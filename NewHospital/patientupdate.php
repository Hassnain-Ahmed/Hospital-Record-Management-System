<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:patientupdate.php");
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
    
    <title>Patient -HMS</title>
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
                    <li class="active"><a href="patient.php"> PATIENT </a></li>
                    <li class="non-active"><a href="appointment.php"> APPOINTMENT </a></li>
                    <li class="non-active"><a href="doctor.php"> DOCTOR </a></li>
                    <li class="non-active"><a href="nurse.php"> NURSE </a></li>
                    <li class="non-active"><a href="staff.php"> STAFF </a></li>
                    <li class="non-active"><a href="allrecords.php"> All RECORDS </a></li>
					<a href="logout.php" id="signout"><i class="fa fa-sign-out"></i>Logout</a>
				</ul>
			</div>
		</div>








        <?php
        $con = mysqli_connect("localhost","root","","hms");
        $p_id = $_GET['p_id'];
        $selectquery = mysqli_query($con,"SELECT * from patient where p_id = $p_id");
        $get = mysqli_fetch_assoc($selectquery);
        $p_name = $get['p_name'];
        $p_dob = $get['p_dob'];
        $p_email = $get['p_email'];
        $p_cell = $get['p_cell'];
        $p_addr = $get['p_addr'];
        $p_ecell = $get['p_ecell'];
        $p_diagnosis = $get['p_diagnosis'];
        $p_symptoms = $get['p_symptom'];
        $p_medicine = $get['p_medicine'];
        $p_alergies = $get['p_alergies'];
        ?>





        <div id="patient_home">
            
            <form action="" method="POST">
                <div id="patient_home_left">
                    <h2>Add Patient Records</h2>
                    <br>
                    
                    <div id="p_h_l_inputs">
                        <h3>Patient Information</h3>
                        
                        <Span>Patient Name </Span><input type="text" name="p_name" placeholder="Eg: Jhon Smith" value="<?php echo $p_name?>">
                        <Span>Date of Birth </Span><input type="date" name="p_dob" value="<?php echo $p_dob?>">
                        
                        <Span>Email </Span><input type="email" placeholder="youremail@example.com" name="p_email" value="<?php echo $p_email?>">
                        <Span>Cell </Span><input type="tel" placeholder="xxx-xxxx-xxxx" name="p_cell" value="<?php echo $p_cell?>">
                        
                        <Span>Address </Span><input type="text" placeholder="Street no: xx || Area" name="p_addr" value="<?php echo $p_addr?>">
                        <Span>Emergency Number</Span><input type="text" placeholder="xxx-xxxx-xxxx" name="p_emergency" value="<?php echo $p_ecell?>">
    
                    </div>
                    
                    <div id="diagnosis-inputs">
                        <h3>Diagnosis Information</h3>
                        <Span>Diagnosis </Span><input type="text" placeholder="Eg: Headache"  name="pd_diagnosis" value="<?php echo $p_diagnosis?>"> <br>
                        <Span>Symptoms </Span><input type="text" placeholder="Eg: Fever,Cough" name="pd_symptoms" value="<?php echo $p_symptoms?>"> <br>
                        
                        <Span>Medicince </Span><input type="text" placeholder="Eg: Panadol" name="pd_medicine" value="<?php echo $p_medicine?>"> <br>
                        <Span>Alergies</Span><input type="text" placeholder="Eg: Peanut" name="pd_alergies" value="<?php echo $p_alergies?>"> <br>
                    </div>
                    
                    
                    <p id="outer_p_s"><button type="submit" name="sub" id="patient_sub">Update</button></p>
                </div>
            </form>


            <?php
            if(isset($_POST['sub']))
            {
                $p_name = $_POST['p_name'];
                $p_dob = $_POST['p_dob'];
                $p_email = $_POST['p_email'];
                $p_cell = $_POST['p_cell'];
                $p_addr = $_POST['p_addr'];
                $p_ecell = $_POST['p_emergency'];


                $pd_daignosis = $_POST['pd_diagnosis'];
                $pd_symptoms = $_POST['pd_symptoms'];
                $pd_medicine = $_POST['pd_medicine'];
                $pd_alergies = $_POST['pd_alergies'];
                
                $con = mysqli_connect("localhost", "root", "", "hms");
                $updatequerypatient = mysqli_query($con, "UPDATE patient set p_name = '$p_name', p_dob = '$p_dob', p_email = '$p_email', p_cell = '$p_cell', p_addr = '$p_addr', p_ecell = '$p_ecell', p_diagnosis = '$p_diagnosis', p_symptom = '$p_symptoms', p_alergies = '$p_alergies' where p_id = '$p_id'");
                if($updatequerypatient)
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