<?php
$con = mysqli_connect("localhost", "root", "", "hms");

$selectquery =  mysqli_query($con, "select * from patient");
while ($get = mysqli_fetch_assoc($selectquery))
{
    echo $get['p_name']."<br>";
    echo $get['p_dob'];
    echo $get['p_email'];
}
?>