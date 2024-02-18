<?php
echo '<script src="" type="text/javascript"></script>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Hospital Management System</title>
    <script src="Jquery/Jquery.js"></script>
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link rel="icon" href="src/Untitled-1.png">
	<link rel="stylesheet" href="index.css">
    
    

</head>
<body>

	
	
	<?php
    session_start();
	if(!isset($_SESSION["login"]))
	{
	    header("Location:home.php");
	}
    $con = mysqli_connect("localhost","root","","hms");
    $id = $_SESSION["login"];
	$query = mysqli_query($con, "SELECT si_name from signup where si_id = '$id'");
    $get = mysqli_fetch_assoc($query);
    $name =  $get['si_name'];

	?>




	

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
                    <!-- <li class="active"><a href="home.php"> HOME </a></li> -->
                    <li class="non-active"><a href="patient.php"> PATIENT </a></li>
                    <li class="non-active"><a href="appointment.php"> APPOINTMENT </a></li>
                    <li class="non-active"><a href="doctor.php"> DOCTOR </a></li>
                    <li class="non-active"><a href="nurse.php"> NURSE </a></li>
                    <li class="non-active"><a href="staff.php"> STAFF </a></li>
                    <li class="non-active"><a href="allrecords.php"> All RECORDS </a></li>
					<a href="logout.php" id="signout"><i class="fa fa-sign-out"></i>Logout</a>
				</ul>
			</div>
		</div>


		<div id="welcome">
			<h3>
				Welcome  <span> <?php echo $name; ?> </span>
			</h3>
		</div>


		<!-- Home -->
		<div id="home">
			<div id="home-text">
				<h1>HOSPITAL MANAGEMENT SYSTEM</h1>
				<p>Home and sanctuary of the sick and elderly</p>
				<!-- <a href="allrecords.php">
					<button>VIEW RECORDS</button>
				</a> -->
			</div>
		</div>




	</div>



    <script src="script.js" type="text/javascript"></script>
	<script>$("#welcome").delay(1000).animate({left:"10px"}).delay(9000).animate({left:"-500px"});</script>
		
</body>
</html>