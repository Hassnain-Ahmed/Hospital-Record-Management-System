<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:staff.php");
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
    
    <title>Staff -HMS</title>
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
                    <li class="non-active"><a href="nurse.php"> NURSE </a></li>
                    <li class="active"><a href="staff.php"> STAFF </a></li>
                    <li class="non-active"><a href="allrecords.php"> All RECORDS </a></li>
					<a href="logout.php" id="signout"><i class="fa fa-sign-out"></i>Logout</a>
				</ul>
			</div>
		</div>


        
        <div id="appointment_home">
            
            <div id="a_h_left">
                <h2>STAFF INFORMATION</h2>
                <form action="" method="POST">

                    <div id="p_h_l_inputs">
                        <span>Employee Name</span> <input type="text" placeholder="Jhon | Caroline" required name="s_name"> <br>
                        <Span>Date of Birth </Span><input type="date" name="s_dob"> <br>
                        
                        <Span>Email </Span><input type="email" placeholder="youremail@example.com" name="s_email"> <br>
                        <Span>Cell </Span><input type="tel" placeholder="xxx-xxxx-xxxx" name="s_cell"> <br>
                        
                        <Span>Address </Span><input type="text" placeholder="Street no: xx || Area" name="s_addr"> <br>
                        <Span>Emergency Number</Span><input type="text" placeholder="xxx-xxxx-xxxx" name="s_ecell"> <br>
                    </div>

                    <div id="diagnosis-inputs">
                        <h3>Work History</h3>
                        <Span>Last Workplace </Span><input type="text" placeholder="Eg: Saint Joseph Sanctuary" required name="s_lastworkplace"> <br>
                        <Span>Working Since </Span><input type="date" name="s_workingsince"> <br>
                        
                        <Span>References Name</Span><input type="text" placeholder="Walter White" name="s_referencename"> <br>
                        <Span>Reference Contact</Span><input type="tel" placeholder="xxx-xxxx-xxxx" name="s_referencenum"> <br>
                        
                    </div>
                    <p id="outer_p_s"><button id="patient_sub" name="sub">Submit</button></p>
                </form>
            </div>


            <?php
            if(isset($_POST['sub']))
            {
                $s_name = $_POST['s_name'];
                $s_dob = $_POST['s_dob'];
                $s_email = $_POST['s_email'];
                $s_cell = $_POST['s_cell'];
                $s_addr = $_POST['s_addr'];
                $s_ecell = $_POST['s_ecell'];
                $s_lastwrokplace = $_POST['s_lastworkplace'];
                $s_workingsince = $_POST['s_workingsince'];
                $s_referencename = $_POST['s_referencename'];
                $s_referencenum = $_POST['s_referencenum'];

                $con = mysqli_connect("localhost", "root", "", "hms");
                $insertquery = mysqli_query($con, "insert into staff(s_id, s_name, s_dob, s_email, s_cell, s_addr, s_ecell, s_lastworkplace, s_workingsince, s_referencename, s_referencenum) values('', '$s_name', '$s_dob', '$s_email', '$s_cell', '$s_addr', '$s_ecell', '$s_lastwrokplace', '$s_workingsince', '$s_referencename', '$s_referencenum')");
            }
            ?>

            
            <div id="d_h_right">
                <h3>Employee Records</h3>
                
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
                        </tr>
                        
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "hms");
                        $retrive = mysqli_query($con, "SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), s_dob)), '%Y') + 0 AS age from staff");
                        while($get = mysqli_fetch_assoc($retrive))
                        {
                            $s_id = $get['s_id'];
                            $s_name = $get['s_name'];
                            $s_dob = $get['s_dob'];
                            $s_age = $get['age'];
                            $s_email = $get['s_email'];
                            $s_cell = $get['s_cell'];
                            $s_addr = $get['s_addr'];
                            $s_ecell = $get['s_ecell'];
                            $s_lastwrokplace = $get['s_lastworkplace'];
                            $s_workingsince = $get['s_workingsince'];
                            $s_referencename = $get['s_referencename'];
                            $s_referencenum = $get['s_referencenum'];
                            
                            echo
                            "
                                <tr>
                                    <td>$s_id</td>
                                    <td>$s_name</td>
                                    <td>$s_dob</td>
                                    <td>$s_age</td>
                                    <td>$s_email</td>
                                    <td>$s_cell</td>
                                    <td>$s_addr</td>
                                    <td>$s_ecell</td>
                                </tr>
                            "
                            ;
                        }
                        ?>


                    </table>
                </div>
            </div>



        </div>









    </div>




    <script src="script.js" type="text/javascript"></script>



</body>
</html>