<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:patient.php");
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


        <div id="patient_home">
            
            <form action="" method="POST">
                <div id="patient_home_left">
                    <h2>Add Patient Records</h2>
                    <br>
                    
                    <div id="p_h_l_inputs">
                        <h3>Patient Information</h3>
                        
                        <Span>Patient Name </Span><input type="text" name="p_name" placeholder="Eg: Jhon Smith" required>
                        <Span>Date of Birth </Span><input type="date" name="p_dob">
                        
                        <Span>Email </Span><input type="email" placeholder="youremail@example.com" name="p_email">
                        <Span>Cell </Span><input type="tel" placeholder="xxx-xxxx-xxxx" name="p_cell">
                        
                        <Span>Address </Span><input type="text" placeholder="Street no: xx || Area" name="p_addr">
                        <Span>Emergency Number</Span><input type="text" placeholder="xxx-xxxx-xxxx" name="p_emergency">
    
                    </div>
                    
                    <div id="diagnosis-inputs">
                        <h3>Diagnosis Information</h3>
                        <Span>Diagnosis </Span><input type="text" placeholder="Eg: Headache" required name="pd_diagnosis"> <br>
                        <Span>Symptoms </Span><input type="text" placeholder="Eg: Fever,Cough" name="pd_symptoms"> <br>
                        
                        <Span>Medicince </Span><input type="text" placeholder="Eg: Panadol" name="pd_medicine"> <br>
                        <Span>Alergies</Span><input type="text" placeholder="Eg: Peanut" name="pd_alergies"> <br>
                    </div>
                    
                    
                    <p id="outer_p_s"><button type="submit" name="sub" id="patient_sub">Submit</button></p>
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

                if($p_name and $pd_daignosis)
                {
                    
                    $con = mysqli_connect("localhost", "root", "", "hms");
                    mysqli_query($con, "insert into patient(p_id, p_name, p_dob, p_email, p_cell, p_addr, p_ecell, p_diagnosis, p_symptom, p_medicine, p_alergies) values('','$p_name', '$p_dob', '$p_email' , '$p_cell', '$p_addr', '$p_ecell', '$pd_daignosis', '$pd_symptoms' , '$pd_medicine', '$pd_alergies')");
                }

            }
            ?>


















            
            
            
            
            <div id="patient_home_right">
                <form action="" method="POST">
                <h3>Patient Records</h3>
                </form>




                <div id="patient_table">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Cell</th>
                            <th>Address</th>
                            <th>Emergency</th>
                            <th>Diagnosis</th>
                            <th>Symptoms</th>
                            <th>Medicince</th>
                            <th>Alergies</th>
                        </tr>

                        <?php
                            $con = mysqli_connect("localhost", "root", "", "hms");
                            $selectquerypatient = mysqli_query($con,"SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), p_dob)), '%Y') + 0 AS age from patient");
                            while($get = mysqli_fetch_assoc($selectquerypatient))
                            {
                                $p_id = $get['p_id'];
                                $p_name = $get['p_name'];
                                $p_dob = $get['p_dob'];
                                $p_age = $get['age'];
                                $p_email = $get['p_email'];
                                $p_cell = $get['p_cell'];
                                $p_addr = $get['p_addr'];
                                $p_ecell = $get['p_ecell'];

                                $pd_daignosis = $get['p_diagnosis'];
                                $pd_symptoms = $get['p_symptom'];
                                $pd_medicine = $get['p_medicine'];
                                $pd_alergies = $get['p_alergies'];
                
                                echo 
                                "
                                    <tr>
                                        <td>$p_id</td>
                                        <td>$p_name</td>
                                        <td>$p_dob</td>
                                        <td>$p_age</td>
                                        <td>$p_email</td>
                                        <td>$p_cell</td>
                                        <td>$p_addr</td>
                                        <td>$p_ecell</td>
                                        <td>$pd_daignosis</td>
                                        <td>$pd_symptoms</td>
                                        <td>$pd_medicine</td>
                                        <td>$pd_alergies</td>
                                    </tr>
                                ";
                            }
                        ?>
                    </table>
                </div>
                
            </div>

        </div>
        

        <!-- <h1 id="msgbox">
            <i class="fa fa-close"></i>
        </h1> -->

    </div>









    <script src="script.js" type="text/javascript"></script>


</body>
</html>