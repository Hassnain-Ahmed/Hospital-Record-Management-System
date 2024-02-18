<?php
$con = mysqli_connect("localhost", "root", "", "hms");
$output = '';
$user = $_POST["staff_search"];
$query = "SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), s_dob)), '%Y') + 0 AS age from staff where s_name like '%' '$user' '%' ";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result)>0)
{
    $output =  
    "
    <div id='patient_table'>
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
    "
    ;
    while($get = mysqli_fetch_assoc($result))
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
    
        $output .=
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
                <td>$s_workingsince</td>
                <td>$s_lastwrokplace</td>
                <td>$s_referencename</td>
                <td>$s_referencenum</td>
                <td><a href='staffupdate.php?s_id=$s_id'><button>Edit Record</button></a></td>
            </tr>
        ";
    }
    echo $output;

}
else
{
    echo "Any record with <b>"."'$user'"."</b> as Staff name does not exist";
}
?>

