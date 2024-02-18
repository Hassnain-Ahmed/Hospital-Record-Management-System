<?php
$con = mysqli_connect("localhost","root","","hms");
$id = $_GET['a_id'];
$query = mysqli_query($con, "DELETE from appointment where a_id = '$id'");
if($query)
{
    header("Location:appointment.php");
}
?>