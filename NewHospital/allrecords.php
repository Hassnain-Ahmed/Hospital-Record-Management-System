<?php
echo '<script src="" type="text/javascript"></script>';
session_start();
if(!isset($_SESSION["login"]))
{
    header("Location:allrecords.php");
}
$con = mysqli_connect("localhost","root","","hms");
$id = $_SESSION["login"];
?>




<!DOCTYPE html>
<html lang="en" id="allrecordes">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>All Records</title>
    <script src="Jquery/jquery.js"></script>
    <link rel="icon" href="src/Untitled-1.png">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    


    <div id="a-l-coverbg">

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
                    <li class="non-active"><a href="staff.php"> STAFF </a></li>
                    <li class="active"><a href="allrecords.php"> All RECORDS </a></li>
					<a href="logout.php" id="signout"><i class="fa fa-sign-out"></i>Logout</a>
				</ul>
			</div>
		</div>








        <div id="a-l">

            <div id="al_searchbar">
                <h3>Patient Records</h3>
                <div id="al-searchbar-input">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search Records" id="search">
                </div>
            </div>
            
            <div id="a-l-right">
                <div id="result"></div>
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
                            <th>&nbsp;</th>
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
                                        <td><a href='patientupdate.php?p_id=$p_id'><button>Edit Record</button></a></td>
                                    </tr>
                                ";
                            }
                        ?>
                        
                    </table>
                </div>
                
            </div>
        </div>

        <!-- PATIENT SCRIPT -->
        <script>
        $("#search").keyup(function(){
            let txt = $(this).val();
            if(txt != '')
            {
                $.post('live.php',{search:txt},function(data){
                    $("#result").html(data);
                });
            }
            else
            {
                $('#result').html('');
            }
        });
        $("#search").focusin(function(){
            $("#patient_table").hide();
        });
        $("#search").focusout(function(){
            $("#patient_table").show();
        });
        </script>














        



        <div id="a-l">

            <div id="al_searchbar">
                <h3>Doctor Records</h3>
                <div id="al-searchbar-input">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search Records" id="doctor_search" name="doctor_search">
                </div>
            </div>
            
            <div id="a-l-right">
                <div id="doctor_result"></div>
                <div id="patient_table" class="d">
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
                            <th>Specialization</th>
                            <th>Working Since</th>
                            <th>Last Workplace</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php
                        $con = mysqli_connect("localhost","root","","hms");
                        $retrive = mysqli_query($con, "SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), d_dob)), '%Y') + 0 AS age from doctor");
                        while($get = mysqli_fetch_assoc($retrive))
                        {
                            $d_id = $get['d_id'];
                            $d_name = $get['d_name'];
                            $d_dob = $get['d_dob'];
                            $d_age = $get['age'];
                            $d_email = $get['d_email'];
                            $d_cell = $get['d_cell'];
                            $d_addr = $get['d_addr'];
                            $d_ecell = $get['d_ecell'];
                            $d_special = $get['d_special'];
                            $d_workingsince = $get['d_workingsince'];
                            $d_lastworkplace = $get['d_lastworkplace'];

                            echo
                            "
                                <tr>
                                    <td>$d_id</td>
                                    <td>$d_name</td>
                                    <td>$d_dob</td>
                                    <td>$d_age</td>
                                    <td>$d_email</td>
                                    <td>$d_cell</td>
                                    <td>$d_addr</td>
                                    <td>$d_ecell</td>
                                    <td>$d_special</td>
                                    <td>$d_workingsince</td>
                                    <td>$d_lastworkplace</td>
                                    <td><a href='doctorupdate.php?d_id=$d_id'><button>Edit Record</button></a></td>
                                </tr>
                            ";
                        }

                        ?>
                        
                    </table>
                </div>
                
            </div>
        </div>



        <!-- DOCTOR SCRIPT -->
        <script>
        $("#doctor_search").keyup(function(){
            let txt = $(this).val();
            if(txt != '')
            {
                $.post('doctorlive.php',{doctor_search:txt},function(data){
                    $("#doctor_result").html(data);
                });
            }
            else
            {
                $('#doctor_result').html('');
            }
        });
        $("#doctor_search").focusin(function(){
            $(".d").hide();
        });
        $("#doctor_search").focusout(function(){
            $(".d").show();
        });
        </script>













        <div id="a-l">

            <div id="al_searchbar">
                <h3>Nurse Records</h3>
                <div id="al-searchbar-input">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search Records" id="nurse_search">
                </div>
            </div>
            
            <div id="a-l-right">
                <div id="nurse_result"></div>
                <div id="patient_table" class="n">
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
                            <th>Last Workplace</th>
                            <th>Working Since</th>
                            <th>Reference Name</th>
                            <th>Reference Contact</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "hms");
                        $retrive = mysqli_query($con, "SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), n_dob)), '%Y') + 0 AS age from nurse");
                        while($get = mysqli_fetch_assoc($retrive))
                        {
                            $n_id = $get['n_id'];
                            $n_name = $get['n_name'];
                            $n_dob = $get['n_dob'];
                            $n_age = $get['age'];
                            $n_email = $get['n_email'];
                            $n_cell = $get['n_cell'];
                            $n_addr = $get['n_addr'];
                            $n_ecell = $get['n_ecell'];
                            $n_lastworkplace = $get['n_lastworkplace'];
                            $n_workingsince = $get['n_workingsince'];
                            $n_referencename = $get['n_referencename'];
                            $n_referencenum = $get['n_referencenum'];

                            
                            
                            echo
                            "
                                <tr>
                                    <td>$n_id</td>
                                    <td>$n_name</td>
                                    <td>$n_dob</td>
                                    <td>$n_age</td>
                                    <td>$n_email</td>
                                    <td>$n_cell</td>
                                    <td>$n_addr</td>
                                    <td>$n_ecell</td>
                                    <td>$n_lastworkplace</td>
                                    <td>$n_workingsince</td>
                                    <td>$n_referencename</td>
                                    <td>$n_referencenum</td>
                                    <td><a href='nurseupdate.php?n_id=$n_id'><button>Edit Record</button></a></td>
                                </tr>
                            "
                            ;
                        }

                        ?>
                        
                    </table>
                </div>
                
            </div>
        </div>




        <!-- NURSE SCRIPT -->
        <script>
        $("#nurse_search").keyup(function(){
            let txt = $(this).val();
            if(txt != '')
            {
                $.post('nurselive.php',{doctor_search:txt},function(data){
                    $("#nurse_result").html(data);
                });
            }
            else
            {
                $('#nurse_result').html('');
            }
        });
        $("#nurse_search").focusin(function(){
            $(".n").hide();
        });
        $("#nurse_search").focusout(function(){
            $(".n").show();
        });
        </script>










        <div id="a-l">

            <div id="al_searchbar">
                <h3>Staff Records</h3>
                <div id="al-searchbar-input">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search Records" name="search" id="staff_search">
                </div>
            </div>
            
            <div id="a-l-right">
                <div id="staff_result"></div>
                <div id="patient_table" class="s">
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
                            <th>Last Workplace</th>
                            <th>Working Since</th>
                            <th>Reference Name</th>
                            <th>Reference Contact</th>
                            <th>&nbsp;</th>
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
                                    <td>$n_lastworkplace</td>
                                    <td>$n_workingsince</td>
                                    <td>$n_referencename</td>
                                    <td>$n_referencenum</td>
                                    <td><a href='staffupdate.php?s_id=$s_id'><button>Edit Record</button></a></td>
                                </tr>
                            "
                            ;
                        }
                        ?>
                        
                    </table>
                </div>
                
            </div>
        </div>

        <!-- STAFF SCRIPT -->
        <script>
        $("#staff_search").keyup(function(){
            let txt = $(this).val();
            if(txt != '')
            {
                $.post('stafflive.php',{staff_search:txt},function(data){
                    $("#staff_result").html(data);
                });
            }
            else
            {
                $('#staff_result').html('');
            }
        });
        $("#staff_search").focusin(function(){
            $(".s").hide();
        });
        $("#staff_search").focusout(function(){
            $(".s").show();
        });
        </script>

        






        <br><br>
        
    </div>








    <script src="script.js" type="text/javascript"></script>




</body>
</html>