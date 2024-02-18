<?php
$con = mysqli_connect("localhost", "root", "", "hms");
$output = '';
$user = $_POST["doctor_search"];
$query = "SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), n_dob)), '%Y') + 0 AS age from nurse where n_name like '%' '$user' '%' ";
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
        $n_id = $get['n_id'];
        $n_name = $get['n_name'];
        $n_dob = $get['n_dob'];
        $n_age = $get['age'];
        $n_email = $get['n_email'];
        $n_cell = $get['n_cell'];
        $n_addr = $get['n_addr'];
        $n_ecell = $get['n_ecell'];
        $n_lastwrokplace = $get['n_lastworkplace'];
        $n_workingsince = $get['n_workingsince'];
        $n_referencename = $get['n_referencename'];
        $n_referencenum = $get['n_referencenum'];
    
        $output .=
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
                <td>$n_workingsince</td>
                <td>$n_lastwrokplace</td>
                <td>$n_referencename</td>
                <td>$n_referencenum</td>
                <td><a href='nurseupdate.php?n_id=$n_id'><button>Edit Record</button></a></td>
            </tr>
        ";
    }
    echo $output;

}
else
{
    echo "Any record with <b>"."'$user'"."</b> as Nurse name does not exist";
}
?>